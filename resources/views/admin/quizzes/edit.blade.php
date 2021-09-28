@extends('layouts.app', ['title' => __('quiz_Edit')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Edit quiz') . ' ',
        'description' => __('Hi '.auth()->user()->name .' can Edit a new quiz'),
        'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0"><i class="fa fa-quiz" aria-hidden="true"></i> {{ __('Edit quiz') }}</h3>
                        </div>
                    </div>
    <div class="col-12"> </div>
             @include('includes.errors')
             @include('includes.message')
                <form role="form" method="POST" action="{{ route('quizzes.update',$quiz) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group{{ $errors->has('name') ? ' has-danger ' : '' }}">
                                <div class="input-group input-group-alternative mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" type="text" name="name" value="{{$quiz->name}}" required autofocus>
                                  {{-- <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div> --}}
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
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
                                       <option value='{{$course->id}}' {{($course->id==$quiz->course_id)?'selected':''}}>{{$course->title}}</option>
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
