@extends('layouts.app', ['title' => __('Edit_User')])

@section('content')
    @include('admin.users.partials.header', [
         'title' => 'Hello'. ' '. auth()->user()->name.' You can Update information to [user:'.$user->name .']',
        'description' => __('you can Update This user'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                  {{--  <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">  --}}
                                  @if ($user->photo)  
                                      <img src="{{asset('/img/'.$user->photo->filename)}}" class="rounded-circle">
                                    @else
                                      <img src="https://images.hepsiburada.net/banners/s/0/672-378/bannerImage2121_20210311083848.png" class="rounded-circle">
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                    {{--  <div class="spinner-grow text-info" role="status">
  <span class="visually-hidden">Loading...</span>
</div>  --}}
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">{{count($user->tracks)}}</span>
                                        <span class="description">{{ __('Num of tracks have watched with him') }}</span>
                                    </div>
                                    <div>
                                    @php
                                         $count_course=0;
                                    @endphp
                                        <span class="heading">
                                        @foreach($user->tracks as $track)
                                          @foreach ($track->courses as $course)
                                             @php
                                             ++$count_course;
                                            @endphp
                                          @endforeach
                                        @endforeach
                                        {{$count_course}}
                                        </span>
                                        <span class="description">{{ __('Num of courses have watched with him') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ $user->score }}</span>
                                        <span class="description">{{ __('Score') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{$user->name }}, <p class="text-primary">{{($user->admin==1)?'Admin':'User'}}<p>
                                <span class="font-weight-light">, ID:{{$user->id }} ,</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('Solution Manager - Creative Tim Officer') }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div>
                            <hr class="my-4" />
                            <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                            <a href="#">{{ __('Show more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Create Profile') }}</h3>
                        </div>
                    </div>
                    {{--  @php echo $user @endphp  --}}
                    {{--  {!!  Form::model($postToUpdate ,array('method'=>'PATCH' ,'route'=> ['user.update',$user->id] )) !!}  --}}
                <form role="form" method="POST" action="{{ route('users.update',$user->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ $user->name }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{  $user->email}}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" value="{{$user->password}}" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                                    </div>

                                    <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" value="{{$user->password}}" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-block btn-success mt-5">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
