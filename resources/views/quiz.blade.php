@extends('layouts.user-layout', ['title' => __('course')])
@section('content')


<div class="container" style="margin-top:10px;margin-bottom:10px" >
   <h1> <a target='_blank' href="#" style="text-decoration: none;color:white">{{$quiz->name}}</a></h1>
    <form method=""action="">
    @foreach($quiz->questions as $question)

        <div class="form-group">
            <label for="question" style="color: #c37171;font-size: 25px;">{{$question->title}}</label>
            @if($question->type='text')
            <input type="text" name="answer" id="" class="form-control" placeholder="Your Answer" aria-describedby="helpId">
            @else
            <select name="answer">
               @foreach ($question->answer as $answer)
                   <option>{{$answer}}</option>
               @endforeach
            </select>
            @endif
            <small id="helpId" class="text-muted">Help text</small>
            <hr>
        </div>
    @endforeach
    @if(count($quiz->questions)>0)
    <input type="submit" name="submit" value="submit" class="btn btn-primary">
    @else
    <p class="lead text-center" style="color: white;">There are No Questions Found </p>
    @endif

  </form>
</div>
@endsection
