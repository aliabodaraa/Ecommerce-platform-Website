@extends('layouts.app', ['title' => __('show Track')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Track Page') . ' '. auth()->user()->name,
        'description' => __('Track'),
        'class' => 'col-lg-7'
    ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-3"><i class="fa fa-book" aria-hidden="true" style="color:#888;font-size:20px"></i> Courses Home</h3>
                        </div>
                    </div>
                </div>

                <div class="col-12"> </div>
{{-- glyphicon glyphicon-search --}}
            
             @include('includes.errors')
             @include('includes.message')
      
            {{--  class offset-sm-1   --}}
                  {{-- <div class="form-group class ">
                      <a href="{{route('track.courses.create',$track)}}" name="addcourse" class="btn btn-warning btn-block buttonEffect" style="padding:10px ;">
                      Add course </a>  
                  </div> --}}
                  {{-- <a href="/admin/track/{{$track->id}}/courses/create" class="menu__item menu__item--orange buttonEffect-plus" data-background="red">
                       <i class="fa fa-plus" style="font-size: 30px;"></i> --}}
                    </a>
                 <a href="{{route('track.courses.create',$track->id)}}" class="menu__item menu__item--orange buttonEffect-plus" data-background="red">
                       <i class="fa fa-plus" style="font-size: 30px;"></i>
                    </a> 
      
    @if (count($track->courses))  
    <div class="container-fluid" style="padding-right: 20px !important; padding-left: 20px !important;">
        <div class="row">
            @foreach ($track->courses as $course )
            {{-- @if ($course->photo)  --}}
            <div class="col-xs-3">
                <div class="card" style="width: 20.6rem;margin:3px">
                       @if ($course->photo)  
                       <img src="{{asset('/img/'.$course->photo->filename)}}" class="card-img-top" alt="photo{{$loop->index}}">
                      @else
                     <img src='https://via.placeholder.com/300/' class="card-img-top" alt="photo{{$loop->index}}">
              
                        @endif  
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ \Str::limit($course->link,33) }}</p>
                        <p>{{ $course->status }}</p>
                        {{-- <a href="{{route('courses.show',$course)}}" class="btn btn-info">Show Route <i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                        <a href="/admin/courses/{{$course->id}}" class="btn btn-info">Show Url2 <i class="fa fa-eye" aria-hidden="true"></i></a>
                        {{-- <a href="{{route('courses.edit',$course)}}" class="btn btn-light">Edit Route <i class="fa fa-edit" aria-hidden="true"></i></a> --}}
                        <a href="/admin/track/{{$track->id}}/courses/{{$course->id}}/edit" class="btn btn-light">Edit Url <i class="fa fa-edit" aria-hidden="true"></i></a>
                        
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
</div> 
@endsection

   

