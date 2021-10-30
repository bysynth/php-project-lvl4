@extends('layouts.app')

@section('content')
    <h1 class="mb-5">
        {{__('tasks.show.header')}}: {{ $task->name }}
        @auth
        <a href="{{ route('tasks.edit', $task) }}">&#9881;</a>
        @endauth
    </h1>
    <p>{{__('tasks.show.name')}}: {{ $task->name }}</p>
    <p>{{__('tasks.show.status')}}: {{ $task->status->name }}</p>
    <p>{{__('tasks.show.description')}}: {{ $task->description }}</p>
    @if($labels->isNotEmpty())
        <p>{{__('tasks.show.labels')}}:</p>
        <ul>
            @foreach($labels as $label)
                <li>{{ $label->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection
