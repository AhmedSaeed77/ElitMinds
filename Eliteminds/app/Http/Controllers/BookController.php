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
use App\Book;
use App\QuestionRoles;
use App\Question;
use App\UserPackages;
use App\Events\CertificationCounter;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
      use \App\Payment\Payment;

    // public function __construct()
    // {
    //     $this->middleware('auth:admin'); //default auth --->> auth:web
    // }

    /**
     * @param string $title
     * @param int $package_id
     */
    public function doSlug(string $title, int $book_id): void
    {
        $slug = $this->makeSlug($title, '-');
        $slugExists = DB::table('books')
            ->where('slug', $slug)
            ->first();
        if ($slugExists && $slugExists->id !== $book_id) {
            $slug = $slug . '-' . $book_id;
            $slugExists = DB::table('books')->where('slug', $slug)->exists();
            while ($slugExists) {
                $slug = $slug . '-' . mt_rand(1000, 9999);
            }
        }

        DB::table('books')->where('id', $book_id)->update(['slug' => $slug]);
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
        $books = Book::all();
        return view('books/index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('books/addbook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //dd($request);
        /* Validation */
        $this->validate($request, [
            'name' => 'required',
            //        'name_ar' => 'required',
            'price' => 'numeric|required',
            'discount' => 'numeric|required',
            'book_link'    => 'required',
            // 'extension_in_days' => 'numeric|required',
            'extension_price' => 'numeric|required',
            // 'max_extension' => 'numeric|required',
            'description' => 'required',
            'num_questions' => 'required',
            'num_exams' => 'required',
            //'img' => 'required|mimes:png,jpg,jpeg', // 100 MB
            'img_large' => 'mimes:png,jpg,jpeg', // 100 MB
            //'img_small' => 'required|mimes:png,jpg,jpeg', // 100 MB
         
                ]);

        $books_with_the_same_name = Book::where('name', '=', $request->input('name'));
        if ($books_with_the_same_name->get()->first()) {
            return back()->withErrors(['Please Choose Another name !'])->withInput();
        }

        

        if ($request->input('discount') > 100) {
            return back()->withErrors(['discount can not be greater than 100% !'])->withInput();
        }

        // if ($request->input('max_extension') != 0 && $request->input('extension_in_days') != 0) {


        //     if ($request->input('max_extension') % $request->input('extension_in_days') != 0) {
        //         return back()->withErrors(['max number of extension days must be divisible by extend days !'])->withInput();
        //     }
        // }


        /**
         *    Calculate the price after discount
         */
        $price = $this->price_after_discount($request->input('price'), $request->input('discount'));

        /** 
         * it's time to store data
         */
        // frist store the package info at package table
        $new_book = new Book;
        // $new_book->meta_tittle = $request->input('meta_tittle');
        // $new_book->meta_description = $request->input('meta_description');

        $new_book->name = $request->input('name');
        $new_book->original_price = $request->input('price');
        $new_book->price = $price;
        // $new_book->expire_in_days = $request->input('expire');
        // $new_book->extension_in_days = $request->input('extension_in_days');
        // $new_book->max_extension_in_days = $request->input('max_extension');
        $new_book->extension_price = $request->input('extension_price');
         $new_book->book_link = $request->input('book_link');
        $new_book->discount = $request->input('discount');
        $new_book->description = $request->input('description');
        $new_book->img = $request->file('img')->store('public/book/imgs/');
        //$new_book->img_large = $request->file('img_large')->store('public/book/imgs/');
        //$new_book->img_small = $request->file('img_small')->store('public/book/imgs/');
        
        $new_book->num_exams = $request->input('num_exams');
        $new_book->num_questions = $request->input('num_questions');
        
        $new_book->popular = 1;

        $new_book->shortdescription = $request->input('shortdescription');
        $new_book->shortdescription_ar = $request->input('shortdescription_ar');
        
        $new_book->titleEditor = $request->input('titleEditor');
        $new_book->titleEditorAr = $request->input('titleEditorAr');
        
        $new_book->shortdescription1 = $request->input('shortdescription1');
        $new_book->shortdescription_ar1 = $request->input('shortdescription_ar1');
       
        $new_book->save();


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
                        'item_type'         => 'book',
                        'item_id'           => $new_book->id,
                        'original_price'    => $original_price,
                        'price'             => $price,
                        'discount'          => $discount,
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now(),
                    ]);
            }
        }


        Transcode::add($new_book, [
            'name' => $request->name_ar,
            'description' => $request->description_ar,
           
        ]);

        $this->doSlug($request->name, $new_book->id);

        return redirect(route('books.index'))->with('success', 'book added Successfully.');
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $bookTransCodes = Transcode::evaluate($book, true, true);
   
        $prices = DB::table('zones')
            ->leftJoin(
                DB::raw('(SELECT * FROM zone_prices WHERE item_type=\'book\' AND item_id=\'' . $id . '\') AS zone_prices'),
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
        return view('books.edit')
            ->with('book', $book)
            ->with('bookTransCodes', $bookTransCodes)
            // ->with('bookTransCodes_fr', $bookTransCodes_fr)
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
            // 'expire' => 'numeric|required',
            // 'extension_in_days' => 'numeric|required',
            // 'max_extension' => 'numeric|required',
             'book_link' => 'required',
            'description' => 'required',
            'discount' => 'numeric|required',
            'num_questions' => 'required',
            'num_exams' => 'required'
            
        ]);



        if ($request->input('discount') > 100) {
            return back()->withErrors(['discount can not be greater than 100% !'])->withInput();
        }

        // if ($request->input('max_extension') != 0 && $request->input('extension_in_days') != 0) {


        //     if ($request->input('max_extension') % $request->input('extension_in_days') != 0) {
        //         return back()->withErrors(['max number of extension days must be divisible by extend days !'])->withInput();
        //     }
        // }

        $price = $this->price_after_discount($request->input('price'), $request->input('discount'));

        $book = Book::find($id);
        $book->name = $request->input('name');
        // $book->meta_tittle = $request->input('meta_tittle');
        // $book->meta_description = $request->input('meta_description');
        $book->original_price = $request->input('price');
        $book->price = $price;
        // $book->expire_in_days = $request->input('expire');
        // $book->extension_in_days = $request->input('extension_in_days');
        $book->extension_price = $request->input('extension_price');
        $book->book_link = $request->input('book_link');
        // $book->max_extension_in_days = $request->input('max_extension');
        $book->discount = $request->input('discount');
        $book->description = $request->input('description');
        
        $book->num_exams = $request->input('num_exams');
        $book->num_questions = $request->input('num_questions');
        $book->shortdescription = $request->input('shortdescription');
        $book->shortdescription_ar = $request->input('shortdescription_ar');
        
        $book->shortdescription1 = $request->input('shortdescription1');
        $book->shortdescription_ar1 = $request->input('shortdescription_ar1');
        
        $book->titleEditor = $request->input('titleEditor');
        $book->titleEditorAr = $request->input('titleEditorAr');
       

        if ($request->input('popular') == '') {
            $book->popular = 0;
        } else {
            $book->popular = 1;
        }

       
        if ($request->hasFile('img')) {
            $oldPath = $book->img;
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
            // store the pdf
            $book->img = $request->file('img')->store('public/book/imgs/');
        }

        if ($request->hasFile('img_large')) {
            $oldPath = $book->img_large;
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
            // store the pdf
            $book->img_large = $request->file('img_large')->store('public/book/imgs/');
        }

        if ($request->hasFile('img_small')) {
            $oldPath = $book->img_small;
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
            // store the pdf
            $book->img_small = $request->file('img_small')->store('public/book/imgs/');
        }


       
        $book->save();

        /**
         * Store Prices
         */
        DB::table('zone_prices')->where(['item_type' => 'book', 'item_id' => $book->id])->delete();
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
                        'item_type'         => 'book',
                        'item_id'           => $book->id,
                        'original_price'    => $original_price,
                        'price'             => $price,
                        'discount'          => $discount,
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now(),
                    ]);
            }
        }


        Transcode::update($book, [
            'name' => $request->name_ar,
            'description' => $request->description_ar,
           
        ]);

        Transcode::update($book, [
            'name' => $request->name_fr,
            'description' => $request->description_fr,
           
        ], 'fr');

        $this->doSlug($request->name, $book->id);


        return \Redirect::to(route('books.index'))->with('success', 'book Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function price_after_discount($original_price, $discount)
    {
        $take_off = ($discount / 100) * $original_price;
        $new_price = $original_price - $take_off;
        return round($new_price, 2);
    }
    
    public function singleBook(Locale $locale,Request $request,$slug)
    {
        $book = \App\Book::where('slug', $slug)->first();
        $books = Book::all();
        foreach($books as $bookd){
                $bookd->pricing = $this->PriceDetails(null,$bookd->id, 'book');
        }
        if($book){
             $book->pricing = $this->PriceDetails(null,$book->id, 'book');
            return  view('book.index', compact('book','books'));
        }
        return back();
        
    }


    public function allBooks()
    {
        $books = Book::all();
        return view('book.allbooks',['books'=>$books]);
    }
    

  public function searchBook(Request $request)
    {
        $newbooks = Book::all();
        $searchbook = Book::where('name',$request->search)->first();
        //dd($searchbook);
        if($searchbook == null)
        {
            return \Redirect::to(route('allBooks.index'))->with('error', 'the book may be not exist !');
                
        }
        $searchbook->pricing = $this->PriceDetails(null,$searchbook->id, 'book');
        
        // else
        // {
            return  view('book.index', ['book' => $searchbook,'books' => $newbooks]);
        // }
        
    }

}
