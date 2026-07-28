<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Repositories\Contracts\PersonRepositoryInterface;
use App\Repositories\PersonRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PersonRepositoryInterface::class,
            PersonRepository::class
        );
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
