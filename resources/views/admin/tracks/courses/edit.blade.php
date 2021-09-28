@extends('layouts.app', ['title' => __('Edit course inside track determine')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Edit Course inside Track') . ' ',
        'description' => __('Hi '.auth()->user()->name .' can Edit Course inside Track'),
        'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Course inside Track') }}</h3>
                        </div>
                    </div>
<h1>Edit </h1>
                {{-- <form role="form" method="POST" action="{{ route('track.courses.update',$track,$course) }}" enctype="multipart/form-data"> --}}
                <form role="form" method="POST" action="/admin/track/{{$track->id}}/courses/{{$course->id}}" enctype="multipart/form-data">
                            @csrf
{{-- Title --}}             @method('PATCH')
                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('title') }}" type="text" name="title" value="{{ $course->title }}" required autofocus>
                                </div>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
{{-- Title --}} 

                             <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                                    </div>
                                    <input  value="{{ $course->link }}" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('link') }}" type="link" name="link" required>
                                </div>
                                @if ($errors->has('link'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class='far fa-image' style="font-size:20px"></i></span>
                                    </div>
                                    
                                    <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="{{ __('image') }}" type="file" name="image" required>
                             
                                </div>
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class='fas fa-dollar-sign'></i></span>
                                    </div>
                                   <select class="form-control" name="status" class="form-control" required>
                                     <option value='0' {{($course->title==0)?'selected':''}}>Free</option>
                                     <option value='1' {{($course->title==1)?'selected':''}}>Paid</option>
                                   </select>
                                  </div>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>

                                <div class="form-group{{ $errors->has('track_id') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-road" aria-hidden="true" style="color:f46422"></i></span>
                                    </div>
                                   <select class="form-control" name="track_id" class="form-control" required>
                                
                                       <option value='{{$track->id}}'>{{$track->name}}</option>
                                    
                                   </select>
                                  </div>
                                @if ($errors->has('track_id'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('track_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                               <div class="text-center">
                                <button type="submit" class="btn btn-block btn-success mt-5">{{ __('Create Course') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
