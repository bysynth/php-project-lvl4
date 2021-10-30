@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('task_statuses.index.header') }}</h1>
    @auth
        <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">{{ __('buttons.create_status') }}</a>
    @endauth
    <table class="table mt-2">
        <tr>
            <th>{{ __('task_statuses.index.table.id') }}</th>
            <th>{{ __('task_statuses.index.table.name') }}</th>
            <th>{{ __('task_statuses.index.table.date') }}</th>
            @auth
                <th>{{ __('task_statuses.index.table.actions') }}</th>
            @endauth
        </tr>
        @foreach($taskStatuses as $taskStatus)
            <tr>
                <td>{{ $taskStatus->id }}</td>
                <td>{{ $taskStatus->name }}</td>
                <td>{{ $taskStatus->created_at->format('d.m.Y') }}</td>
                @auth
                    <td>
                        <a class="text-danger" href="{{ route('task_statuses.destroy', $taskStatus) }}"
                           data-confirm="{{ __('links.delete_confirmation') }}"
                           data-method="delete">{{ __('links.delete') }}</a>
                        <a href="{{ route('task_statuses.edit', $taskStatus) }}">{{ __('links.edit') }}</a>
                    </td>
                @endauth
            </tr>
        @endforeach
    </table>
    {{ $taskStatuses->links() }}
@endsection
