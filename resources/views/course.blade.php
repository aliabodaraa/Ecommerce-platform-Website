@extends('layouts.user-layout', ['title' => __('course')])
@section('content')


<div class="container" style="margin-top:10px;margin-bottom:10px" >
    <div class="card">
      <div class="row g-0">
            <div class="col-md-4">
              @if ($course->photo)
                  <img class="card-img" src="{{asset('/img/'.$course->photo->filename)}}" style="height: 100%;"> 
                  @else
                      <img class="card-img" src="https://images.hepsiburada.net/banners/s/0/672-378/bannerImage2121_20210311083848.png" style="height: 100%;">
                  @endif
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{$course->title}}</h5>
                  <h3 class="{{($course->status==1)?'text-success':'text-muted'}}">{{($course->status==1)?strtoupper('Paid'):strtoupper('Free')}}</h3>
                <p class="card-text">{{$course->description}}</p>
                <p class="card-text">
                <a href="/tracks/{{$course->track->name}}">{{$course->track->name}}</a>
                <p>{{count($course->users)}} users enrolled</p>
                <p>{{count($course->videos)}}
                <small class="text-muted" style="float: right;margin-top: 110px;">{{$course->created_at}}</small>
              </div>
              </div>
            </div>
      </div>
    </div>
    <div class="row videos">
        @foreach($course->videos as $video)
        {{--  Button trigger modal  --}}
            <a href="{{$video->link}}" id="" class="AncorGetVideo btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalshowVideo">{{$video->link}} </a>
        @endforeach
    </div>
    <div class="row quizzes">
        @foreach($course->quizzes as $quiz)
             <a target='_blank' href="/courses/{{$course->slug}}/quizzes/{{$quiz->name}}" style="font-weight: 400;width: 100%;text-decoration: none;display: block;margin-bottom: -10px;
                                            padding: 10px 18px;border-radius: 6px;
                                            background-color: #f9f9f9;
                                            font-size: 18px;">{{$quiz->name}}</a><br>  
        @endforeach
    </div>
</div>
{{--  modal  --}}
<!-- Modal -->
<div class=" modal fade" id="ModalshowVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="dd" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 736px;">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Video Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <iframe width="700" height="400" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
@endsection