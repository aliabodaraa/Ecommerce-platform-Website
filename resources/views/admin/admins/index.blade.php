@extends('layouts.app', ['title' => __('Index_Admin')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Index_Admin') . ' '. auth()->user()->name,
        'description' => __('Index_Admin'),
        'class' => 'col-lg-7'
    ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Admins</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('admins.create') }}" class="btn btn-sm btn-primary">Add Admin</a>
                        </div>
                    </div>
                </div>

                <div class="col-12"> </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col">Score</th>
                                <th scope="col">Admin</th>
                                <th scope="col" class="text-right"></th>
                            </tr>
                    </thead>
                    <tbody>
                        {{--  @php echo $users @endphp  --}}
                         @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        <a href="">{{$user->email}}</a>
                                    </td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td >{{$user->score}}</td>
                                    <td >{{$user->admin}}</td>
                                    <td class="text-right">
                                           <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                       @if($user->id != auth()->user()->id)
                                                        <form method="POST" action="{{route('admins.destroy',$user->id)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="dropdown-item" href="{{route('admins.edit',$user->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>

                                                                <button type="button" class="dropdown-item" onclick="confirm('Are You Sure you want to Delete this Admin')?this.parentElement.submit():'' ">
                                                               <i class="fa fa-trash" aria-hidden="true"></i> Delete </button>
                                                          </form>
                                                        @else
                                                        <a class="dropdown-item" href="{{route('profile.edit',$user->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                                        @endif

                                                </div>
                                        </div>
                                    </td>
                               </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
      
    </div>
</div>
</div>
@include('layouts.footers.auth')
</div> 
@endsection

   

