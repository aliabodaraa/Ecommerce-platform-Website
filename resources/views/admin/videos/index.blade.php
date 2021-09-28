@extends('layouts.app', ['title' => __('Index_Video')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Index_Video') . ' '. auth()->user()->name,
        'description' => __('Index_Video'),
        'class' => 'col-lg-7'
    ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0"><i class="fa fa-video" aria-hidden="true"  style="color:#5f9"></i> Videos</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('videos.create') }}" class="btn btn-sm btn-primary">Add Video</a>
                        </div>
                    </div>
                </div>

                <div class="col-12"> </div>
             @include('includes.errors')
             @include('includes.message')
            {{--  class offset-sm-1   --}}
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col" class="text-right"></th>
                            </tr>
                    </thead>
                    <tbody>
                        {{--  @php echo $users @endphp  --}}
                         @foreach ($videos as $video)
                                <tr>
                                  <td> <a href="{{route('videos.show',$video)}}">{{$video->title}}</a></td>
                                    <td>
                                    <a href="{{route('courses.show',$video->course)}}">{{$video->course->title}}</a>
                                    </td>
                                  
                                    {{-- <td>{{$video->created_at->diffForHumans()}}</td> --}}
                                     <td>{{$video->created_at->format('d/m/Y N:1')}}</td>
                              
                                    <td class="text-right">
                                           <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form method="POST" action="{{route('videos.destroy',$video->id)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="dropdown-item" href="{{route('videos.edit',$video->id)}}">Edit</a>

                                                                <a class="dropdown-item" onclick="confirm('Are You Sure you want to Delete this video')?this.parentElement.submit():'' ">
                                                                Delete </a>
                                                          </form>
                                                          
                                                </div>
                                        </div>
                                    </td>
                               </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
      <div class="card-footer" style="text-align: center;">
            <nav class="" aria-label="...">
              {{$videos->links()}}
            </nav>
      </div>
    </div>
</div>
</div>
@include('layouts.footers.auth')
</div> 
@endsection

   

