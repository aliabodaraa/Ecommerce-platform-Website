@extends('layouts.app', ['title' => __('Video_Edit')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Edit video') . ' ',
        'description' => __('Hi '.auth()->user()->name .' can Edit a new video'),
        'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0"><i class="fa fa-video" aria-hidden="true"></i> {{ __('Edit Video') }}</h3>
                        </div>
                    </div>
    <div class="col-12"> </div>
             @include('includes.errors')
             @include('includes.message')
                <form role="form" method="POST" action="{{ route('videos.update',$video) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group{{ $errors->has('title') ? ' has-danger ' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('title') }}" type="text" name="title" value="{{$video->title}}" required autofocus>
                                  {{-- <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div> --}}
                                </div>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('link') }}" type="link" name="link" value="{{$video->link}}" required>
                                </div>
                                @if ($errors->has('link'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>

                              <div class="form-group{{ $errors->has('course_id') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-book" aria-hidden="true" ></i></span>
                                    </div>
                                   <select class="form-control" name="course_id" class="form-control" required>
                                   @foreach (\App\Models\Course::orderBy('id','desc')->get() as $course )
                                       <option value='{{$course->id}}' {{($course->id==$video->course_id)?'selected':''}}>{{$course->title}}</option>
                                   @endforeach
                                   </select>
                                  </div>
                                </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-block btn-success mt-5">{{ __('Create account') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
