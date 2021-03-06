<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
class QuizController extends Controller
{
    public function index()
    {
        $quizzes=Quiz::orderBy('id','desc')->paginate(20);
        return view('admin.quizzes.index',compact('quizzes'));
    }

    public function create()
    {
        return view('admin.quizzes.create');
    }

    public function store(Request $request)
    {
        $rules=[
            'name'=> 'required|string|min:2|max:150',
            'course_id'=> 'required|integer',];
        $this->validate($request,$rules);
     if(Quiz::create($request->all())){
            return redirect()->route('quizzes.index')->with("mssg","Quiz succussfully Creates.");
     }else{
          // LOOK-----> 
          return redirect()->route('quizzes.create')->with("mssg","Try to Create this Quiz Again.");
     }
    }
    public function show(Quiz $quiz)
    {
        return view('admin.quizzes.show',compact('quiz'));
    }

   
    public function edit(Quiz $quiz)
    {
      return view('admin.quizzes.edit',compact('quiz'));
    }


    public function update(Request $request,Quiz $quiz)
    {
        $rules=[
            'name'=> 'required|min:5|max:150',
            'course_id'=> 'required|integer',];
        $this->validate($request,$rules);
     if($quiz->update($request->all())){
            return redirect()->route('quizzes.index')->with("mssg","Quiz succussfully Updates.");
     }else{
          // LOOK-----> 
          return redirect()->route('quizzes.edit',$quiz)->with("mssg","Try to Create this Quiz Again.");
     }
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with("mssg","quiz succussfully deleted.");
    }
}
