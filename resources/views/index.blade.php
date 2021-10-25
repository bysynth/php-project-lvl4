@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">{{ __('views.index.header') }}</h1>
        <p class="lead">{{ __('views.index.lead') }}</p>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="https://github.com/bysynth/php-project-lvl4" role="button">{{ __('views.index.buttons.learn') }}</a>
    </div>
@endsection
