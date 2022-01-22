@extends('layouts.app', ['title' => __('Courses_Managmaent')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Index_Courses Page') . ' '. auth()->user()->name,
        'description' => __('Index_Courses'),
        'class' => 'col-lg-7'
    ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                     <div class="row align-items-center">
                        <div class="col-4">
                           <h3 class="mb-0"><i class="fa fa-book" aria-hidden="true" style="color:#888;font-size:20px"></i> Courses Home</h3>
                        </div>
                        <div class="col-8 text-right">
                                {{--  <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary">Add Quiz</a>  --}}
                                {{-- <!-- Button trigger AddQuiz modal --> --}}
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#AddCourseWithPopUp">
                                 Add Course
                                 </button>
                                    {{--  @include('includes.modalAddCourse') the place after footer bacause it destroyed the design  --}}
                        </div>
                    </div>
                </div>

                <div class="col-12"> </div>
{{-- glyphicon glyphicon-search --}}
            
             @include('includes.errors')
             @include('includes.message')
      
            {{--  class offset-sm-1   --}}
                    {{-- <div class="form-group class ">
                      <a href="{{route('courses.create')}}" name="addcourse" class="btn btn-warning btn-block buttonEffect" style="padding:10px ;">
                      Add course </a>  
                  </div> --}}
       
             
                    {{--  <a href="{{route('courses.create')}}" class="menu__item menu__item--orange buttonEffect-plus" data-background="red">
                       <i class="fa fa-plus" style="font-size: 30px;"></i>
                    </a>  --}}
                {{--  _____Courses_____  --}} 
    @if (count($courses))  
    <div class="container-fluid" style="padding-right: 20px !important; padding-left: 20px !important;">
        <div class="row">
        
            @foreach ($courses as $course )
            {{-- @if ($course->photo)  --}}
            <div class="col-xs-3">
                <div class="card" style="width: 20.6rem;margin:3px">
                       @if ($course->photo)  
                       {{-- @php
                        echo $course->photo->filename; 
                        echo '/assets/img/'.$course->photo->filename
                       @endphp --}}
                       <img src="{{asset('/img/'.$course->photo->filename)}}" class="card-img-top" alt="photo{{$loop->index}}">
                      @else
                     <img src='https://via.placeholder.com/300/' class="card-img-top" alt="photo{{$loop->index}}">
              
                        @endif  
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ \Str::limit($course->link,33) }}</p>
                        <p>{{ $course->status }}</p>
                        <a href="{{route('courses.show',$course)}}" class="btn btn-info">Show <i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="{{route('courses.edit',$course)}}" class="btn btn-light">Edit <i class="fa fa-edit" aria-hidden="true"></i></a>
                        <form method="POST" action="{{route('courses.destroy',$course)}}" style="display: inline;">
                               @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" value="Delete" type="submit" onclick="confirm('Are You Sure you want to Delete this Admin')?this.parentElement.submit():'' ">
                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                         
                    </div>
                </div>
            </div>
            {{-- @endif --}}
            @endforeach
        </div>
    </div>            
    @else
        <p class="lead text-center">There is No Course Found </p> 
    @endif   
        {{--  _____Courses_____  --}}
        
      
    </div>
</div>
</div>
@include('layouts.footers.auth')
@include('includes.modalAddCourse') 
</div> 
@endsection

   

