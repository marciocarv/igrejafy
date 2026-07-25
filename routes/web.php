<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;

Route::resource('people', PersonController::class);

Route::get('/', DashboardController::class)
    ->name('dashboard');

Route::prefix('reports')
    ->name('reports.')
    ->group(function () {

        Route::get('/', [ReportController::class, 'index'])
            ->name('index');

        Route::get('/people', [ReportController::class, 'people'])
            ->name('people');

    });
