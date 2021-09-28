@extends('layouts.app', ['title' => __('Courses_Managmaent')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Index_Courses Page') . ' '. auth()->user()->name,
        'description' => __('Index_Courses'),
        'class' => 'col-lg-7'
    ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-3"><i class="fa fa-book" aria-hidden="true" style="color:#888;font-size:20px"></i> Courses Home</h3>
                        </div>
                    </div>
                </div>

                <div class="col-12"> </div>
{{-- glyphicon glyphicon-search --}}
            
             @include('includes.errors')
             @include('includes.message')
      
            {{--  class offset-sm-1   --}}
                    {{-- <div class="form-group class ">
                      <a href="{{route('courses.create')}}" name="addcourse" class="btn btn-warning btn-block buttonEffect" style="padding:10px ;">
                      Add course </a>  
                  </div> --}}
       
             
                    <a href="{{route('courses.create')}}" class="menu__item menu__item--orange buttonEffect-plus" data-background="red">
                       <i class="fa fa-plus" style="font-size: 30px;"></i>
                    </a>
               
                       
                         
                          
                               
                          
               
                    
                 
            
            {{-- <div class="search">
                <input type="text" class="form-control" placeholder="ابحث عن قسم" name="search" value=" {{request('search')}}" style="
     padding-left: 25px;
     border: 1px solid #8b939a;
     right: -3px;
     border-radius: 0px;
     position: absolute;
     color: #8c8c8c;
     font-size: 22px;
     margin-bottom: 171px;
     margin-top: -50px;
     top: -11px;
     height: 59px;
     white-space: nowrap;">

                <button class="btn1 " type="submit" style="
                                background-color: #8b939a;
                                height: 55px;
                                width: 10%;
                                z-index: 99999;
                                left: 5px;
                                top: -67px;
                                position: absolute;">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
            <div class="sidenav collapse  navbar-collapse" id="myNavbar">

                <a href="#about"><i class="fa fa-user"></i> User</a>
                <hr>
                <a href="#Home"><i class=" fa fa-home"></i> Home</a>
                <hr>
                <button class="dropdown-btn btnList1 "> List1
                    <i class="fa fa-plus-circle"></i>
                </button>
                <div class="dropdown-container ">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                    <a href="#">Link 4</a>
                    <a href="#">Link 5</a>
                    <a href="#">Link 6</a>
                </div>
                <hr>
                <a href="#services"><i class="fa fa-suitcase"></i> Services</a>
                <hr>
                <a href="#contact"><i class='fas fa-user-plus'></i> Create New User</a>
                <hr>
                <button href="#" class="dropdown-btn btnList2">List 2
                    <i class="fa fa-plus-circle"></i>
                </button>

                <div class="dropdown-container ">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
                <hr>

                <a href="#Security"><i class='fas fa-shield-alt'></i> Security Application</a>
                <hr>
                <a href="#Themes"><i class='fas fa-palette'></i> Themes</a>
                <hr>

                <a href="#Edit"><i class="fas fa-user-edit"></i> Edit</a>
                <hr>
                <a href="#Settings"><i class="fas fa-users-cog"></i> Settings</a>
                <hr>
                <a href="#contact"><i class="fa fa-search"></i> Search</a>
                <hr>
                <a href="#Help"><i class="fa fa-info-circle"></i> Help</a>
                <hr>
                <a href="#ContactUs"><i class="fas fa-comments"></i> Contact Us</a>
                <hr>
                <a href="#logIn"><i class="fa fa-sign-in"></i> log In</a>
                <hr>
                <a href="#logOut"><i class="fa fa-sign-out"></i> log Out</a>
                <!-- <hr>
                <a href="#"><span class="gt"><i style="font-size:34px;color: red;" class="fa">&#xf152;</i></a> -->

            </div> --}}

        
    
                      
                {{--  _____Courses_____  --}} 
    @if (count($courses))  
    <div class="container-fluid" style="padding-right: 20px !important; padding-left: 20px !important;">
        <div class="row">
            @foreach ($courses as $course )
            {{-- @if ($course->photo)  --}}
            <div class="col-xs-3">
                <div class="card" style="width: 20.6rem;margin:3px">
                       @if ($course->photo)  
                       {{-- @php
                        echo $course->photo->filename; 
                        echo '/assets/img/'.$course->photo->filename
                       @endphp --}}
                       <img src="{{asset('/img/'.$course->photo->filename)}}" class="card-img-top" alt="photo{{$loop->index}}">
                      @else
                     <img src='https://via.placeholder.com/300/' class="card-img-top" alt="photo{{$loop->index}}">
              
                        @endif  
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ \Str::limit($course->link,33) }}</p>
                        <p>{{ $course->status }}</p>
                        <a href="{{route('courses.show',$course)}}" class="btn btn-info">Show <i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="{{route('courses.edit',$course)}}" class="btn btn-light">Edit <i class="fa fa-edit" aria-hidden="true"></i></a>
                        <form method="POST" action="{{route('courses.destroy',$course)}}" style="display: inline;">
                               @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" value="Delete" type="submit" onclick="confirm('Are You Sure you want to Delete this Admin')?this.parentElement.submit():'' ">
                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                         
                    </div>
                </div>
            </div>
            {{-- @endif --}}
            @endforeach
        </div>
    </div>            
    @else
        <p class="lead text-center">There is No Course Found </p> 
    @endif   
        {{--  _____Courses_____  --}}
        
      
    </div>
</div>
</div>
@include('layouts.footers.auth')
</div> 
@endsection

   

