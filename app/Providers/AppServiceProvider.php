<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Repositories\Contracts\PersonRepositoryInterface;
use App\Repositories\PersonRepository;
use App\Repositories\BaptismRepository;
use App\Repositories\Contracts\BaptismRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PersonRepositoryInterface::class,
            PersonRepository::class
        );

        $this->app->bind(
            BaptismRepositoryInterface::class,
            BaptismRepository::class
        );
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
