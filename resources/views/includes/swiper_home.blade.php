<!--Swipper Card-->

    

 <div class="container1Info1">
        <div class="container-fluid">
      
        {{--  <div class="main-header anim" style="--delay: 0s">Courses</div>  --}}
       
                <div style="margin: auto;">
                    <div class="container2Info">
                          <!-- Swiper -->
                        <div class="swiper-container swiper-container-main1">
                            <div class="swiper-wrapper" >
                         {{--  @foreach($tracks->courses()->limit(5)->get() as $course)   ($tracks nested for2) is instance of ($tracks_with_courses for1) --}}
                          @foreach($courses as $course) 
                                <div class="swiper-slide minimum-height">
                                    <div class="textBehindEachPhoto">
                                        <!-- here -->
                                        <div class="sf-Share-O5q7O">
                                            <button type="button" class="sf-hb-button-3mxAT hb-button sf-Share-2YBgl" tabindex="0" data-hbus=""><span
                                                    class="sf-hb-button-32HAC hb-button__content"><span
                                                        class="sf-hb-button-1bEW5 hb-button__icon-container"><span
                                                            class="sf-hb-button-2Bs_u sf-Share-2z71D hb-button__icon"></span></span></span></button>
                                        </div>
                                        <div class="jumbotron text-center" style="padding-right:4px;padding-left:0;">
                                            <h1 style="text-transform: capitalize;">{{\Str::limit($course->title,22)}}</h1>
                                            <h3 class="{{($course->status==1)?'text-success':'text-muted'}}">{{($course->status==1)?strtoupper('Paid'):strtoupper('Free')}}</h3>
                                            <h5>{{\Str::limit($course->link,48)}}</h5>

                                            @if(count($course->users)>=1)
                                                      <b style="font-size: 26px;">Users who used the Course:</b>
                                                    @else
                                                      <h4 class="text-muted">No Users</h4>
                                                    @endif
                                             <div class="row moreUserInstance" style="margin-bottom: 10px;--bs-gutter-y: 10px;margin-left: 75px;margin-top: 2px;">
                                                    @foreach($course->users()->limit(100)->get() as $user)
                                                       <div style="oneUserInstance">
                                                            <div class="img"  style="float: right">
                                                                    @if ($user->photo)
                                                                        <img class="author-img" src="{{asset('/img/'.$user->photo->filename)}}">
                                                                    @else
                                                                        <img class="author-img" src="https://images.pexels.com/photos/3370021/pexels-photo-3370021.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                                                                    @endif
                                                            </div>
                                                            <div style="text-align: right;"><h6 style="margin-top: 6px;margin-bottom: -2px;"><a href="{{route('users.edit',$user)}}" style="text-decoration: none;">{{$user->name}}</a></h6></div>
                                                            <div style="font-size: 12px;text-align: right;">{{count($course->videos)}} videos<span class="seperate video-seperate"></span>{{$user->created_at->diffForHumans()}}</div>
                                                        </div>
                                                         {{--  <hr style="margin: 0px 15px 0 auto;width: 60%">  --}}
                                                     @endforeach
                                            </div>

                                             <button class="btn-new">{{\Str::limit($course->track->name,25)}}</button>
                                        </div>
                                    </div>
                                    @if ($course->photo)
                                      <img src="{{asset('/img/'.$course->photo->filename)}}">
                                    @else
                                      <img src="https://images.hepsiburada.net/banners/s/0/672-378/bannerImage2121_20210311083848.png">
                                    @endif
                               </div>

                            @endforeach
                            </div>
 
                        </div>

                        <!-- Swiper thumbnails -->

                        <div class="swiper-container gallery-thumbs1">

                            <div class="swiper-wrapper">

                                <div class="swiper-button-prev btn-new"><i style='font-size:24px' class='fas'>&#xf060;</i>
                                </div>
                              @foreach($courses as $course)
                                <div class="swiper-slide swiper-slide-thumbs">
                                     @if ($course->photo)
                                      <img src="{{asset('/img/'.$course->photo->filename)}}">
                                    @else
                                      <img src="https://images.hepsiburada.net/banners/s/0/672-378/bannerImage2121_20210311083848.png">
                                    @endif
                                </div>
                               @endforeach
                                <div class="button-next">
                                    <div class="swiper-slide swiper-slide-thumbs">
                                        <!-- Empty -->
                                    </div>
                                    <button class="swiper-button-next btn-new">
                                        <span style="display:none">Menu 2 </span>&nbsp;<i style='font-size:24px'
                                            class='fas'>&#xf061;</i>
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>



            </div>


        </div>
       
