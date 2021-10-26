@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('views.tasks.create.header') }}</h1>
    {{ Form::model($task, ['url' => route('tasks.store'), 'class' => 'w-50']) }}
        @include('tasks.form')
        {{ Form::submit(__('views.tasks.create.buttons.create'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
