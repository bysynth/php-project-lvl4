@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">{{ __('interface.index_page.hello') }}</h1>
            <p class="lead">{{ __('interface.index_page.desc') }}</p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="https://github.com/bysynth/php-project-lvl4" role="button">{{ __('interface.index_page.buttons.learn') }}</a>
        </div>
    </div>
@endsection
