@extends('layouts.app', ['title' => __('quizzes_Managmaent')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('show_quizzes Page') . ' '. auth()->user()->name,
        'description' => __('show_quizzes'),
        'class' => 'col-lg-7'
    ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h3 class="mb-0">
                            {{--mb-0  to give more height  --}}
                            Quiz Name:
                            <small class="text-muted">{{$quiz->name}}</small>
                            </h3>
                        </div>
                        <div class="col-8 text-right Create">
                                {{--  <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary">Add Quiz</a>  --}}
                                {{-- <!-- Button trigger AddQuiz modal --> --}}
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddQuiz">
                                 Add Quiz
                                 </button>
                                  @include('includes.modalAddQuiz')
                                        {{-- <!-- Button trigger AddQuestion modal --> --}}
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalAddQuestionDetermine">
                                        Add Question
                                        </button>
                                  @include('includes.modalAddQuestionDetermine')
                        </div>
                    </div>
                </div>

                <div class="col-12"> </div>


             {{-- @include('includes.errors') --}}
             @include('includes.message')

            {{--  class offset-sm-1   --}}
             {{-- <h1>{{$quiz->questions[1]->title}} {{$quiz->name}} </h1> --}}
         @if (count($quiz->questions))
              <div class="table-responsive">
                 <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                           <tr>
                                <th scope="col">title</th>
                                <th scope="col">answer</th>
                                <th scope="col">right_answer</th>
                                <th scope="col">score</th>
                                <th scope="col">Type</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col" class="text-right"></th>
                            </tr>
                    </thead>
                    <tbody>
                        {{--  @php echo $users @endphp  --}}
             @php
                 $arr=[];
                 $i=0;
             @endphp
                         @foreach ($quiz->questions as $question)

                                <tr>
                                    <td>{{$question->title}}</td>

                                    <td>{{$question->answer}}</td>
                                    <td>{{$question->right_answer}}</td>
                                     <td>{{$question->score}}</td>
                                     <td>{{$question->type}}</td>
                                     <td>{{$question->created_at->diffForHumans()}}</td>
                                   <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a type="button" class="Go_to_class_update dropdown-item btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdateQuestion">
                                                          Update This Question</a>

                                                <button type="button" class="dropdown-item btn btn-danger" data-bs-toggle="modal" data-bs-target=".Verify_Delete">
                                                  Delete
                                                 </button>

                                          </div>

                                        </div>
                                    </td>
                               </tr>
                              </div>
                              {{--  @php
                                  echo $loop->index .$quiz->questions[$loop->index]->title
                              @endphp  --}}
                                @include('includes.verifyForDelete',['title' =>$quiz->questions[$loop->index]->title ])
                        @endforeach

                    </tbody>

                     @include('includes.modalUpdateQuestion')
                </table>

         @else

            <p class="lead text-center">There is No questions Found </p>
        @endif
            </div>
        <div class="card-footer" style="text-align: center;">
            {{-- <nav class="" aria-label="...">
              {{$quiz->questions->links()}}
            </nav> --}}
      </div>
    </div>
</div>
</div>
@include('layouts.footers.auth')
</div>
@endsection
