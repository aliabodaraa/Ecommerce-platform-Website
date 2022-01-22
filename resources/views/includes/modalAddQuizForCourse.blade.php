                      <div class="modalAddQuizForCourse">
                            
                         {{-- h1_monitor_any_error to Know if there is an error or no and return open modal --}}
                                   <h1 id="h1_monitorQuizForCourse_any_error_and_return_open_modal" style="display:none" class=@if($errors->has('name') || $errors->has('course_id')) 'should_be_Show_Quiz_modal' @endif>asdasdasd _AliShown_</h1>
                                 {{--  <h1 id="h1_monitorQuiz_any_error_and_return_open_modal" style="display:none" class=@if($errors->has('name') || $errors->has('course_id')) 'should_be_Show_Quiz_modal' @endif>asdasdasd _AliShown_</h1>    --}}
                                       
                                       {{-- Start Modal --}}
                                        <!-- Modal -->
                            <div class="modal fade"  id="modalAddQuizForCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="CreateQuiz" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="CreateQuiz">Create Quiz For <b style="color:red">{{$course->title}}</b> Course</h5>
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
                                                                  <option value='{{$course->id}}'>{{$course->title}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                         {{-- Submit --}}
                                                        <div class="modal-footer text-center" style="padding:0;margin-top:-50px;">
                                                            <button type="submit" name="ali" class="btn btn-block btn-success mt-5" onclick="myFunction()">{{ __('Create Quiz') }}</button>
                                                            <button type="button" class="closeModal btn btn-secondary btn-block mt-5" data-bs-dismiss="modal">Close</button>
                                                   
                                                  
                                                           {{--  @if($errors->any() &&  isset($_POST['submit'])){
                                                    <script>window.location = "/admin/courses/".{{$course->id}};</script>
                                                             @else 
                                                            <script>window.location = "/admin/courses";</script>  -
                                                            @endif 
                                                            <h2 id="h2" class="{{$errors->any()? 'observer':''}}"></h2>  

                                                              <script> function myFunction(event e) {
                                                                   if (document.getElementById('h2').classList.contains('observer')) {
                                                                       window.location = "/";
                                                                       } else {
                                                                        window.location = "/dashboard";
                                                                        e.preventDefault(); }} 
                                                                         </script>  --}}
                                                        </div>
                                                       
                                                </form>
                                            </div>
                                            
                                      </div>
                                  </div>
                            </div>
                                 {{--End_Create_Quiz__with_popUp--}}
    </div>