   {{-- start Update popup form for Update Quiz in modal --}}                   
                                    <div class="Update">
                                              <h1 id="h1_monitor_any_erroh1_monitorUpdateQuiz_any_error_and_return_open_modal" style="display:none" class="{{ $errors->any() ? 'should_be_Show' : '' }}">asdasdasd _AliShown_</h1>
                                                {{-- Start Modal --}}
                                                    <!-- Modal -->
                                                    <div class="modal fade"  id="modalUpdateQuiz" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Quiz</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                 @include('includes.errors')
                                                            <form role="form" class="popup" method="POST" action="{{ route('quizzes.update',$quiz) }}">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                 {{-- name --}}
                                                         <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                            <div class="input-group input-group-alternative mb-5">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                                </div>
                                                                <input value="{{$quiz->name}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                                            </div>
                                                            @if ($errors->has('name'))
                                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                       {{-- course_id --}}               
                                                        <div class="form-group{{ $errors->has('course_id') ? ' has-danger' : '' }}">
                                                            <div class="input-group input-group-alternative mb-5">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fa fa-book" aria-hidden="true" ></i></span>
                                                                </div>
                                                                <select class="form-control" name="course_id" class="form-control" required>
                                                                {{-- <option value='' disabled selected>{{ __('course_id') }}</option> --}}
                                                                                <option value='{{$quiz->course->id}}'>{{$quiz->course->title}}</option>
                                                                                {{-- default one of option be selected automatically --}}
                                                                </select>
                                                            </div>
                                                        </div>
                                                                    {{-- Submit --}}
                                                                
                                                                    <div class="modal-footer text-center" style="padding:0;margin-top:-50px;">
                                                                        <button type="submit" class="btn btn-block btn-success mt-5">{{ __('Update Quiz') }}</button>
                                                                        <button type="button" class="closeModal btn btn-secondary btn-block mt-5" data-bs-dismiss="modal">Close</button>
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