                         {{-- h1_monitor_any_error to Know if there is an error or no and return open modal --}}
                                   <h1 id="h1_monitorQuiz_any_error_and_return_open_modal" style="display:none" class="{{ $errors->any() ? 'should_be_Show_Quiz_modal' : '' }}">asdasdasd _AliShown_</h1>
                                 {{--  <h1 id="h1_monitorQuiz_any_error_and_return_open_modal" style="display:none" class=@if($errors->has('name') || $errors->has('course_id')) 'should_be_Show_Quiz_modal' @endif>asdasdasd _AliShown_</h1>    --}}
                                       
                                       {{-- Start Modal --}}
                                        <!-- Modal -->
                            <div class="modal fade"  id="modalAddQuiz" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="CreateQuiz" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="CreateQuiz">Create Quiz</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            
                                            <div class="modal-body">
                                              @include('includes.errors')
                                                 <form role="form" method="POST" action="{{ route('quizzes.store') }}">
                                                        @csrf
                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                            <div class="input-group input-group-alternative mb-5">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                                </div>
                                                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
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
                                                                <option value='' disabled selected>{{ __('course_id') }}</option>
                                                                @foreach (\App\Models\Course::orderBy('id','desc')->get() as $course )
                                                                    <option value='{{$course->id}}'>{{$course->title}}</option>
                                                                    
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                         {{-- Submit --}}
                                                        <div class="modal-footer text-center" style="padding:0;margin-top:-50px;">
                                                            <button id="submitQuiz" type="submit" class="btn btn-block btn-success mt-5">{{ __('Create Quiz') }}</button>
                                                            <button type="button" class="closeModal btn btn-secondary btn-block mt-5" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                </form>
                                            </div>
                                            
                                      </div>
                                  </div>
                            </div>
                                 {{--End_Create_Quiz__with_popUp--}}