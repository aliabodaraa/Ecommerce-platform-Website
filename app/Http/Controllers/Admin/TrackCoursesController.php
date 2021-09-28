<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Track;
class TrackCoursesController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Track $track)
    {
        return view('admin.tracks.courses.create',compact('track'));
    }
    public function store(Request $request ,Track $track)
        { //dd(":)");
             $rules=[
                 'title'=> 'required|min:5|max:150',
                 'status'=> 'required|integer|in:0,1',
                 'link'=> 'required|url',
                 'track_id'=> 'required|integer',];
             $this->validate($request,$rules);
            // dd($request->all());
          if($course=Course::create($request->all())){
                    //dd($request->image);
                    //if($file=$request->file('image')){
                if($file=$request->image){
                    $fullname=$file->getClientOriginalName();
                    $extension=$file->getClientOriginalExtension();
                    $fullname_store_in_DB=time().'_'.explode('.',$fullname)[0].'_'.$extension;
                                //  dd($fullname_store_in_DB);
                            // dd(public_path('img'));
                    if($file->move('img',$fullname_store_in_DB)){
                            //  dd("asdas");
                                Photo::create([
                                    'filename'=>$fullname_store_in_DB,
                                    'photoable_id'=>$course->id,
                                    'photoable_type'=>'App\Models\Course',
                                ]); 
                            }
                   }
           
           return redirect()->route("tracks.show",$track)->with("mssg","Course succussfully Creates.");
           }else{
                // LOOK-----> 
                return redirect()->back()->with("mssg","Try to Create this Course Again.");
           }
       }
    public function show($id)
    {
        //
    }

    
    public function edit(Track $track,Course $course)
    {
        return view('admin.tracks.courses.edit',compact('track'),compact('course'));
    }

    public function update(Request $request,Track $track,Course $course)
    {
        $rules=[
            'title'=> 'required|min:5|max:150',
            'status'=> 'required|integer|in:0,1',
            'link'=> 'required|url',
            'track_id'=> 'required|integer',];
        $this->validate($request,$rules);
        if($course->update($request->all())){
          if($file=$request->image){
               $fullname=$file->getClientOriginalName();
               $extension=$file->getClientOriginalExtension();
               $fullname_store_in_DB=time().'_'.explode('.',$fullname)[0].'_'.$extension;
               if($file->move('img',$fullname_store_in_DB)){
                   if($course->photo){ 
                      //delete old photo
                    $fileName=$course->photo->filename;//old photo fileName
                    unlink('img/'.$fileName);//swap old photo in new photo
                        $course->photo->filename=$fullname_store_in_DB;
                        $course->photo->save();
                    }else{
                        Photo::create([
                            'filename'=>$fullname_store_in_DB,
                            'photoable_id'=>$course->id,
                            'photoable_type'=>'App\Models\Course',
                        ]); 
                    }
                
                }
          }
      return redirect()->route("tracks.show",$track)->with("mssg","Course succussfully Updates.");
      }else{
           // LOOK-----> 
           return redirect()->back()->with("mssg","Try to Update this Course Again.");
      }
    }

    public function destroy($id)
    {
        //
    }
}
