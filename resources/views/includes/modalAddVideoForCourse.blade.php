
  <h1 id="h1_monitorVideoForCourse_any_error_and_return_open_modal" style="display:none" class="{{ $errors->any() ? 'should_be_Show_Video_modal' : '' }}">asdasdasd _AliShown_</h1>                      
                                   
                                        <!-- Modal -->
         <div class="modal fade" id="modalAddVideoForCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="CreateVideo" aria-hidden="true">
              <div class="modal-dialog">
                    <div class="modal-content">
                             <div class="modal-header">
                                <h5 class="modal-title" id="CreateVideo">Create Video</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                 @include('includes.errors')
                                  <form role="form" method="POST" action="{{ route('videos.store') }}">
                                                            @csrf
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
                                                            <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                                                <div class="input-group input-group-alternative mb-5">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                                                                    </div>
                                                                    <input class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('link') }}" type="link" name="link" value="{{ old('link') }}" required>
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
                                                                     <option value='{{$course->id}}'>{{$course->title}}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer text-center" style="padding:0;margin-top:-50px;">
                                                                        <button type="submit" class="btn btn-block btn-success mt-5">{{ __('Create Video') }}</button>
                                                                        <button type="button" class="closeModal btn btn-secondary btn-block mt-5" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                  </form>
                            </div>
                    </div>
              </div>
        </div>
                        
                     
               {{-- end Update popup --}}  