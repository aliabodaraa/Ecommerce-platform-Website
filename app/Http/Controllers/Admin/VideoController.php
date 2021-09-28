<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
class VideoController extends Controller
{
    
    public function index()
    {
        $videos=Video::orderBy('id','desc')->paginate(15);
    return view('admin.videos.index',compact('videos'));
    }
    public function create()
    {
        return view('admin.videos.create');
    }

   
    public function store(Request $request)
    {
        $rules=[
            'title'=> 'required|min:5|max:150',
            'link'=> 'required|url',
            'course_id'=> 'required|integer',];
        $this->validate($request,$rules);
     if(Video::create($request->all())){
            return redirect()->route('videos.index')->with("mssg","Video succussfully Creates.");
     }else{
          // LOOK-----> 
          return redirect()->route('videos.create')->with("mssg","Try to Create this Video Again.");
     }
    }

    public function show(Video $video)
    {
        return view('admin.videos.show',compact('video'));
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit',compact('video'));
    }

    public function update(Request $request,Video $video)
    {
        $rules=[
            'title'=> 'required|min:5|max:150',
            'link'=> 'required|url',
            'course_id'=> 'required|integer',];
        $this->validate($request,$rules);
     if($video->update($request->all())){
            return redirect()->route('videos.index')->with("mssg","Video succussfully Updates.");
     }else{
          // LOOK-----> 
          return redirect()->route('videos.edit',$video)->with("mssg","Try to Update this Video Again.");
     }
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->with("mssg","Video succussfully deleted.");
    }
}
