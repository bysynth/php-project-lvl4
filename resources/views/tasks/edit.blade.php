@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('tasks.edit.header') }}</h1>
    {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH','class' => 'w-50']) }}
        @include('tasks.form')
        {{ Form::submit(__('buttons.update'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
