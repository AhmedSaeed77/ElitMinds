<?php

namespace App\Http\Controllers;

use App\Repository\ExplanationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\FaqCource;
use App\Transcode\Transcode;

class FaqCorceController extends Controller
{

    public function index(Request $request)
    {
        $data  = FaqCource::paginate(50);
        return view('admin.faqcource.index')->with('data', $data);
    }


    public function create()
    {
        return view('admin.faqcource.create');
    }
        public function store(Request $request)
    {
       
        $new = new FaqCource();
        $new->title = $request->title;
        $new->contant = $request->content;
        $new->cource_id = $request->course_id;
        $new->save();

   
        Transcode::add($new, [
            'title' => $request->title_ar,
            'contant'   => $request->content_ar
        ]);



        return response()->json([
            'new'   => $new
        ], 201);
    }

  public function delete($id)
    {
        FaqCource::find($id)->delete();
        return back()->with('success', 'faq Has been Deleted');
    }
 
    public function show($id)
    {
        $faq = FaqCource::find($id);
        $detailsTranscodes = Transcode::evaluate($faq, 1);
        $faq->content_ar = $detailsTranscodes['contant'] ?? '';
        $faq->title_ar = $detailsTranscodes['title'] ?? '';
        return response()->json($faq, 200);
    }


    public function edit($id)
    {
        return view('admin.faqcource.edite')->with('post_id', $id);
    }


    
    public function update(Request $request)
    {

        $new =  FaqCource::find($request->id);
        $new->title = $request->title;
        $new->contant = $request->content;
        $new->cource_id = $request->course_id;
        $new->save();
        Transcode::update($new, [
            'title' => $request->title_ar,
            'contant'   => $request->content_ar
        ]);
        return response()->json(null, 200);
    }
}
