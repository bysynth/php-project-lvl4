@extends('layouts.app')

@section('content')
    <h1 class="mb-5">
        {{__('views.tasks.show.header')}}: {{ $task->name }}
        @auth
        <a href="{{ route('tasks.edit', $task) }}">&#9881;</a>
        @endauth
    </h1>
    <p>{{__('views.tasks.show.name')}}: {{ $task->name }}</p>
    <p>{{__('views.tasks.show.status')}}: {{ $task->status->name }}</p>
    <p>{{__('views.tasks.show.description')}}: {{ $task->description }}</p>
    @if($labels->isNotEmpty())
        <p>{{__('views.tasks.show.labels')}}:</p>
        <ul>
            @foreach($labels as $label)
                <li>{{ $label->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection
