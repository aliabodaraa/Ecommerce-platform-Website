@extends('layouts.app', ['title' => __('Preview Video')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('New video') . ' ',
        'description' => __('Hi '.auth()->user()->name .'You can Preview Video'),
        'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                               <h3 class="mb-0"><i class="fa fa-video" aria-hidden="true"></i> {{ __('Show Video') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admins.create') }}" class="btn btn-sm btn-primary">Add Admin</a>
                            </div> 
                        </div>
                    </div>
                    <div class="col-12"> </div>
                    @include('includes.errors')
                    @include('includes.message')
                        <div class="card-body">
                            <h1 class="text-muted">Title: {{$video->title}}</h1>
                            <iframe src="{{$video->link}}" frameborder="0" allow="accelerometor; autoplay;encrypted-media;gyroscope;pictue-in-picture allowfullscreen" width="100%" height="650">
                            </iframe> 
                        </div>
                </div>
           </div>
        </div>
     </div>

        @include('layouts.footers.auth')
    </div>
@endsection
