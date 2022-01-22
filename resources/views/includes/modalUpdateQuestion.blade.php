   {{-- start Update popup form for Update Question in modal --}}
                                    <div class="Update">
                                              <h1 id="h1_monitor_any_erroh1_monitorUpdateQuestion_any_error_and_return_open_modal" style="display:none" class="{{ $errors->any() ? 'should_be_Show' : '' }}">asdasdasd _AliShown_</h1>
                                                {{-- Start Modal --}}
                                                    <!-- Modal -->
                                                    <div class="modal fade"  id="modalUpdateQuestion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                                              {{--type --}}
                                                                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                                                                    <div class="input-group input-group-alternative mb-5">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="fa fa-book" aria-hidden="true" ></i></span>
                                                                                        </div>
                                                                                            <select class="form-control" name="type" class="form-control" value="{{ old('type') }}"  required>
                                                                                                    <option value='checkbox' {{($question->type =="checkbox")?'selected':''}}>CheckBox</option>
                                                                                                    <option value='text' {{($question->type =="text")?'selected':''}}>Text</option>
                                                                                            </select>
                                                                                    </div>
                                                                                </div>
                                                                                {{-- quiz_id --}}
                                                                            <div class="form-group{{ $errors->has('quiz_id') ? ' has-danger' : '' }}">
                                                                                    <div class="input-group input-group-alternative mb-5">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text"><i class="fa fa-book" aria-hidden="true" ></i></span>
                                                                                        </div>

                                                                                    <select class="form-control" name="quiz_id" class="form-control" >
                                                                                    {{-- <option value='' disabled selected>{{ __('quiz_id') }}</option> --}}
                                                                                        <option value='{{$question->quiz->id}}'>{{$question->quiz->name}}</option>
                                                                                        {{-- default one of option be selected automatically --}}

                                                                                    </select>
                                                                                    </div>
                                                                            </div>
                                                                            {{-- Submit --}}

                                                                            <div class="modal-footer text-center" style="padding:0;margin-top:-50px;">
                                                                                <button type="submit" class="btn btn-block btn-success mt-5">{{ __('Update Question') }}</button>
                                                                                <button type="button" class="closeModal btn btn-secondary btn-block mt-5" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                    </div>

                              {{-- end Update popup --}}
