@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('views.labels.create.header') }}</h1>
    {{ Form::model($label, ['url' => route('labels.store'), 'class' => 'w-50']) }}
        @include('labels.form')
        {{ Form::submit(__('views.labels.create.buttons.create'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
