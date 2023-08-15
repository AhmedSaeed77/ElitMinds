<?php

namespace App\Http\Controllers;

use App\Transcode\Transcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{



    public function create()
    {
        return view('admin.review.create');
    }
    
     public function homecreate()
    {
        return view('admin.review.homereviewcreate');
    }


    public function showmesasage()
    {
        $messages = DB::table('messagehome')->get();
        return view('admin.review.message',['messages'=>$messages]);
    }
    
    public function deletemesasage($id)
    {
        DB::table('messagehome')->where('id',$id)->delete();
        return redirect()->route('message.showmesasage');
    }
   
   public function storemesasage(Request $req)
    {
        
        
        DB::table('messagehome')
                    ->insert([
                        'fullname'        => $req->fullName,
                        'email'           => $req->email,
                        'message'         => $req->Message,
                        'created_at'      => Carbon::now(),
                    ]);
         return redirect()->back()->with('success', 'We received your message, and we will get back to you soon. Thank you!');   

    }
    
    public function storesubscribe(Request $req)
    {
        
        
        DB::table('messagehome')
                    ->insert([
                        
                        'email'           => $req->email,
                        'created_at'      => Carbon::now(),
                    ]);
         return redirect()->back()->with('success', 'We received your message, and we will get back to you soon. Thank you!');   

    }
    
    public function sendreply(Request $request,$id)
    {
        $user = DB::table('messagehome')->where('id',$id)->first();
        Mail::to($user->email)->send(new \App\Mail\ReplyMessage($request->reply));
        return redirect()->back()->with('success', 'your email is sent');
    }
    
    public function store(Request $req)
    {
        
        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/review',$filename);
        }
        else
        {
            $filename = null;
        }
        // if($req->hasFile('imagecountry'))
        // {
        //     $file = $req->file('imagecountry');
        //     $filename1 = $file->getClientOriginalName();
        //     $filename1 = str_replace(" ","",$filename1);
        //     $file->move('images/review',$filename1);
        // }
        // else
        // {
        //     $filename1 = null;
        // }
        
        $newcountry = \App\NewCountry::find($req->country_id);
        
        DB::table('reviews')
                    ->insert([
                        'fname'         => $req->fname,
                        'lname'         => $req->lname,
                        'comment'       => $req->description,
                        'course_id'     =>    $req->course_id,
                        'country_id'    =>    $req->country_id,
                        'rates'         =>    $req->rate,
                        'image'         =>   $filename,
                        'imagecountry'  =>   $newcountry->codeS,
                        'created_at'    => Carbon::now(),
                    ]);
        return redirect()->route('review.index');
    }
    
    public function homestore(Request $req)
    {
        
        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/review',$filename);
        }
        else
        {
            $filename = null;
        }
        // if($req->hasFile('imagecountry'))
        // {
        //     $file = $req->file('imagecountry');
        //     $filename1 = $file->getClientOriginalName();
        //     $filename1 = str_replace(" ","",$filename1);
        //     $file->move('images/review',$filename1);
        // }
        // else
        // {
        //     $filename1 = null;
        // }
        $newcountry = \App\NewCountry::find($req->country_id);
        DB::table('homereviews')
                    ->insert([
                        'fname'         => $req->fname,
                        'lname'         => $req->lname,
                        'comment'       => $req->description,
                        'course_id'     =>    $req->course_id,
                        'country_id'    =>    $req->country_id,
                        'rates'         =>    $req->rate,
                        'image'         =>   $filename,
                        'imagecountry'  =>   $newcountry->codeS,
                        'created_at'    => Carbon::now(),
                    ]);
        return redirect()->route('review.homeindex');
    }
    
    public function index()
    {
        $reviews = DB::table('reviews')
         ->leftJoin('courses', 'reviews.course_id', 'courses.id')
         ->leftJoin('countries', 'reviews.country_id', 'countries.id')
         ->select([
             'reviews.id',
             'reviews.comment',
             'reviews.fname',
             'reviews.lname',
             'reviews.rates',
             'courses.title AS coursee_name',
             'countries.name AS Country_name'
             
             ])
        ->get();
        return view('admin.review.index',['reviews'=>$reviews]);
    }

    public function homeindex()
    {
        $reviews = DB::table('homereviews')
         ->leftJoin('courses', 'homereviews.course_id', 'courses.id')
         ->leftJoin('countries', 'homereviews.country_id', 'countries.id')
         ->select([
             'homereviews.id',
             'homereviews.comment',
             'homereviews.fname',
             'homereviews.lname',
             'homereviews.rates',
             'courses.title AS coursee_name',
             'countries.name AS Country_name'
             
             ])
        ->get();
        return view('admin.review.homeindexreview',['reviews'=>$reviews]);
    }
    

    
    public function delete($id)
    {
        DB::table('reviews')->where('id',$id)->delete();
       return redirect()->route('review.index');
        
        
    }
    
    public function homedelete($id)
    {
        DB::table('homereviews')->where('id',$id)->delete();
       return redirect()->route('review.homeindex');
        
        
    }
}
