@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('views.tasks.index.header') }}</h1>
    <div class="d-flex">
{{-- TODO добавить форму для фильтра --}}
{{--        <div>--}}
{{--            <form method="GET" action="#" accept-charset="UTF-8" class="form-inline">--}}
{{--                <select class="form-control mr-2" name="filter[status_id]">--}}
{{--                    <option selected="selected" value="">Статус</option>--}}
{{--                </select>--}}
{{--                <select class="form-control mr-2" name="filter[created_by_id]">--}}
{{--                    <option selected="selected" value="">Автор</option>--}}
{{--                </select>--}}
{{--                <select class="form-control mr-2" name="filter[assigned_to_id]">--}}
{{--                    <option selected="selected" value="">Исполнитель</option>--}}
{{--                </select>--}}
{{--                <input class="btn btn-outline-primary mr-2" type="submit" value="{{ __('views.tasks.index.buttons.apply') }}">--}}
{{--            </form>--}}
{{--        </div>--}}
        <a href="{{ route('tasks.create') }}" class="btn btn-primary ml-auto">{{ __('views.tasks.index.buttons.create') }}</a>
    </div>
    <table class="table mt-2">
        <tr>
            <th>{{ __('views.tasks.index.table.id') }}</th>
            <th>{{ __('views.tasks.index.table.status') }}</th>
            <th>{{ __('views.tasks.index.table.name') }}</th>
            <th>{{ __('views.tasks.index.table.author') }}</th>
            <th>{{ __('views.tasks.index.table.executor') }}</th>
            <th>{{ __('views.tasks.index.table.date') }}</th>
            <th>{{ __('views.tasks.index.table.actions') }}</th>
        </tr>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->status->name }}</td>
                <td><a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a></td>
                <td>{{ $task->creator->name }}</td>
                <td>{{ $task->executor->name ?? '' }}</td>
                <td>{{ $task->created_at->format('d.m.Y') }}</td>
                <td>
                    <a class="text-danger" href="{{ route('tasks.destroy', $task) }}" data-confirm="{{ __('views.tasks.index.data.del_confirm') }}" data-method="delete">{{ __('views.tasks.index.links.delete') }}</a>
                    <a href="{{ route('tasks.edit', $task) }}">{{ __('views.tasks.index.links.edit') }}</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $tasks->links() }}
@endsection
