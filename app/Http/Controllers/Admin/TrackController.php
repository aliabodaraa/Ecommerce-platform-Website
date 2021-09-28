<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
//use Carbon\Carbon;//for date
class TrackController extends Controller
{
    public function index()
    {
        $tracks=Track::orderBy('id','desc')->paginate(20);
        return view('admin.tracks.index',compact('tracks'));
    }
    public function store(Request $request)
    { //'created_at'=>Carbon::now()
        $rules=[
            'name'=> 'required|min:5|max:30',
        ];
        $this->validate($request,$rules);
        if(Track::create($request->all())){
            return redirect()->route('tracks.index')->with("mssg",'Track succussfully created.');
        }else{
            return redirect()->route('tracks.index')->with("mssg",'Try Again.');
        }
           
    }

    public function show(Track $track)
    {
        return view('admin.tracks.show',compact('track'));
    }
    // public function show(Product $product)
    // {
    //     return ProductDetailResource::make($product);
    // }
    public function edit(Track $track)
    {
        return view('admin.tracks.edit',compact('track'));
    }
    public function update(Request $request, Track $track)
    {
        $rules=[
            'name'=> 'required|min:5|max:30',
        ];
        $this->validate($request,$rules);
           $track->update([
              'name'=> $request->name,
           ]);
         // if($request->has('name')){$track->name=$request->name; }
         // if($track->isDerty()){$track->save();dd("ali");}//if changed
           if( $track->update($request->all())){
              return redirect()->route('tracks.index')->with("mssg","Track succussfully Updated.");
         }else{
              // LOOK-----> 
              return redirect()->route('tracks.edit',$track->id)->with("mssg","Try Update Again.");
         }
    }
    public function destroy(Track $track)
    {
        $track->delete();
        return redirect()->route('tracks.index')->with("mssg","Track succussfully deleted.");
        //->withStatus(__('User succussfully deleted.'));
    }
}
//->with("mssg","Restore Done Now you can delete thi Row :)");  ---->Invoking--->  <p class="mssg">{{session('mssg')}}</p>
//بالمختصر بمرق وسطاءاغراض وبالفرمات بمرق كوائن