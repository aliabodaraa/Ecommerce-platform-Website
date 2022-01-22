@extends('layouts.app', ['title' => __('question_Create')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('New question') . ' ',
        'description' => __('Hi '.auth()->user()->name .' can create a new question'),
        'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0"><i class="fa fa-question" aria-hidden="true"></i> {{ __('Create question') }}</h3>
                        </div>
                    </div>
    <div class="col-12"> </div>
             @include('includes.errors')
             @include('includes.message')
             @include('includes.modalAddQuestion.blade')
    </div>
@endsection
