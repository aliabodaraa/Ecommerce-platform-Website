@extends('layouts.app', ['title' => __('Preview Courses')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Preview Courses') . ' ',
        'description' => __('Hi '.auth()->user()->name .'You can Preview Courses'),
        'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                               <h3 class="mb-0"><i class="fas fa-rectangle-landscape"></i>{{ __('Show Course') }}</h3>
                            </div>
                            <div class="col-8 text-right">
                                {{--  <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">Add Course</a>  --}}
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#AddCourseWithPopUp">
                                 Add Course
                                 </button>
                                 @if(!count($course->quizzes))
                                      <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalAddQuizForCourse">
                                        Add Quiz For Course
                                   </button>  
                                 @endif
                                 @if(!count($course->videos))
                                   <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalAddVideoForCourse">
                                        Add Video For Course
                                   </button> 
                                 @endif
                            </div> 
                        </div>
                    </div>
    <div class="col-12"> </div>
             @include('includes.errors')
             @include('includes.message')
                <div class="card-body">
                  <div class="row">
                       <div class="col-sm-4">
                          <div class="image">
                          @if($course->photo)
                               <img src="{{asset('/img/'.$course->photo->filename)}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="sad">
                          @else
                           <h2 class="text-muted">Has No Image</h2>
                          @endif
                           </div>
                       </div>
                       <div class="col-sm">
                           <h3>{{$course->title}}</h3>
                           <h4><a href="{{route('tracks.show',$course->track)}}">{{$course->track->name}}</a></h4>
                         <span class="{{($course->status==0)?'text-success':'text-danger'}}">{{($course->status==0)?'Free':'Paid'}}</span>
                       </div>
                    </div>
                  
                  </div>
{{--  alii  --}}
{{--  <div class="d-none d-sm-block">
    @foreach($course->quizzes as $quiz)
        <a href="{{route('quizzes.show',$quiz)}}" class="btn btn-success">Quizzes</a>
    @endforeach
</div>  --}}
 {{--  alii  --}}
 {{--  videos start  --}}
                        @if (count($course->videos))
                    <div class="table-responsive">

                        <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                               <h3 class="mb-0"><i class="fas fa-rectangle-landscape"></i>{{ __('Course Videos') }}</h3>
                            </div>
                            <div class="col-8 text-right">
                             
                              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalAddVideoForCourse">
                                        Add Video For Course
                              </button> 
                             
                             
                            </div> 
                        
                        </div>
                    </div>
                    
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                    <tr>
                                        <th scope="col">title</th>
                                        <th scope="col">Creation Date</th>
                                        <th scope="col">link</th>
                                        <th scope="col" class="text-right"></th>
                                    </tr>
                            </thead>
                            <tbody>
                                {{--  @php echo $users @endphp  --}}
                    
                                @foreach ($course->videos as $video)
                                        <tr>
                                            <td><a href="{{route('videos.show',$video)}}">{{$video->title}}</a></td>
                                            <td>{{$video->created_at->diffForHumans()}}</td>
                                            <td>{{$video->link}}</td> 
                                    </tr>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                @else
                    <p class="lead text-center">There is No videos Found </p> 
                @endif 
{{--videos end--}}
{{--quizzes start--}} 
      @if (count($course->quizzes))
                    <div class="table-responsive">

                        <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                               <h3 class="mb-0"><i class="fas fa-rectangle-landscape"></i>{{ __('Course Quizzes') }}</h3>
                            </div>
                            <div class="col-8 text-right">
                              <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalAddQuizForCourse">
                                        Add Quiz For Course
                               </button>  
                            </div> 
                          
                        </div>
                    </div>
                  
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                    <tr>
                                        <th scope="col">name</th>
                                        <th scope="col">Creation Date</th>
                                        <th scope="col">course_id</th>
                                        <th scope="col" class="text-right"></th>
                                    </tr>
                            </thead>
                            <tbody>
                                {{--  @php echo $users @endphp  --}}
                    
                                @foreach ($course->quizzes as $quiz) 
                                        <tr>
                                            <td><a href="{{route('quizzes.show',$quiz)}}">{{$quiz->name}}</a></td>
                                            <td>{{$quiz->created_at->diffForHumans()}}</td>
                                            <td>{{$quiz->course_id}}</td> 
                                    </tr>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                @else
                    <p class="lead text-center">There is No quizzes Found </p> 
                @endif 
{{--  quizzes end  --}}
             </div>
           </div>
        </div>
     </div>

        @include('layouts.footers.auth')
        @include('includes.modalAddCourse')
        @include('includes.modalAddVideoForCourse')    
        @include('includes.modalAddQuizForCourse')
    </div>
@endsection
