@php
        $tracks=App\Models\Track::orderBy('id','DESC')->limit(5)->get();
        $courses=App\Models\Course::orderBy('id','DESC')->limit(5)->get();
        $quizzes=App\Models\Quiz::orderBy('id','DESC')->limit(5)->get();
        $users=App\Models\User::where('admin',0)->orderBy('id','DESC')->get();
  @endphp
@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-6 mb-5 mb-xl-0">
                {{-- <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Sales value</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div> --}}
                <h2 class="text-light">Last Courses</h2>
                    @if (count($courses))
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page Courses</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('courses.index')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-success">
                                    <tr>
                                        <td scope="col">Title</th>
                                        {{-- <td scope="col">Status</th> --}}
                                        <td scope="col">Link</th>
                                        <td scope="col">Name Included Track</th>
                                        <td scope="col">Creation Date</th>
                                        <td scope="col">Num Of Videos</th>
                                    </tr>
                            </thead>
                            <tbody>
                                {{--  @php echo $users @endphp  --}}

                                @foreach ($courses as $course)
                                        <tr>
                                            <td>{{\Str::limit($course->title,9)}}</td>
                                            {{-- <td>{{$course->status}}</td> --}}
                                            <td>{{\Str::limit($course->link,15)}}</td>
                                            <td>{{$course->track->name}}</td>
                                            <td>{{$course->created_at->diffForHumans()}}</td>
                                            <td>{{count($course->videos)}} Video</td>

                                    </tr>

                                        </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                     </div>
                @else
                    <p class="lead text-center">There is No courses Found </p>
                @endif

            </div>
        <div class="col-xl-6">
                {{-- <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div> --}}

                <h2 class="text-light">Last Users</h2>
                         @if (count($users))
         <div class="card shadow">
                <div class="card-header border-0">
                     <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page users</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('courses.index')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                       </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                    <tr>
                                     <td scope="col">ID</th>
                                        <td scope="col">Name</th>
                                        {{-- <td scope="col">Email</th> --}}
                                        <td scope="col">Verified</th>
                                        {{-- <td scope="col">Creation Date</th> --}}
                                        <td scope="col">Num Track</th>
                                        <td scope="col">Num Course</th>
                                        <td scope="col">Num Quiz</th>
                                        <td scope="col">Num Video</th>
                                    </tr>
                            </thead>
                            <tbody>
                                {{--  @php echo $users @endphp  --}}

                                @foreach ($users as $user)
                                        <tr>
                                        <td>{{$user->id}}</td>
                                             <td>{{\Str::limit($user->name)}}</td>
                                             {{-- <td>{{\Str::limit($user->email,10)}}</td> --}}
                                             <td class="{{($user->email_verified_at) ? 'text-success':'text-muted'}}">{{($user->email_verified_at) ? 'Verified':'UnVerified'}}</td>
                                             {{-- <td>{{$user->created_at->diffForHumans()}}</td> --}}
                                             <td>{{count($user->tracks)}} Track</td>
                                             <td>{{count($user->courses)}} Course</td>
                                             <td>{{count($user->quizzes)}} Quiz</td>
                                             <td>{{count($user->tracks)}} Video</td>
                                    </tr>

                                        </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                @else
                    <p class="lead text-center">There is No users Found </p>
                @endif
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-xl-6 mb-5 mb-xl-0">
                 {{-- <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page visits</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Page name</th>
                                    <th scope="col">Visitors</th>
                                    <th scope="col">Unique users</th>
                                    <th scope="col">Bounce rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        /argon/
                                    </th>
                                    <td>
                                        4,569
                                    </td>
                                    <td>
                                        340
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/index.html
                                    </th>
                                    <td>
                                        3,985
                                    </td>
                                    <td>
                                        319
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/charts.html
                                    </th>
                                    <td>
                                        3,513
                                    </td>
                                    <td>
                                        294
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/tables.html
                                    </th>
                                    <td>
                                        2,050
                                    </td>
                                    <td>
                                        147
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        /argon/profile.html
                                    </th>
                                    <td>
                                        1,795
                                    </td>
                                    <td>
                                        190
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>  --}}
                   <h2 class="text-light">Last Quizzes</h2>
                    @if (count($courses))
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page quizzes</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-success">
                                    <tr>
                                        <td scope="col">name</th>
                                        <td scope="col">Name Included Course</th>
                                        <td scope="col">Creation Date</th>
                                        <td scope="col">Num Of Questions</th>
                                        <td scope="col">Num Of Users</th>
                                    </tr>
                            </thead>
                            <tbody>
                                {{--  @php echo $users @endphp  --}}

                                @foreach ($quizzes as $quiz)
                                        <tr>
                                            <td>{{\Str::limit($quiz->name,9)}}</td>
                                            <td>{{$quiz->course_id}}</td>
                                            <td>{{$quiz->created_at->diffForHumans()}}</td>
                                            <td>{{count($quiz->questions)}} Question</td>
                                            <td>{{count($quiz->users)}} User</td>
                                    </tr>

                                        </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                     </div>
                @else
                    <p class="lead text-center">There is No quizs Found </p>
                @endif
            </div>
            <div class="col-xl-6">
                {{-- <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Social traffic</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Referral</th>
                                    <th scope="col">Visitors</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        Facebook
                                    </th>
                                    <td>
                                        1,480
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">60%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Facebook
                                    </th>
                                    <td>
                                        5,480
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">70%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Google
                                    </th>
                                    <td>
                                        4,807
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">80%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Instagram
                                    </th>
                                    <td>
                                        3,678
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">75%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        twitter
                                    </th>
                                    <td>
                                        2,645
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">30%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                    <h2 class="text-light">Last tracks</h2>
                    @if (count($tracks))
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page tracks</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('tracks.index')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-success">
                                    <tr>
                                        <td scope="col">Name</th>
                                        <td scope="col">Creation Date</th>
                                        <td scope="col">Num Of Courses</th>
                                        <td scope="col">Num Of Users</th>

                                    </tr>
                            </thead>
                            <tbody>
                                {{--  @php echo $users @endphp  --}}

                                @foreach ($tracks as $track)
                                        <tr>
                                            <td>{{\Str::limit($track->name,9)}}</td>
                                            <td>{{$track->created_at->diffForHumans()}}</td>
                                            <td>{{count($track->courses)}} Course</td>
                                            <td>{{count($track->users)}} User</td>
                                    </tr>

                                        </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                     </div>
                @else
                    <p class="lead text-center">There is No tracks Found </p>
                @endif
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
