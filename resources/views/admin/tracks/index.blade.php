@extends('layouts.app', ['title' => __('Tracks_Managmaent')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Index_Tracks Page') . ' '. auth()->user()->name,
        'description' => __('Index_Tracks'),
        'class' => 'col-lg-7'
    ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Tracks</h3>
                        </div>
                    </div>
                </div>

                <div class="col-12"> </div>

            
             @include('includes.errors')
             @include('includes.message')
      
            {{--  class offset-sm-1   --}}
                <form method="POST" action="{{route('tracks.store')}}"  autocomplete="off" style="margin: 0 6px -42px;">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" style="padding:0px 0px 0px 20.3%;">
                    </div>
                        <input type="submit" value="Add Track" name="addtrack" id="add-email" class="btn btn-primary" 
                        style="width:20%;direction: rtl;top:-69px;position: relative;height: 45px;">
                </form>
         @if (count($tracks))
              <div class="table-responsive">
                 <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col">Num Of Courses</th>
                                <th scope="col" class="text-right"></th>
                            </tr>
                    </thead>
                    <tbody>
                        {{--  @php echo $users @endphp  --}}
             
                         @foreach ($tracks as $track)
                                <tr>
                                    <td><a href="{{route('tracks.show',$track)}}">{{$track->name}}</a></td>
                                    <td>{{$track->created_at->diffForHumans()}}</td>
                                    <td>{{count($track->courses)}} Course</td>
                                   <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        {{--  <form method="POST" action="{{route('tracks.destroy',$track->id)}}">  --}}
                                                            <form method="POST" action="{{route('tracks.destroy',$track)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            {{--  <a class="dropdown-item" href="{{route('tracks.edit',$track->id)}}">Edit</a>  --}}
                                                            <a class="dropdown-item" href="{{route('tracks.edit',$track)}}">Edit</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('Are You Sure you want to Delete this Admin')?this.parentElement.submit():'' ">
                                                                Delete </button>
                                                          </form>
                                          </div>
                                        </div>
                                    </td> 
                               </tr>
                               {{--  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                           <form method="POST" action="{{route('tracks.destroy',$track->id)}}">
                                               @csrf
                                               @method('DELETE')
                                               <a class="dropdown-item" href="{{route('tracks.edit',$track->id)}}">Edit</a>

                                                   <button type="button" class="dropdown-item" onclick="confirm('Are You Sure you want to Delete this Admin')?this.parentElement.submit():'' ">
                                                   Delete Track </button>
                                             </form>
                                           --}}

                                   </div>
                        @endforeach
                    </tbody>
                </table>
         @else
            <p class="lead text-center">There is No Tracks Found </p> 
        @endif    
            </div>
      
    </div>
</div>
</div>
@include('layouts.footers.auth')
</div> 
@endsection

   

