   {{-- start AddCourse popup form for AddCourse Question in modal --}}                   
                                 
                                          
                                                {{-- Start Modal --}}
                                                    <!-- Modal -->
                                                    <div class="modal fade"  id="AddCourseWithPopUp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">AddCourse </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                          @include('includes.errors')
                                                            <form role="form" method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                {{-- Title --}}
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
                                                                {{-- description --}}
                                                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                                                        <div class="input-group input-group-alternative mb-5">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                                                            </div>
                                                                            <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}" type="text" name="description" value="{{ old('description') }}" required>
                                                                        </div>
                                                                        @if ($errors->has('description'))
                                                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                <strong>{{ $errors->first('description') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                {{-- link --}} 
                                                                    <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                                                        <div class="input-group input-group-alternative mb-5">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                                                            </div>
                                                                            <input class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('link') }}" type="link" name="link" required>
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
                                                                                <span class="input-group-text"><i class='far fa-image' style="font-size:20px"></i></span>
                                                                            </div>
                                                                            <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="{{ __('image') }}" type="file" name="image" required>
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
                                                                                <span class="input-group-text"><i class='fas fa-dollar-sign'></i></span>
                                                                            </div>
                                                                        <select class="form-control" name="status" class="form-control" required>
                                                                            <option value='0'>Free</option>
                                                                            <option value='1'>Paid</option>
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
                                                                                <span class="input-group-text"><i class="fa fa-road" aria-hidden="true" style="color:f46422"></i></span>
                                                                            </div>
                                                                        <select class="form-control" name="track_id" class="form-control" required>
                                                                        @foreach (\App\Models\Track::all() as $track )
                                                                            <option value='{{$track->id}}'>{{$track->name}}</option>
                                                                        @endforeach
                                                                            
                                                                        </select>
                                                                        </div>
                                                                        @if ($errors->has('track_id'))
                                                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                <strong>{{ $errors->first('track_id') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                      {{-- Submit --}}
                                                                
                                                                    <div class="modal-footer text-center" style="padding:0;margin-top:-50px;">
                                                                        <button type="submit" class="btn btn-block btn-success mt-5">{{ __('Create Course') }}</button>
                                                                        <button type="button" class="closeModal btn btn-secondary btn-block mt-5" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                            </form>         
                                                        </div>
                                                        
                                                        </div>
                                                    </div>
                                                    </div>
                                           </div>
                                     </div>  
                                    
                              {{-- end Update popup --}}  