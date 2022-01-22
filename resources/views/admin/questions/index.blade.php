@extends('layouts.app', ['title' => __('questions_Managmaent')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Index_questions Page') . ' '. auth()->user()->name,
        'description' => __('Index_questions'),
        'class' => 'col-lg-7'
    ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">questions</h3>
                        </div>
                          <div class="col-4 text-right">
                            {{--  <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary">Add Quiz</a>  --}}
                               <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddQuestion">
                                 Add Question
                                 </button>
                                @include('includes.modalAddQuestion')
                        </div>
                    </div>
                </div>

                <div class="col-12"> </div>


             @include('includes.errors')
             @include('includes.message')

            {{--  class offset-sm-1   --}}

         @if (count($questions))
              <div class="table-responsive">
                 <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                            <tr>
                                <th scope="col">quesion title</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col">answer</th>
                                <th scope="col">right answer</th>
                                <th scope="col">belong Quiz</th>
                                <th scope="col">score</th>
                                <th scope="col">type</th>
                                <th scope="col" class="text-right"></th>
                            </tr>
                    </thead>
                    <tbody>
                        {{--  @php echo $users @endphp  --}}

                         @foreach ($questions as $question)
                                <tr>
                                    <td><a href="{{route('questions.show',$question)}}">{{\Str::limit($question->title,20)}}</a></td>
                                    <td>{{$question->created_at->diffForHumans()}}</td>
                                    <td>{{\Str::limit($question->answer,40)}}</td>
                                    <td>{{$question->right_answer}}</td>
                                     <td><a href="{{route('quizzes.show',$question->quiz)}}">{{\Str::limit($question->quiz->name,40)}}</a></td>
                                     <td>{{$question->score}}</td>
                                     <td>{{$question->type}}</td>
                                     <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <form method="POST" action="{{route('questions.destroy',$question)}}">
                                                                @csrf
                                                                @method('DELETE')
                                                                {{--  <a class="dropdown-item" href="{{route('questions.edit',$question)}}">Edit</a>  --}}
                                                               <a type="button" class="Go_to_class_update dropdown-item btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdateQuestion">
                                                          Update This question</a>
                                                                 <a class="dropdown-item" class="dropdown-item" onclick="confirm('Are You Sure you want to Delete this Admin')?this.parentElement.submit():'' ">
                                                                Delete </a>
                                                          </form>
                                          </div>
                                        </div>
                                    </td>
                               </tr>
                              </div>
                              @include('includes.modalUpdateQuestion')
                        @endforeach
                    </tbody>
                </table>
         @else
            <p class="lead text-center">There is No questions Found </p>
        @endif
            </div>
        <div class="card-footer" style="text-align: center;">
            <nav class="" aria-label="...">
              {{$questions->links()}}
            </nav>
      </div>
    </div>
</div>
</div>
@include('layouts.footers.auth')
</div>
@endsection



