@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('views.tasks.index.header') }}</h1>
    <div class="d-flex">
        <div>
            {{ Form::open(['url' => route('tasks.index'), 'method' => 'GET', 'class' => 'form-inline']) }}
                {{ Form::select('filter[status_id]', $taskStatuses, $filter['status_id'] ?? null, ['placeholder' => __('views.tasks.index.filter.status'), 'class' => 'form-control mr-2']) }}
                {{ Form::select('filter[created_by_id]', $users, $filter['created_by_id'] ?? null, ['placeholder' => __('views.tasks.index.filter.author'), 'class' => 'form-control mr-2']) }}
                {{ Form::select('filter[assigned_to_id]', $users, $filter['assigned_to_id'] ?? null, ['placeholder' => __('views.tasks.index.filter.executor'), 'class' => 'form-control mr-2']) }}
                {{ Form::submit(__('views.tasks.index.buttons.apply'), ['class' => 'btn btn-outline-primary mr-2']) }}
            {{ Form::close() }}
        </div>
        @auth
            <a href="{{ route('tasks.create') }}"
               class="btn btn-primary ml-auto">{{ __('views.tasks.index.buttons.create') }}</a>
        @endauth
    </div>
    <table class="table mt-2">
        <tr>
            <th>{{ __('views.tasks.index.table.id') }}</th>
            <th>{{ __('views.tasks.index.table.status') }}</th>
            <th>{{ __('views.tasks.index.table.name') }}</th>
            <th>{{ __('views.tasks.index.table.author') }}</th>
            <th>{{ __('views.tasks.index.table.executor') }}</th>
            <th>{{ __('views.tasks.index.table.date') }}</th>
            @auth
                <th>{{ __('views.tasks.index.table.actions') }}</th>
            @endauth
        </tr>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->status->name }}</td>
                <td><a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a></td>
                <td>{{ $task->creator->name }}</td>
                <td>{{ $task->executor->name ?? '' }}</td>
                <td>{{ $task->created_at->format('d.m.Y') }}</td>
                @auth
                    <td>
                        @can('delete', $task)
                            <a class="text-danger" href="{{ route('tasks.destroy', $task) }}"
                               data-confirm="{{ __('views.tasks.index.data.del_confirm') }}"
                               data-method="delete">{{ __('views.tasks.index.links.delete') }}</a>
                        @endcan
                        <a href="{{ route('tasks.edit', $task) }}">{{ __('views.tasks.index.links.edit') }}</a>
                    </td>
                @endauth
            </tr>
        @endforeach
    </table>
    {{ $tasks->links() }}
@endsection
