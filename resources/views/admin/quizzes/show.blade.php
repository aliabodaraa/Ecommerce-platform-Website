@extends('layouts.app', ['title' => __('quizzes_Managmaent')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('show_quizzes Page') . ' '. auth()->user()->name,
        'description' => __('show_quizzes'),
        'class' => 'col-lg-7'
    ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center" style="justify-content: space-around;">
                        <div class="col-4" style="position:relative;left:-51px;">
                            <h3 class="mb-0">
                            {{--mb-0  to give more height  --}}
                            Quiz Name:
                            <small class="text-muted">{{$quiz->name}}</small>
                            </h3>
                        </div>
                          <div class="col-2 text-right">
                            <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary">Add Quiz</a>
                        </div>
            {{-- Create Question in modal PopUp --}}
                        <div class="col-2 text-right Create">
                                        {{-- <!-- Button trigger modal --> --}}
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Add Question
                                        </button>
                            
                                {{-- h1_monitor_any_error to Know if there is an erroe or no --}}
                                <h1 id="h1_monitor_any_error" style="display:none" class="{{ $errors->any() ? 'should_be_Show' : '' }}">asdasdasd _AliShown_</h1>
                                       {{-- Start Modal --}}
                                        <!-- Modal -->
                                        <div class="modal fade"  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Create Question</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            
                                            <div class="modal-body">
                                 @include('includes.errors')
                                                 <form role="form" class="popup" method="POST" action="{{ route('questions.store') }}">
                                                        @csrf
                                                        {{-- title --}}
                                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                                            <div class="input-group input-group-alternative mb-5">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                                </div>
                                                                <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('title') }}" type="text" name="title" value="{{ old('title') }}" required autofocus>
                                                            </div>
                                                            @if ($errors->has('title'))
                                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                                    <strong>{{ $errors->first('title') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    {{-- answer --}}
                                                     <div class="form-group{{ $errors->has('answer') ? ' has-danger' : '' }}">
                                                            <div class="input-group input-group-alternative mb-5">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                                </div>
                                                                <input class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" value="{{ old('answer') }}" placeholder="{{ __('answer') }}" type="text" name="answer" required autofocus>
                                                            </div>
                                                            @if ($errors->has('answer'))
                                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                                    <strong>{{ $errors->first('answer') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                      {{-- right_answer --}}
                                                        <div class="form-group{{ $errors->has('right_answer') ? ' has-danger' : '' }}">
                                                            <div class="input-group input-group-alternative mb-5">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                                </div>
                                                                <input class="form-control{{ $errors->has('right_answer') ? ' is-invalid' : '' }}" value="{{ old('right_answer') }}" placeholder="{{ __('right_answer') }}" type="text" name="right_answer" required autofocus>
                                                            </div>
                                                            @if ($errors->has('right_answer'))
                                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                                    <strong>{{ $errors->first('right_answer') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        {{-- score --}}
                                                         <div class="form-group{{ $errors->has('score') ? ' has-danger' : '' }}">
                                                            <div class="input-group input-group-alternative mb-5">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                                </div>
                                                                <input class="form-control{{ $errors->has('score') ? ' is-invalid' : '' }}" value="{{ old('score') }}" placeholder="{{ __('score') }}" type="text" name="score" required autofocus>
                                                            </div>
                                                            @if ($errors->has('score'))
                                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                                    <strong>{{ $errors->first('score') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>   
                                                              {{-- quiz_id --}}
                                                        <div class="form-group{{ $errors->has('quiz_id') ? ' has-danger' : '' }}">
                                                                <div class="input-group input-group-alternative mb-5">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fa fa-book" aria-hidden="true" ></i></span>
                                                                    </div>
                                                                   
                                                                <select class="form-control" name="quiz_id" class="form-control" value="{{ old('quiz_id') }}"  required>
                                                                {{-- <option value='' disabled selected>{{ __('quiz_id') }}</option> --}}
                                                                    <option value='{{$quiz->id}}'>{{$quiz->name}}</option>
                                                                    {{-- default one of option be selected automatically --}}
                                                              
                                                                </select>
                                                                </div>
                                                         </div>
                                                         {{-- Submit --}}
                                                     
                                                        <div class="modal-footer text-center" style="padding:0;margin-top:-50px;">
                                                            <button type="submit" class="btn btn-block btn-success mt-5">{{ __('Create Question') }}</button>
                                                            <button id="close" type="button" class="btn btn-secondary btn-block mt-5" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                 </form>
                                            </div>
                                            
                                            </div>
                                        </div>
                                     </div>
                      {{--End_Create_Question__with_popUp--}}

                                    
                         


                        </div>
                    </div>
                
                </div>

                <div class="col-12"> </div>

            
             {{-- @include('includes.errors') --}}
             @include('includes.message')
      
            {{--  class offset-sm-1   --}}
             {{-- <h1>{{$quiz->questions[1]->title}} {{$quiz->name}} </h1> --}}
         @if (count($quiz->questions))
              <div class="table-responsive">
                 <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                           <tr>
                                <th scope="col">title</th>
                                <th scope="col">answer</th>
                                <th scope="col">right_answer</th>
                                <th scope="col">score</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col" class="text-right"></th>
                            </tr>
                    </thead>
                    <tbody>
                        {{--  @php echo $users @endphp  --}}
             
                         @foreach ($quiz->questions as $question)
                                <tr>
                                    <td>{{$question->title}}</td>
                                    <td>{{$question->answer}}</td>
                                    <td>{{$question->right_answer}} Course</td>
                                     <td>{{$question->score}}</td>
                                     <td>{{$question->created_at->diffForHumans()}}</td>
                                   <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a type="button" class="Go_to_class_update dropdown-item btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#UpdateWithPopUp">
                                                          Update This Question</a>            
                                                <button type="button" class="dropdown-item btn btn-danger" data-bs-toggle="modal" data-bs-target="#Verify_Delete">
                                                  Delete
                                                 </button>                  
                                          </div>
                                        </div>
                                    </td> 
                               </tr>
                              </div>
                              {{-- _________Verify Do You Want To Delete This Question________ --}}
                                                                                <div class="modal fade" id="Verify_Delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h2 class="modal-title" id="staticBackdropLabel">Are You Sure To Delete ?</h2>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                     <h3>  If click Agree The Quiz :{{$question->title}} Will be Delete Immediately </h3>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <form method="POST" action="{{route('questions.destroy',$question)}}">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button type="submit" class="btn btn-danger">Agree</button>
                                                                                        </form>
                                                                                        <button type="button" class="Xclose btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        
                                                                                    </div>
                                                                                    </div>
                                                                                </div>
                                                                                </div>

                            {{-- _____End_Verify_Delete_____ --}}
                              {{-- start Update popup form for Update Question in modal --}}                   
                                    <div class="Update">
                                            <h1 id="h1_monitor_any_error1" style="display:none" class="{{ $errors->any() ? 'should_be_Show' : '' }}">asdasdasd _AliShown_</h1>
                                                {{-- Start Modal --}}
                                                    <!-- Modal -->
                                                    <div class="modal fade"  id="UpdateWithPopUp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Question</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                 @include('includes.errors')
                                                            <form role="form" class="popup" method="POST" action="{{ route('questions.update',$question) }}">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    {{-- title --}}
                                                                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                                                        <div class="input-group input-group-alternative mb-5">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                                            </div>
                                                                            <input value="{{$question->title}}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('title') }}" type="text" name="title" required autofocus>
                                                                        </div>
                                                                        @if ($errors->has('title'))
                                                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                <strong>{{ $errors->first('title') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                {{-- answer --}}
                                                                <div class="form-group{{ $errors->has('answer') ? ' has-danger' : '' }}">
                                                                        <div class="input-group input-group-alternative mb-5">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                                            </div>
                                                                            <input value="{{$question->answer}}" class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" placeholder="{{ __('answer') }}" type="text" name="answer" required autofocus>
                                                                        </div>
                                                                        @if ($errors->has('answer'))
                                                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                <strong>{{ $errors->first('answer') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                {{-- right_answer --}}
                                                                    <div class="form-group{{ $errors->has('right_answer') ? ' has-danger' : '' }}">
                                                                        <div class="input-group input-group-alternative mb-5">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                                            </div>
                                                                            <input value="{{$question->right_answer}}" class="form-control{{ $errors->has('right_answer') ? ' is-invalid' : '' }}" placeholder="{{ __('right_answer') }}" type="text" name="right_answer" required autofocus>
                                                                        </div>
                                                                        @if ($errors->has('right_answer'))
                                                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                <strong>{{ $errors->first('right_answer') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    {{-- score --}}
                                                                    <div class="form-group{{ $errors->has('score') ? ' has-danger' : '' }}">
                                                                        <div class="input-group input-group-alternative mb-5">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                                            </div>
                                                                            <input value="{{$question->score}}" class="form-control{{ $errors->has('score') ? ' is-invalid' : '' }}" placeholder="{{ __('score') }}" type="text" name="score" required autofocus>
                                                                        </div>
                                                                        @if ($errors->has('score'))
                                                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                <strong>{{ $errors->first('score') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>   
                                                                        {{-- quiz_id --}}
                                                                    <div class="form-group{{ $errors->has('quiz_id') ? ' has-danger' : '' }}">
                                                                            <div class="input-group input-group-alternative mb-5">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fa fa-book" aria-hidden="true" ></i></span>
                                                                                </div>
                                                                            
                                                                            <select class="form-control" name="quiz_id" class="form-control" >
                                                                            {{-- <option value='' disabled selected>{{ __('quiz_id') }}</option> --}}
                                                                                <option value='{{$quiz->id}}'>{{$quiz->name}}</option>
                                                                                {{-- default one of option be selected automatically --}}
                                                                        
                                                                            </select>
                                                                            </div>
                                                                    </div>
                                                                    {{-- Submit --}}
                                                                
                                                                    <div class="modal-footer text-center" style="padding:0;margin-top:-50px;">
                                                                        <button type="submit" class="btn btn-block btn-success mt-5">{{ __('Update Question') }}</button>
                                                                        <button id="close1" type="button" class="btn btn-secondary btn-block mt-5" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                        
                                                        </div>
                                                    </div>
                                                    </div>
                                           </div>
                                     </div>  
                                    </div>  
                              {{-- end Update popup --}}  
                        @endforeach
                    </tbody>
                </table>
         @else
            <p class="lead text-center">There is No questions Found </p> 
        @endif    
            </div>
        <div class="card-footer" style="text-align: center;">
            {{-- <nav class="" aria-label="...">
              {{$quiz->questions->links()}}
            </nav> --}}
      </div>
    </div>
</div>
</div>
@include('layouts.footers.auth')
</div> 
@endsection