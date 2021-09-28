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
            {{-- Trueeee <form method="POST" action="{{route('tracks.update',$track->id)}}"  autocomplete="off" style="margin: 0 6px -42px;">    --}}
            <form method="POST" action="{{route('tracks.update',$track)}}"  autocomplete="off" style="margin: 0 6px -42px;">
                    @csrf
                    @method("PATCH")
                    <div id="InputEmails" class="form-group">
                        <input value="{{ $track->name }}" type="text" name="name" class="form-control" style="padding:0px 0px 0px 20.3%;">
                    </div>
                        <input type="submit" value="Update Track" name="addtrack" id="add-email" class="btn btn-info" 
                        style="width:20%;direction: rtl;top:-69px;position: relative;height: 45px;">
                </form>
     
            </div>
      
    </div>
</div>
</div>
@include('layouts.footers.auth')
</div> 
@endsection

   

