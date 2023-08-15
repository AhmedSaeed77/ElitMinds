<?php

namespace App\Http\Controllers;

use App\Localization\Locale;
use App\Repository\PackageRepositoryInterface;
use App\Transcode\Transcode;
use App\Zone\Zone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Chapters;
use App\Process_group;
use App\Packages;
use App\QuestionRoles;
use App\Question;
use App\UserPackages;
use App\Events\CertificationCounter;
use App\FaqCource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class packageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except(['packageByCourse']); //default auth --->> auth:web
    }

    /**
     * @param string $title
     * @param int $package_id
     */
    public function doSlug(string $title, int $package_id): void
    {
        $slug = $this->makeSlug($title, '-');
        $slugExists = DB::table('packages')
            ->where('slug', $slug)
            ->first();
        if ($slugExists && $slugExists->id !== $package_id) {
            $slug = $slug . '-' . $package_id;
            $slugExists = DB::table('packages')->where('slug', $slug)->exists();
            while ($slugExists) {
                $slug = $slug . '-' . mt_rand(1000, 9999);
            }
        }

        DB::table('packages')->where('id', $package_id)->update(['slug' => $slug]);
    }

    /**
     * @param $str
     * @param string $delimiter
     * @return string
     */
    public function makeSlug($str, $delimiter = '-')
    {
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::all();
        // dd($packages);
        return view('packages/index')->with('packages', $packages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chapters = Chapters::all();
        $process = Process_group::all();
        // return view('packages/newAdd')->with('chapters', $chapters)->with('process', $process);
        return view('packages/add-form')->with('chapters', $chapters)->with('process', $process);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// dd($request);
        if ($request->input('chapter') == 'on') {

            $chapter_inc = [];
            $process_group_inc = [];
            /* Test for Check box input (Chapters) */
            $chapters = Chapters::all();
            $chapters_included = [];
            foreach ($chapters as $ch) {
                if ($request->has('c' . $ch->id)) {
                    $chapters_included[$ch->id] = $ch->name;
                    array_push($chapter_inc, $ch->id);
                }
            }

            /* Test for check box input (Proccess Groups) */
            $process_group = Process_group::all();
            $process_group_included = [];
            foreach ($process_group as $pg) {
                if ($request->has('p' . $pg->id)) {
                    $process_group_included[$pg->id] = $pg->name;
                    array_push($process_group_inc, $pg->id);
                }
            }

            if (empty($chapters_included) && empty($process_group_included))
                return back()->withErrors(['You haven\'t Select any Chapter or Process Group !'])->withInput();
        }


        if ($request->input('exam') == 'on') {
            $exams_arr = $request->input('exams');
            $exams_str = implode(',', $exams_arr);
        }



        /* Validation */
        $this->validate($request, [
            'name' => 'required',
            //            'name_ar' => 'required',
            'price' => 'numeric|required',
            'discount' => 'numeric|required',
            'expire'    => 'numeric|required',
            'extension_in_days' => 'numeric|required',
            'extension_price' => 'numeric|required',
            'max_extension' => 'numeric|required',
            'description' => 'required',
            //            'filter' => 'required',
            'contant_type' => 'required',
            'img' => 'required|mimes:png,jpg,jpeg', // 100 MB
            'img_large' => 'mimes:png,jpg,jpeg', // 100 MB
            'img_small' => 'required|mimes:png,jpg,jpeg', // 100 MB
            'preview_video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            'what_you_learn' => 'required',
            'requirement' => 'required',
            //            'who_course_for'=>'required',
            //            'what_you_learn_ar'=>'required',
            //            'requirement_ar'=>'required',
            //            'who_course_for_ar'=>'required',
            //            'description_ar' => 'required',
            'enroll_msg' => 'required',
            'lang' => 'required',
            'course_id' => 'required',
            'certification' => 'numeric|required',
        ]);

        $packages_with_the_same_name = Packages::where('name', '=', $request->input('name'));
        if ($packages_with_the_same_name->get()->first()) {
            return back()->withErrors(['Please Choose Another name !'])->withInput();
        }

        if ($request->input('chapter') == '' && $request->input('exam') == '') {
            return back()->withErrors(['You haven\'t Select Package includes !'])->withInput();
        }

        if ($request->input('discount') > 100) {
            return back()->withErrors(['discount can not be greater than 100% !'])->withInput();
        }

        if ($request->input('max_extension') != 0 && $request->input('extension_in_days') != 0) {


            if ($request->input('max_extension') % $request->input('extension_in_days') != 0) {
                return back()->withErrors(['max number of extension days must be divisible by extend days !'])->withInput();
            }
        }


        /**
         *    Calculate the price after discount
         */
        $price = $this->price_after_discount($request->input('price'), $request->input('discount'));

        /** 
         * it's time to store data
         */
        // frist store the package info at package table
        $new_package = new Packages;
        $new_package->meta_tittle = $request->input('meta_tittle');
        $new_package->meta_description = $request->input('meta_description');

        $new_package->name = $request->input('name');
        $new_package->slug = $request->input('name');
        $new_package->original_price = $request->input('price');
        $new_package->price = $price;
        $new_package->expire_in_days = $request->input('expire');
        $new_package->extension_in_days = $request->input('extension_in_days');
        $new_package->max_extension_in_days = $request->input('max_extension');
        $new_package->extension_price = $request->input('extension_price');
        $new_package->discount = $request->input('discount');
        $new_package->description = $request->input('description');
        $new_package->course_id = $request->input('course_id');
        $new_package->lang = $request->input('lang');
        $new_package->plandes = $request->input('plandes');
        $new_package->requirement = $request->input('requirement');
        $new_package->what_you_learn = $request->input('what_you_learn');
        $new_package->who_course_for = $request->input('who_course_for');
        $new_package->enroll_msg = $request->input('enroll_msg');
        $new_package->img = $request->file('img')->store('public/package/imgs/');
        $new_package->img_large = $request->file('img_large')->store('public/package/imgs/');
        $new_package->img_small = $request->file('img_small')->store('public/package/imgs/');
        if ($request->hasFile('preview_video')) {
            $new_package->preview_video_url = $request->file('preview_video')->store('public/package/preview/');
        }

        $new_package->certification = $request->input('certification');
        if ($request->input('certification')) {
            $new_package->certification_title = $request->input('certification_title');
            $new_package->total_time = $request->course_hours;
        }


        $new_package->active = 1;
        $new_package->popular = 1;

        if ($request->input('chapter') != '') {
            $new_package->chapter_included = implode(",", $chapter_inc);
            $new_package->process_group_included = implode(",", $process_group_inc);
        }
        if ($request->input('exams') != '') {
            $new_package->exams = $exams_str;
        }
        $new_package->filter = 'all';
        $new_package->contant_type = $request->input('contant_type');
        $new_package->save();


        /**
         * Store Prices
         */
        $zones = DB::table('zones')->get();
        foreach ($zones as $zone) {
            if ($request->has('price_zone_' . $zone->id) && $request->input('price_zone_' . $zone->id) != '') {

                $original_price = $request->input('price_zone_' . $zone->id);
                $discount = $request->input('discount_zone_' . $zone->id);
                $price = $this->price_after_discount($original_price, $discount);

                if ($discount >= 100) {
                    return back()->withErrors(['discount can not be greater than 100% !'])->withInput();
                }

                DB::table('zone_prices')
                    ->insert([
                        'zone_id'           => $zone->id,
                        'item_type'         => 'package',
                        'item_id'           => $new_package->id,
                        'original_price'    => $original_price,
                        'price'             => $price,
                        'discount'          => $discount,
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now(),
                    ]);
            }
        }


        Transcode::add($new_package, [
            'name' => $request->name_ar,
            'description' => $request->description_ar,
            'what_you_learn' => $request->what_you_learn_ar,
            'requirement' => $request->requirement_ar,
            'who_course_for' => $request->who_course_for_ar,
            'enroll_msg' => $request->enroll_msg_ar,
            'meta_tittle' => $request->meta_tittle_ar,
            'plandes' => $request->plandes_ar,
            'meta_description' => $request->meta_description_ar,
        ]);

        $this->doSlug($request->name, $new_package->id);

        return redirect(route('packages.index'))->with('success', 'Package Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Packages::find($id);
        $packageTransCodes = Transcode::evaluate($package, true, true);
        $packageTransCodes_fr = Transcode::evaluate($package, 'fr', true);
        $prices = DB::table('zones')
            ->leftJoin(
                DB::raw('(SELECT * FROM zone_prices WHERE item_type=\'package\' AND item_id=\'' . $id . '\') AS zone_prices'),
                'zones.id',
                '=',
                'zone_prices.zone_id'
            )
            ->select(
                'zones.id',
                'zones.name',
                'original_price',
                'price',
                'discount'
            )
            ->get();
        return view('packages.edit')
            ->with('package', $package)
            ->with('packageTransCodes', $packageTransCodes)
            ->with('packageTransCodes_fr', $packageTransCodes_fr)
            ->with('prices', $prices);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'price' => 'numeric|required',
            'extension_price' => 'numeric|required',
            'expire' => 'numeric|required',
            'extension_in_days' => 'numeric|required',
            'max_extension' => 'numeric|required',
            'description' => 'required',
            'discount' => 'numeric|required',
            'what_you_learn' => 'required',
            'requirement' => 'required',
            'who_course_for' => 'required',
            'enroll_msg' => 'required',
            'lang' => 'required',
            'course_id' => 'required',
            'certification' => 'numeric|required'
        ]);



        if ($request->input('discount') > 100) {
            return back()->withErrors(['discount can not be greater than 100% !'])->withInput();
        }

        if ($request->input('max_extension') != 0 && $request->input('extension_in_days') != 0) {


            if ($request->input('max_extension') % $request->input('extension_in_days') != 0) {
                return back()->withErrors(['max number of extension days must be divisible by extend days !'])->withInput();
            }
        }

        $price = $this->price_after_discount($request->input('price'), $request->input('discount'));

        $package = Packages::find($id);
        $package->name = $request->input('name');
        $package->meta_tittle = $request->input('meta_tittle');
        $package->meta_description = $request->input('meta_description');
        $package->original_price = $request->input('price');
        $package->price = $price;
        $package->expire_in_days = $request->input('expire');
        $package->extension_in_days = $request->input('extension_in_days');
        $package->extension_price = $request->input('extension_price');
        $package->max_extension_in_days = $request->input('max_extension');
        $package->discount = $request->input('discount');
        $package->description = $request->input('description');
        $package->requirement = $request->input('requirement');
        $package->what_you_learn = $request->input('what_you_learn');
        $package->who_course_for = $request->input('who_course_for');
        $package->enroll_msg = $request->input('enroll_msg');
        $package->course_id = $request->input('course_id');
        $package->lang = $request->input('lang');
        $package->plandes = $request->input('plandes');

        if ($request->input('popular') == '') {
            $package->popular = 0;
        } else {
            $package->popular = 1;
        }

        $package->certification = $request->input('certification');
        if ($request->input('certification')) {
            $package->certification_title = $request->input('certification_title');
            $package->total_time = $request->course_hours;
        }

        if ($request->hasFile('img')) {
            $oldPath = $package->img;
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
            // store the pdf
            $package->img = $request->file('img')->store('public/package/imgs/');
        }

        if ($request->hasFile('img_large')) {
            $oldPath = $package->img_large;
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
            // store the pdf
            $package->img_large = $request->file('img_large')->store('public/package/imgs/');
        }

        if ($request->hasFile('img_small')) {
            $oldPath = $package->img_small;
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
            // store the pdf
            $package->img_small = $request->file('img_small')->store('public/package/imgs/');
        }


        if ($request->hasFile('preview_video')) {
            $oldPath = $package->preview_video_url;
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
            $package->preview_video_url = $request->file('preview_video')->store('public/package/preview/');
        }

        $package->save();

        /**
         * Store Prices
         */
        DB::table('zone_prices')->where(['item_type' => 'package', 'item_id' => $package->id])->delete();
        $zones = DB::table('zones')->get();
        foreach ($zones as $zone) {
            if ($request->has('price_zone_' . $zone->id) && $request->input('price_zone_' . $zone->id) != '') {

                $original_price = $request->input('price_zone_' . $zone->id);
                $discount = $request->input('discount_zone_' . $zone->id);
                $price = $this->price_after_discount($original_price, $discount);

                if ($discount >= 100) {
                    return back()->withErrors(['discount can not be greater than 100% !'])->withInput();
                }

                DB::table('zone_prices')
                    ->insert([
                        'zone_id'           => $zone->id,
                        'item_type'         => 'package',
                        'item_id'           => $package->id,
                        'original_price'    => $original_price,
                        'price'             => $price,
                        'discount'          => $discount,
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now(),
                    ]);
            }
        }


        Transcode::update($package, [
            'name' => $request->name_ar,
            'description' => $request->description_ar,
            'what_you_learn' => $request->what_you_learn_ar,
            'requirement' => $request->requirement_ar,
            'plandes' => $request->plandes_ar,
            'who_course_for' => $request->who_course_for_ar,
        ]);

        Transcode::update($package, [
            'name' => $request->name_fr,
            'description' => $request->description_fr,
            'what_you_learn' => $request->what_you_learn_fr,
            'requirement' => $request->requirement_fr,
             'plandes' => $request->plandes_fr,
            'who_course_for' => $request->who_course_for_fr,
        ], 'fr');

        $this->doSlug($request->name, $package->id);


        return \Redirect::to(route('packages.index'))->with('success', 'Package Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $query = Packages::find($id);
        if ($query->count()) {
            if ($query->active == 1) {
                $title = $query->name;
                $query->active = 0;
                $query->save();
                return redirect(route('packages.index'))->with('success', "$title : Package Disabled");
            }

            $title = $query->name;
            $query->active = 1;
            $query->save();
            return redirect(route('packages.index'))->with('success', "$title : Package Enabled");
            // // delete all roles 
            // $roles = QuestionRoles::where('package_id','=', $id)->get();
            // if($roles->count()){
            //     foreach($roles as $role){
            //         $role->delete();       
            //     }
            // }
            // $query->delete();


        }
        return redirect(route('packages.index'))->with('error', 'Unkown Error: Package not found !!');
    }


    public function price_after_discount($original_price, $discount)
    {
        $take_off = ($discount / 100) * $original_price;
        $new_price = $original_price - $take_off;
        return round($new_price, 2);
    }

 public function packageByCourse(Locale $locale, PackageRepositoryInterface $packageRepository, $course)
    {
        $country_code = Zone::getLocation()->country_code;
        $package_selles_list = [];

        $course_slug = $course;
        $courseModel = \App\Course::where('slug', $course_slug)->first();
        $coursdetails = \App\CourseDetail::where('course_id', $courseModel->id)->first();
        if ($courseModel) {
            $course_id = $courseModel->id;
        } else {
            $course_id = null;
        }
        $packages = \App\Packages::where('course_id', $course_id)->where('active', 1)->get();
        if ($packages->first()) {

            $package_selles_list = $packageRepository->getPackagesByCourse($course_id, $country_code, $locale->locale);
        } else {
            $package = \App\Packages::all('course_id')->first();
            $courseModel = \App\Course::find($package->course_id);
            return \Redirect::to(route('package.by.course', $courseModel->slug));
        }
        
        if ($coursdetails->preview_video !== null) {
            $courseModel->v1 = (app('App\Http\Controllers\VideoController')->Vimeo_GetVideo($coursdetails->preview_video))->embed->html;
        }

        if ($coursdetails->preview_video2 !== null) {
            $courseModel->v2 = (app('App\Http\Controllers\VideoController')->Vimeo_GetVideo($coursdetails->preview_video2))->embed->html;
        }
        if ($coursdetails->plan_a) {
            $coursdetails->plan_a_details = $this->package_view($coursdetails->plan_a);
        }
        if ($coursdetails->plan_b) {
            $coursdetails->plan_b_details = $this->package_view($coursdetails->plan_b);
        }
        if ($coursdetails->plan_c) {
            $coursdetails->plan_c_details = $this->package_view($coursdetails->plan_c);
        }
        $faqs  = FaqCource::where('cource_id' , $coursdetails->course_id)->get();
        // dd($coursdetails);
        //dd($coursdetails);
        // event(new CertificationCounter($courseModel));
        return view('course.cer')
            ->with('best_sell', $package_selles_list)
            ->with('faqs', $faqs)
            ->with('courseModel', $courseModel)
            ->with('coursdetails', $coursdetails);
    }
    public function package_view($id)
    {

        $package = \App\Packages::where('id', $id)->first();

        if (!$package) {
            $package = \App\Packages::where('slug', $id)->first();
            if (!$package) {
                return null;
            }
        }
        $locale = new Locale;

        if (!$package->active) {
            return null;
        }
        if ($package) {
            $item = (object)[];
            $item->package = $package;
            $item->users_no = count(\App\UserPackages::where('package_id', $package->id)->get());
            $total_no = 0;
            $rate = \App\Rating::where('package_id', $package->id)->get();
            $devisor = count($rate);
            foreach ($rate as $i) {
                $total_no += $i->rate;
            }
            if ($devisor == 0) {
                $item->total_rate = 0;
            } else {
                $item->total_rate = $total_no / $devisor;
            }

            $total_quiz_num = 0;
            $total_question_num = 0;

            /**
             * included content of package generation.
             */
            $chapters_inc   = [];
            $process_inc    = [];
            $exams_inc      = [];

            $total_videos_num = 0;
            $chapter_data = (object)['question_num' => 0, 'quiz_num' => 0];
            $process_data = (object)['question_num' => 0, 'quiz_num' => 0];
            $exam_data = (object)['question_num' => 0, 'quiz_num' => 0];

            $exams = $package->exams;


            $package_total_video_time = [0, 0, 0]; // hr,min,sec
            $package_total_time_toString = '';
            if ($package->chapter_included != '' || $package->chapter_included != null) {
                $arr_chapters_id = explode(',', $package->chapter_included);

                if (!empty($arr_chapters_id)) {
                    $i = 1;
                    foreach ($arr_chapters_id as $id) {
                        $ch = \App\Chapters::where('id', '=', $id)->get()->first();
                        $x = (object)[];
                        $x->num = $i;
                        $x->id = $ch->id;
                        $x->name = $ch->name;
                        $x->name_ar = Transcode::evaluate($ch)['name'];
                        $x->total_hours = 0;
                        $x->total_min = 0;
                        $x->total_sec = 0;
                        $x->total_time_toString = '';
                        foreach (\App\Video::where('chapter', $ch->id)->get() as $video) {
                            if ($video->duration != '' && $video->duration != null) {

                                $x->total_min += \Carbon\Carbon::parse($video->duration)->format('i');
                                $x->total_sec += \Carbon\Carbon::parse($video->duration)->format('s');
                                if (\Carbon\Carbon::parse($video->duration)->format('h') != 12) {
                                    $x->total_hours += \Carbon\Carbon::parse($video->duration)->format('h');
                                }
                            }
                        }
                        $x->total_min += floor($x->total_sec / 60);
                        $x->total_sec = $x->total_sec % 60;

                        $x->total_hours += floor($x->total_min / 60);
                        $x->total_min = $x->total_min % 60;
                        $package_total_video_time[0] += $x->total_hours;
                        $package_total_video_time[1] += $x->total_min;
                        $package_total_video_time[2] += $x->total_sec;

                        $x->total_time_toString = \Carbon\Carbon::create(2012, 1, 1, 0, 0, 0)->addHours($x->total_hours)->addMinutes($x->total_min)->addSeconds($x->total_sec)->format('H  i');

                        if ($package->filter == 'chapter' || $package->filter == 'chapter_process') {
                            if (count(\App\Question::where('chapter', $ch->id)->get()) > 0) {
                                $total_quiz_num++;
                                $total_question_num += count(\App\Question::where('chapter', $ch->id)->get());
                                $chapter_data->question_num += count(\App\Question::where('chapter', $ch->id)->get());
                                $chapter_data->quiz_num++;
                            }
                        }

                        array_push($chapters_inc, $x);

                        $total_videos_num += count(\App\Video::where('chapter', $id)->get());
                        $i++;
                    }
                }
            }

            $package_total_time_toString = \Carbon\Carbon::create(2012, 1, 1, 0, 0, 0)->addHours($package_total_video_time[0])->addMinutes($package_total_video_time[1])->addSeconds($package_total_video_time[2]);
            $number_of_hours = $package_total_time_toString->diffInHours(\Carbon\Carbon::create(2012, 1, 1, 0, 0, 0));
            $number_of_minutess = $package_total_time_toString->format('i');

            if ($locale->locale == 'en') {
                $total_time = ($number_of_hours) . ' Hr ' . ($number_of_minutess) . ' Min';
            } else {
                $total_time = ($number_of_hours) . ' ساعة ' . ($number_of_minutess) . 'دقيقة ';
            }


            if ($package->process_group_included != '' || $package->process_group_included != null) {
                $arr_process_id = explode(',', $package->process_group_included);
                if (!empty($arr_process_id != '')) {
                    $i = 1;
                    foreach ($arr_process_id as $id) {
                        $ch = \App\Process_group::where('id', '=', $id)->get()->first();
                        $x = (object)[];
                        $x->id = $ch->id;
                        $x->num = $i;
                        $x->name = $ch->name;
                        $x->name_ar = Transcode::evaluate($ch)['name'];

                        if ($package->filter == 'process' || $package->filter == 'chapter_process') {

                            if (count(\App\Question::where('process_group', $ch->id)->get()) > 0) {
                                $total_quiz_num++;
                                $total_question_num += count(\App\Question::where('process_group', $ch->id)->get());
                                $process_data->question_num += count(\App\Question::where('process_group', $ch->id)->get());
                                $process_data->quiz_num++;
                            }
                        }
                        array_push($process_inc, $x);
                        $i++;
                    }
                }
            }

            if ($exams != null) {
                $exams = explode(',', $exams);
                $i = 1;
                foreach ($exams as $e) {
                    $e_ = \App\Exam::find($e);
                    $x = (object)[];
                    $x->id = $e;
                    $x->num = $i;
                    $x->name = $e_->name;
                    $x->name_ar = Transcode::evaluate($e_)['name'];
                    if (count(\App\Question::where(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,' . $e . ',%')->get()) > 0) {
                        $total_quiz_num++;
                        $total_question_num += count(\App\Question::where(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,' . $e . ',%')->get());
                        $exam_data->question_num += count(\App\Question::where(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,' . $e . ',%')->get());
                        $exam_data->quiz_num++;
                    }
                    array_push($exams_inc, $x);
                    $i++;
                }
            }

            $package_total_video_time[1] += round($package_total_video_time[2] / 60);
            $package_total_video_time[2] = round($package_total_video_time[2] % 60);

            $package_total_video_time[0] += round($package_total_video_time[1] / 60);
            $package_total_video_time[1] = round($package_total_video_time[1] % 60);
            $rating = DB::table('ratings')->where('package_id', $package->id)
                ->select(
                    DB::raw('AVG(rate) as avg_rate'),
                    DB::raw('COUNT(*) as ratings_number'),
                    DB::raw('COUNT(IF(ratings.rate = \'5\', 1, NULL)) as five_stars'),
                    DB::raw('COUNT(IF(ratings.rate = \'4\', 1, NULL)) as four_stars'),
                    DB::raw('COUNT(IF(ratings.rate = \'3\', 1, NULL)) as three_stars'),
                    DB::raw('COUNT(IF(ratings.rate = \'2\', 1, NULL)) as two_stars'),
                    DB::raw('COUNT(IF(ratings.rate = \'1\', 1, NULL)) as one_stars')
                )->first();
            if ($rating->ratings_number <= 0) {
                $rating->ratings_number = 1;
            }


            $det = [
                'chapter_list' => $chapters_inc,
                'process_list' => $process_inc,
                'exam_list' => $exams_inc,
                'total_videos_num' => $total_videos_num,
                'total_quiz_num' => $total_quiz_num,
                'total_question_num' => $total_question_num,
                'chapter_data' => $chapter_data,
                'process_data' => $process_data,
                'exam_data' => $exam_data,
                'total_time' => $total_time,
                'package_total_video_time' => $package_total_video_time,

            ];
            return $det;
        } else {
            return null;
        }
    }

    public function seopage(){
        return view('admin.course.details');
    }


   
    public function getCourceDetailsData($id)
    {
        $course =   \App\Course::find($id);
        $details =   \App\CourseDetail::where('course_id', $id)->first();
        // if (!$details) 
        // {
        //     $e =  new \App\CourseDetail();
        //     $e->course_id = $id;
        //     $e->slug = $course->slug;
        //     $e->save();
        //     $details =  \App\CourseDetail::where('course_id', $id)->first();
        // }
        if($details)
        {
        $detailsTranscodes = Transcode::evaluate(\App\CourseDetail::find($details->id), 1);
        $details->description_ar = $detailsTranscodes['description'] ?? '';
        $details->meta_description_ar = $detailsTranscodes['meta_description'] ?? '';
        $details->meta_title_ar = $detailsTranscodes['meta_title'] ?? '';
        $details->keywords_ar = $detailsTranscodes['keywords'] ?? '';
        $details->short_description_ar = $detailsTranscodes['short_description'] ?? '';
        }
        else
        {
             $details =  new \App\CourseDetail();
        }
        $packages = \App\Packages::where('course_id', $id)->get();
        
        return response()->json(['details' => $details, 'packages' => $packages], 200);
    }


  public function updatedetails(Request $request)
    {
        $check = false;
        $details =   \App\CourseDetail::find($request->id);
        if($details == null)
        {
            $details =  new \App\CourseDetail();
            $check = true;
        }
        $details->description = $request->description;
        $details->short_description = $request->short_description;
        $details->preview_video = $request->preview_video;
        $details->preview_video_ar = $request->preview_video_ar;
        $details->preview_video2 = $request->preview_video2;
        $details->preview_video2_ar = $request->preview_video2_ar;
        $details->plan_a = $request->plan_a;
        $details->plan_b = $request->plan_b;
        $details->plan_c = $request->plan_c;
        
        $details->nameplan_a = $request->nameplan_a;
        $details->nameplan_b = $request->nameplan_b;
        $details->nameplan_c = $request->nameplan_c;
        
        $details->meta_title = $request->meta_title;
        $details->meta_description = $request->meta_description;
        $details->keywords = $request->keywords;
        
        $details->certificatedesc_en = $request->certificatedesc_en;
        $details->certificatedesc_ar = $request->certificatedesc_ar;
        
        $details->caredname1 = $request->caredname1;
        $details->caredname2 = $request->caredname2;
        $details->caredname3 = $request->caredname3;
        $details->caredname4 = $request->caredname4;
        $details->caredname5 = $request->caredname5;
        $details->careddesc1 = $request->careddesc1;
        $details->careddesc2 = $request->careddesc2;
        $details->careddesc3 = $request->careddesc3;
        $details->careddesc4 = $request->careddesc4;
        $details->careddesc5 = $request->careddesc5;
        
        if($request->file('certificateimage'))
        {
            $file = $request->file('certificateimage');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/certificate', $filename);
            $details->certificateimage = $filename;
        }
        
        $details->certificatename = $request->certificatename;
        $details->numberstudent = $request->numberstudent;
        $details->numberhour = $request->numberhour;
        $details->numberexam = $request->numberexam;
        $details->numberlecture = $request->numberlecture;
        if($request->file('certificatelogo'))
        {
            $file = $request->file('certificatelogo');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/certificate/logo', $filename);
            $details->certificatelogo = $filename;
        }
        
        if($request->file('thumnile1'))
        {
            $file = $request->file('thumnile1');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/certificate/thumnile', $filename);
            $details->thumnile1 = $filename;
        }
        
        if($request->file('thumnile2'))
        {
            $file = $request->file('thumnile2');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/certificate/thumnile', $filename);
            $details->thumnile2 = $filename;
        }
        
        if($request->file('thumnilear'))
        {
            $file = $request->file('thumnilear');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/certificate/thumnilear', $filename);
            $details->thumnilear = $filename;
        }
        
        if($request->file('courseimage'))
        {
            $file = $request->file('courseimage');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/certificate/courseimage', $filename);
            $details->courseimage = $filename;
        }
        
        $course =   \App\Course::find( $request->course_id);
        $details->slug = $course->slug;
        $details->course_id = $request->course_id;
        $details->courserate = $request->courserate;
        $details->coursereviews = $request->coursereviews;
        $details->save();
        if($check)
        {
            Transcode::evaluate(\App\CourseDetail::find($request->id), [
            'description'   => $request->description_ar,
            'meta_description'   => $request->meta_description_ar,
            'meta_title'   => $request->meta_title_ar,
            'keywords'   => $request->keywords_ar,
            'short_description'   => $request->short_description_ar,
        ]);
        }
        else
        {
            Transcode::update(\App\CourseDetail::find($request->id), [
            'description'   => $request->description_ar,
            'meta_description'   => $request->meta_description_ar,
            'meta_title'   => $request->meta_title_ar,
            'keywords'   => $request->keywords_ar,
            'short_description'   => $request->short_description_ar,
        ]);
        }
        
        return response()->json(['true']);
    }
    
    public function certificateindex()
    {
        $coursedetails = \App\CourseDetail::all();
        return view('admin.course.certificateindex')->with('coursedetails', $coursedetails);
    }
    
    public function certificatedelete($id)
    {
        $coursedetails = \App\CourseDetail::find($id);
        $coursedetails->delete();
        return redirect()->back();
    }
}
