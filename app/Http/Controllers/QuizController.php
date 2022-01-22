<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index($slug,$name){
        $course=Course::where('slug',$slug)->first();
        $quiz=$course->quizzes()->where('name',$name)->first();
        return view('quiz',compact('quiz'));
    }
}
