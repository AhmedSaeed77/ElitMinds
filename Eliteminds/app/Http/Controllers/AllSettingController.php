<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AllSetting;

class AllSettingController extends Controller
{
    public function show()
    {
        //$setting = AllSetting::where('id',1)->first();
        return view('admin.setting.create');
    }
    
    public function getData()
    {
        $data =   AllSetting::where('id', 1)->first();
        return response()->json(['data' => $data], 200);
    }
    
    public function setting(Request $request)
    {
        $setting = AllSetting::where('id',1)->first();
                
        $setting->experts = $request->experts;
        $setting->certificates = $request->certificates;
        $setting->achieve = $request->achieve;
        $setting->books = $request->books;
        $setting->assessment = $request->assessment;
        $setting->educational = $request->educational;
        $setting->contactus = $request->contactus;
        $setting->allcertificates = $request->allcertificates;
        $setting->allbooks = $request->allbooks;
        $setting->wehelp = $request->wehelp;
        $setting->vision = $request->vision;
        $setting->mission = $request->mission;
        $setting->title1 = $request->title1;
        $setting->title2 = $request->title2;
        $setting->title3 = $request->title3;
        $setting->story = $request->story;
        $setting->achievename1 = $request->achievename1;
        $setting->achievename2 = $request->achievename2;
        $setting->achievename3 = $request->achievename3;
        $setting->achievename4 = $request->achievename4;
        $setting->achievedesc1 = $request->achievedesc1;
        $setting->achievedesc2 = $request->achievedesc2;
        $setting->achievedesc3 = $request->achievedesc3;
        $setting->achievedesc4 = $request->achievedesc4;
        $setting->allblog = $request->allblog;
        $setting->videohome = $request->videohome;
        
        $setting->twiterlink = $request->twiterlink;
        $setting->facebooklink = $request->facebooklink;
        $setting->youtubelink = $request->youtubelink;
        $setting->instalink = $request->instalink;
        $setting->wifilink = $request->wifilink;
        $setting->linkedinlink = $request->linkedinlink;
        $setting->enrollnowfree = $request->enrollnowfree;
         
        if($request->file('certificatemainimage'))
        {
            $file = $request->file('certificatemainimage');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/certificate/mainimage', $filename);
            $setting->certificatemainimage = $filename;
        }
        
        if($request->file('blogmainimage'))
        {
            $file = $request->file('blogmainimage');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/blog/mainimage', $filename);
            $setting->blogmainimage = $filename;
        }
        
        if($request->file('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/home/thumbnail', $filename);
            $setting->thumbnail = $filename;
        }
        
        $setting->save();
        
        return redirect()->back();
    }
}
