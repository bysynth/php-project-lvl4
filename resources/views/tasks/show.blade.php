@extends('layouts.app')

@section('content')
    <h1 class="mb-5">
        {{__('views.tasks.show.header')}}: {{ $task->name }} <a href="{{ route('tasks.edit', $task) }}">&#9881;</a>
    </h1>
    <p>{{__('views.tasks.show.name')}}: {{ $task->name }}</p>
    <p>{{__('views.tasks.show.status')}}: {{ $task->status->name }}</p>
    <p>{{__('views.tasks.show.description')}}: {{ $task->description }}</p>
@endsection
