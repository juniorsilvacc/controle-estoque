<?php

namespace App\Providers;

use App\Repositories\CategoriaRepositoryInterface;
use App\Repositories\ClienteRepositoryInterface;
use App\Repositories\Eloquent\CategoriaRepository;
use App\Repositories\Eloquent\ClienteRepository;
use Illuminate\Pagination\Paginator;
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
            ClienteRepository::class,
        );

        $this->app->singleton(
            CategoriaRepositoryInterface::class,
            CategoriaRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
