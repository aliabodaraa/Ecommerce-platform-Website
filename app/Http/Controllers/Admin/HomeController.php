<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Track;
class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        // $track_count=Track::all()->count();
        // $course_count=Course::all()->count();
          // $course_count=Course::all()->count();
        // $quiz_count=Quiz::all()->count();
        // $user_count=User::where('admin',0)->count(); //go to dashboard.blade writing @php
        return view('admin.dashboard');//,compact('user_count','quiz_count','course_count','track_count'));
    }
}
