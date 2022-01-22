                         {{-- h1_monitor_any_error to Know if there is an erroe or no --}}
                         <h1 id="h1_monitorQuestion_any_error_and_return_open_modal" style="display:none" class="{{ $errors->any() ? 'should_be_Show_Question_modal' : '' }}">asdasdasd _AliShown_</h1>
                         {{--  <h1 id="h1_monitorQuestion_any_error_and_return_open_modal" style="display:none" class=@if($errors->has('title') || $errors->has('answer')|| $errors->has('right_answer')|| $errors->has('score')) 'should_be_Show_Quiz_modal' @endif>asdasdasd _AliShown_</h1>  --}}
                                   {{-- Start Modal --}}
                                    <!-- Modal -->
                        <div class="modal fade"  id="modalAddQuestionDetermine" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="CreateQuestion" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="CreateQuestion">Create Question</h5>
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
                                                    {{--type --}}
                                                    <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                                      <div class="input-group input-group-alternative mb-5">
                                                          <div class="input-group-prepend">
                                                              <span class="input-group-text"><i class="fa fa-book" aria-hidden="true" ></i></span>
                                                          </div>
                                                               <select class="form-control" name="type" class="form-control" value="{{ old('type') }}"  required>
                                                                      <option value='checkbox'>CheckBox</option>
                                                                      <option value='text'>Text</option>
                                                               </select>
                                                      </div>
                                                    </div>
                                                   {{-- quiz_id --}}
                                                    <div class="form-group{{ $errors->has('quiz_id') ? ' has-danger' : '' }}">
                                                            <div class="input-group input-group-alternative mb-5">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fa fa-book" aria-hidden="true" ></i></span>
                                                                </div>
                                                                <select class="form-control" name="quiz_id" class="form-control" value="{{ old('quiz_id') }}"  required>
                                                                            <option value='{{$quiz->id}}'>{{$quiz->name}}</option>
                                                                </select>
                                                            </div>
                                                     </div>
                                                     {{-- Submit --}}

                                                    <div class="modal-footer text-center" style="padding:0;margin-top:-50px;">
                                                        <button id="submitQuestion" type="submit" class="btn btn-block btn-success mt-5">{{ __('Create Question') }}</button>
                                                        <button type="button" class="closeModal btn btn-secondary btn-block mt-5" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                             </form>
                                        </div>

                                        </div>
                                    </div>
                                 </div>
                             {{--End_Create_Question__with_popUp--}}
