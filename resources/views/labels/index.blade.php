@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('labels.index.header') }}</h1>
    @auth
        <a href="{{ route('labels.create') }}" class="btn btn-primary">{{ __('buttons.create_label') }}</a>
    @endauth
    <table class="table mt-2">
        <tr>
            <th>{{ __('labels.index.table.id') }}</th>
            <th>{{ __('labels.index.table.name') }}</th>
            <th>{{ __('labels.index.table.desc') }}</th>
            <th>{{ __('labels.index.table.date') }}</th>
            @auth
                <th>{{ __('labels.index.table.actions') }}</th>
            @endauth
        </tr>
        @foreach($labels as $label)
            <tr>
                <td>{{ $label->id }}</td>
                <td>{{ $label->name }}</td>
                <td>{{ $label->description }}</td>
                <td>{{ $label->created_at->format('d.m.Y') }}</td>
                @auth
                    <td>
                        <a class="text-danger" href="{{ route('labels.destroy', $label) }}"
                           data-confirm="{{ __('links.delete_confirmation') }}"
                           data-method="delete">{{ __('links.delete') }}</a>
                        <a href="{{ route('labels.edit', $label) }}">{{ __('links.edit') }}</a>
                    </td>
                @endauth
            </tr>
        @endforeach
    </table>
    {{ $labels->links() }}
@endsection
