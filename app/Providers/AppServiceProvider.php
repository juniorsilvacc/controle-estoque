<?php

namespace App\Providers;

use App\Repositories\CategoriaRepositoryInterface;
use App\Repositories\ClienteRepositoryInterface;
use App\Repositories\Eloquent\CategoriaRepository;
use App\Repositories\Eloquent\ClienteRepository;
use App\Repositories\Eloquent\EstatisticaRepository;
use App\Repositories\Eloquent\FornecedorRepository;
use App\Repositories\Eloquent\PerfilRepository;
use App\Repositories\Eloquent\ProdutoRepository;
use App\Repositories\EstatisticaRepositoryInterface;
use App\Repositories\FornecedorRepositoryInterface;
use App\Repositories\PerfilRepositoryInterface;
use App\Repositories\ProdutoRepositoryInterface;
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

        $this->app->singleton(
            ProdutoRepositoryInterface::class,
            ProdutoRepository::class,
        );

        $this->app->singleton(
            FornecedorRepositoryInterface::class,
            FornecedorRepository::class,
        );

        $this->app->singleton(
            EstatisticaRepositoryInterface::class,
            EstatisticaRepository::class,
        );

        $this->app->singleton(
            PerfilRepositoryInterface::class,
            PerfilRepository::class,
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
