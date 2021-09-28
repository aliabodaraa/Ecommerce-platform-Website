@extends('layouts.app', ['title' => __('quizzes_Managmaent')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Index_quizzes Page') . ' '. auth()->user()->name,
        'description' => __('Index_quizzes'),
        'class' => 'col-lg-7'
    ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">quizzes</h3>
                        </div>
                          <div class="col-4 text-right">
                            <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary">Add Quiz</a>
                        </div>
                    </div>
                </div>

                <div class="col-12"> </div>

            
             @include('includes.errors')
             @include('includes.message')
      
            {{--  class offset-sm-1   --}}
             
         @if (count($quizzes))
              <div class="table-responsive">
                 <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col">Num Of Questions</th>
                                <th scope="col">Course Title</th>
                                <th scope="col" class="text-right"></th>
                            </tr>
                    </thead>
                    <tbody>
                        {{--  @php echo $users @endphp  --}}
             
                         @foreach ($quizzes as $quiz)
                                <tr>
                                    <td><a href="{{route('quizzes.show',$quiz)}}">{{$quiz->name}}</a></td>
                                    <td>{{$quiz->created_at->diffForHumans()}}</td>
                                    <td>{{count($quiz->questions)}} Question</td>
                                     <td><a href="{{route('courses.show',$quiz->course)}}">{{$quiz->course->title}}</a></td>
                                   <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <form method="POST" action="{{route('quizzes.destroy',$quiz)}}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a class="dropdown-item" href="{{route('quizzes.edit',$quiz)}}">Edit</a>
                                                                 <a class="dropdown-item" class="dropdown-item" onclick="confirm('Are You Sure you want to Delete this Admin')?this.parentElement.submit():'' ">
                                                                Delete </a>
                                                          </form>
                                          </div>
                                        </div>
                                    </td> 
                               </tr>
                              </div>
                        @endforeach
                    </tbody>
                </table>
         @else
            <p class="lead text-center">There is No quizzes Found </p> 
        @endif    
            </div>
        <div class="card-footer" style="text-align: center;">
            <nav class="" aria-label="...">
              {{$quizzes->links()}}
            </nav>
      </div>
    </div>
</div>
</div>
@include('layouts.footers.auth')
</div> 
@endsection

   

