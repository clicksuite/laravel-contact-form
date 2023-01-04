<?php

namespace ClickSuite\LaravelContactForm\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelContactFormProvider extends ServiceProvider
{
    /**
     * Register routes.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../views', 'laravel-contact-form');
    }
}
