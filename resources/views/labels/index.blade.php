@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('views.labels.index.header') }}</h1>
    <a href="{{ route('labels.create') }}" class="btn btn-primary">{{ __('views.labels.index.buttons.create') }}</a>
    <table class="table mt-2">
        <tr>
            <th>{{ __('views.labels.index.table.id') }}</th>
            <th>{{ __('views.labels.index.table.name') }}</th>
            <th>{{ __('views.labels.index.table.desc') }}</th>
            <th>{{ __('views.labels.index.table.date') }}</th>
            <th>{{ __('views.labels.index.table.actions') }}</th>
        </tr>
        <tr>
        @foreach($labels as $label)
            <td>{{ $label->id }}</td>
            <td>{{ $label->name }}</td>
            <td>{{ $label->description }}</td>
            <td>{{ $label->created_at->format('d.m.Y') }}</td>
            <td>
                <a class="text-danger" href="{{ route('labels.destroy', $label) }}" data-confirm="{{ __('views.labels.index.data.del_confirm') }}" data-method="delete">{{ __('views.labels.index.links.delete') }}</a>
                <a href="{{ route('labels.edit', $label) }}">{{ __('views.labels.index.links.edit') }}</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $labels->links() }}
@endsection
