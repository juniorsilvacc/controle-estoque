<?php

namespace App\Providers;

use App\Repositories\ClienteRepositoryInterface;
use App\Repositories\Eloquent\ClienteRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            ClienteRepositoryInterface::class,
            ClienteRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
