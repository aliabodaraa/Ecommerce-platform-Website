<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
       <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                {{--  Dropdown top-right  --}}
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                        
                    </div>
                </div>
            </div>
            <!-- Form input search-->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!--argon Navigation -->
            <ul class="navbar-nav">
                {{--  <h1 style="color:red">asdfasf</h1>  --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                       <i class='fas fa-desktop text-primary'></i> {{ __('Dashboard') }}
                    </a>
                </li>
                @if (auth()->user()->email=='aliRamadanAboudaraa@yahoo.com' || auth()->user()->id==1)
                    
                <li class="nav-item">
                    <a class="nav-link active" href="#admin" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                       <i class='fas fa-user' style="color: #f4695f;" ></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Admin') }}</span>
                    </a>
                    <div class="collapse show" id="admin">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.create') }}">
                                  <i class='fas fa-user-plus' style="color:#2a2"></i>  {{ __('New Admin') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.index') }}">
                                    <i class='fas fa-table' style="color:#f4645f"></i>{{ __('Admin Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

             @endif
                <li class="nav-item">
                    <a class="nav-link active" href="#user" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                      <i class='fas fa-users' style="color:#f4645f"></i>
                        <span class="nav-link-text">{{ __('Users') }}</span>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.create') }}">
                                   <i class='fas fa-user-plus' style="color:#23a"></i> {{ __('New User') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">
                                   <i class="fa fa-table" aria-hidden="true" style="color:#2a2"></i> {{ __('User Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/admin/tracks">
                        <i class="fa fa-chart-bar text-blue" aria-hidden="true" style="color:f46422"></i> {{ __('Tracks') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('courses.index') }}">
                       <i class="fa fa-chalkboard-teacher" aria-hidden="true" style="color:#5f9"></i> {{ __('Courses') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('videos.index') }}">
                        <i class="fab fa-youtube" aria-hidden="true" style="color:red"></i> {{ __('Videos') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('quizzes.index') }}">
                        <i class="fa fa-edit text-blue" aria-hidden="true" style="color:#5701ce"></i> {{ __('Quizzes') }}
                    </a>
                </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('questions.index') }}">
                       <i class="fa fa-question-circle text-blue" aria-hidden="true" style="color:green"></i> {{ __('Questions') }}
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
        </div>
    </div>
</nav>
