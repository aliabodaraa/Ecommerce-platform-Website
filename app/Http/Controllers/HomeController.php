<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Track;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __constract(){
        $this->middleware('auth');
    }
    public function index(){
        $courses=Course::all()->take(10);
        $course_free_count=Course::where('status','free')->get()->count();
        $tracks=Track::with('courses')->orderBy('id','desc')->get();// (with) for easier query
        $tracks_with_courses=Track::with('courses')->orderBy('id','desc')->limit(5)->get();
      $choiseMAxFamousTrack=Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);//without countBy() ['0'=>track_id]//with countBy [track_id for each course=>count of courses in each track_id(num of exist track id)e.x [33=>123]means track owns id=33 have 123course..... keys() e.x keys([33=>123]) output [0=>33] ] 
      $max9Track=Track::withCount('courses')->whereIn('id',$choiseMAxFamousTrack)->orderBy('courses_count','desc')->take(9)->get();//when use withCount('courses') added new attrebute count_courses becase courses is a relationship in track modal[70=>1]   //compare id with 1in ex [70=>1] //withCount('courses')  needs to get() because get( transform to assosoitive array as soon as take give it without transform) 
      //dd($max9Track); dd($tracks);  $tracks[1]->users()->withCount('courses')   //take=limit
        // $track_count=Track::all()->count();
         //$course_count=Course::all()->count();
        // $quiz_count=Quiz::all()->count();
        // $user_count=User::where('admin',0)->count(); //go to dashboard.blade writing@php
        // dd(Track::with('courses')->orderBy('id','desc')->limit(9)->get());
        // $alltrackspreferuser1=User::withCount('courses')->take(9)->get();
        // $recomendeddescoveruser1=Course::withCount('track')->whereIn('track_id', $alltrackspreferuser1)->get();
         //$cont=User::
       // $trackcerten=Track::where('id',1)->get();
       $trackcerten=Track::get();
        //dd($trackcerten);
        //dd($trackcerten[0]->users()->withCount('courses')->withCount('tracks')->get());important
      
       $arr=[];
         for($e=0;$e<count($tracks);$e++){
             $arr[]=$trackcerten[$e]->users()->withCount('courses')->withCount('tracks')->get();
            }
             //dd($arr);
             //dd($tracks);
         
         
         
   
    
        return view('home',compact('courses','course_free_count','tracks_with_courses','tracks','max9Track','arr'));//,compact('user_count','quiz_count','course_count','track_count'));
    
        
    }
}
