<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
class QuestionController extends Controller
{
  
    public function index()
    {
     
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules=[
            'title'=> 'required|min:5|max:150',
            'answer'=> 'string|min:5|required',
            'right_answer'=> 'string|min:5|required',
            'score'=> 'required|integer',
            'quiz_id'=> 'required|integer'];
        $this->validate($request,$rules);
     if(Question::create($request->all())){
            return redirect()->back()->with("mssg","Question succussfully Creates.");
     }else{
          // LOOK-----> 
          return redirect()->back()->with("mssg","Try to Create this Question Again.");
     }
    }

    
    public function show($id)
    {
     
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request,Question $question)
    {
        $rules=[
            'title'=> 'required|min:5|max:150',
            'answer'=> 'string|min:5|required',
            'right_answer'=> 'string|min:5|required',
            'score'=> 'required|integer',
            'quiz_id'=> 'required|integer'];
        $this->validate($request,$rules);
     if($question->update($request->all())){
            return redirect()->back()->with("mssg","Question succussfully Updates.");
     }else{
          // LOOK-----> 
          return redirect()->back()->with("mssg","Try to Update this Question Again.");
     }
    }

  
    public function destroy(Question $question)
    {$question->delete();
        return redirect()->back()->with("mssg","question succussfully deleted.");
    }
}
