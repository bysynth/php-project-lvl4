<?php

namespace App\Providers;

use Form;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Form::component('bsText', 'components.form.text', ['name', 'label', 'value' => null, 'attributes' => []]);
        Form::component('bsTextarea', 'components.form.textarea', ['name', 'label', 'value' => null, 'attributes' => []]);
        Form::component('bsSelect', 'components.form.select', ['name', 'label', 'options' => [],'value' => null, 'attributes' => []]);
    }
}
