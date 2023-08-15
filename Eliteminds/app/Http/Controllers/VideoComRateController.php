<?php

namespace App\Http\Controllers;

use App\VideoNote;
use App\VideoRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VideoComRateController extends Controller
{

    public function storeNote(Request $request)
    {
        $new = new VideoNote();
        $new->note = $request->note;
        $new->user_id = Auth()->user()->id;
        $new->video_id = $request->video_id;
        $new->save();
        return response()->json(['message' => 'done']);
    }

    public function storeRate(Request $request)
    {
        $new = new VideoRate();
        $new->rate = $request->rate;
        $new->comment = $request->comment;
        $new->user_id = Auth()->user()->id;
        $new->video_id = $request->video_id;
        $new->save();
        return response()->json(['message' => 'done']);
    }
    public function getNotes(Request $request)
    {
        $notes = VideoNote::where('video_id', $request->video_id)->where('user_id', Auth()->user()->id)->get();
        return response()->json(['notes' => $notes]);
    }
    public function getRate(Request $request)
    {
         $rating = DB::table('ratings')->where('package_id', $request->package_id)
            ->join('users', 'ratings.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'ratings.*')
            ->get();
        // $rate = VideoRate::where('video_id', $request->video_id)->where('user_id', Auth()->user()->id)->first();
        return response()->json(['rate' => $rating]);
        // $rate = VideoRate::where('video_id', $request->video_id)->where('user_id', Auth()->user()->id)->first();
        // return response()->json(['rate' => $rate]);
    }
    public function deleteNote(Request $request)
    {
        $note = VideoNote::where('id', $request->id)->where('user_id', Auth()->user()->id)->first();
        $note->delete();
        return response()->json(['message' => 'done']);
    }
    public function updateRate(Request $request)
    {
        $rate = VideoRate::where('video_id', $request->video_id)->where('user_id', Auth()->user()->id)->first();
        $rate->rate = $request->rate;
        $rate->comment = $request->comment;
        $rate->save();
        return response()->json(['message' => 'done']);
    }
}
