@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('task_statuses.edit.header') }}</h1>
    {{ Form::model($taskStatus, ['url' => route('task_statuses.update', $taskStatus), 'method' => 'PATCH', 'class' => 'w-50']) }}
        @include('task_statuses.form')
        {{ Form::submit(__('buttons.update'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
