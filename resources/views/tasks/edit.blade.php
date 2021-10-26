@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('views.tasks.edit.header') }}</h1>
    {{ Form::model($task, ['url' => route('tasks.edit', $task), 'method' => 'PATCH','class' => 'w-50']) }}
        @include('tasks.form')
        {{ Form::submit(__('views.tasks.edit.buttons.update'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
