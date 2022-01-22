@extends('layouts.user-layout', ['title' => __('user_layout')])

@section('content')
 
{{--  to know the count of courses and tracks in every users in every track   --}}
        {{--  @foreach ($arr as $k1)
            @foreach ($k1 as $k2)
                name:{{$k2->name}}
               email: {{$k2->email}}
            tracks_count:  {{$k2->tracks_count}}
               courses_count: {{$k2->courses_count}} {{"____ss___________"}} 
            @endforeach 
       @endforeach  --}}

@include('includes.swiper_home') 


<div class="container-fluid1">
<div class="sidebar"></div>
 <div class="wrapper">
        <div class="main-container">
           <div class=" main-header anim" style="--delay: .3s">Famous Tracks</div>
              <div class="container">
              <div class="row">
                   @foreach($max9Track as $track)
                    <div class="col-sm-4">
                        <a href="#" style="font-weight: 400;width: 100%;text-decoration: none;display: block;margin-bottom: -10px;
                                            padding: 10px 18px;border-radius: 6px;
                                            background-color: #f9f9f9;
                                            font-size: 18px;">{{$track->name}} <span class="badge bg-secondary">{{count($track->courses)}} courses</span><span class="badge bg-secondary">{{$track->users()->where('name','Chester Kris I')->get()}} Done</span></a><br>
                     @if($loop->index==1)
{{--                       
                         @php 
                         echo $track->id;
                          echo $track->users 
                          @endphp  --}}
                     @endif 
                    </div> 
                    {{--  {{count($k->courses()->get())}}  --}}                                                                                                                                                               
                     @endforeach
                     </div>
               </div>
         </div>
           </div>
         </div>
{{--  <div class="img-container">
<img src="https://images.hepsiburada.net/banners/s/0/672-378/bannerImage2121_20210311083848.png"
 class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
  alt="place" style="height: 457px;width: 100%;">
  <div class="text-img-header jumbotron text-left">
  <h1>We Have {{$course_free_count}} course for Free  </h1>
  <h3>More than 11 user have enrolled in 50 course in 10 Tracks</h3>
  <button type="button" class="btn btn-outline-warning">Strart Learning</button>
  </div>
</div>  --}}
@include('includes.tracks_courses')
 @include('includes.new') 
 






@endsection
{{--  rgb(255 188 136 / 6%)  --}}