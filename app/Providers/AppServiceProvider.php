<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Repositories\Contracts\PersonRepositoryInterface;
use App\Repositories\PersonRepository;
use App\Repositories\BaptismRepository;
use App\Repositories\Contracts\BaptismRepositoryInterface;
use App\Repositories\VisitRepository;
use App\Repositories\Contracts\VisitRepositoryInterface;
use App\Repositories\Contracts\DashboardRepositoryInterface;
use App\Repositories\DashboardRepository;

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

        $this->app->bind(
            VisitRepositoryInterface::class,
            VisitRepository::class
        );

        $this->app->bind(
            DashboardRepositoryInterface::class,
            DashboardRepository::class
        );
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();
        \Carbon\Carbon::setLocale('pt_BR');
    }
}
