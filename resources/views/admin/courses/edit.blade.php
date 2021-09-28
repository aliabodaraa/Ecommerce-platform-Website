@extends('layouts.app', ['title' => __('Update_Course')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Update Course') . ' ',
        'description' => __('Hi '.auth()->user()->name .' can Update a new course'),
        'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-1"><i class="fa fa-edit" aria-hidden="true" style="color:#888;font-size:20px"></i> {{ __('Update Course') }}</h3>
                        </div>
                    </div>
      <div class="col-12"> </div>
{{-- glyphicon glyphicon-search --}}
            
             @include('includes.errors')
             @include('includes.message')

                    <a href="{{route('courses.index')}}" class="menu__item menu__item--orange buttonEffect-plus" data-background="red">
                       <i class="fa fa-home" style="font-size: 30px;"></i>
                    </a>
                    
                <form role="form" method="POST" action="{{ route('courses.update',$course) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
{{-- Title --}}
                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('title') }}" type="text" name="title" value="{{$course->title}}" required autofocus>
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
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('link') }}" type="link" name="link" value="{{$course->link}}" required>
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
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                {{-- @php echo $course->photo->filename; @endphp  --}}
                                    <input type="file" name="image" value="" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}">
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
                                        <span class="input-group-text"><i class="ni ni-status-83"></i></span>
                                    </div>
                                   <select class="form-control" name="status" class="form-control" required>
                                     <option value='0' @php if($course->status==0) echo 'selected'; @endphp>Free</option>
                                     <option value='1' {{($course->status==1)? 'selected':''}}>Paid</option>
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
                                        <span class="input-group-text"><i class="ni ni-track_id-83"></i></span>
                                    </div>
                                   <select class="form-control" name="track_id" class="form-control" value="{{$course->track_id}}" required>
                                   @foreach (\App\Models\Track::all() as $track )
                                       <option value='{{$track->id}}' {{($course->track_id==$track->id)?'selected':''}}>{{$track->name}}</option>
                                   @endforeach
                                   </select>
                                  </div>
                                @if ($errors->has('track_id'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('track_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                               <div class="text-center">
                                <button type="submit" class="btn btn-block btn-success mt-5">{{ __('Update Course') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
