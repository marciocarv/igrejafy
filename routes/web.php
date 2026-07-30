<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Reports\BirthdayReportController;
use App\Http\Controllers\Reports\PersonReportController;
use App\Http\Controllers\Reports\ReportsHomeController;
use App\Http\Controllers\BaptismController;

Route::get('/', DashboardController::class)
    ->name('dashboard');

Route::prefix('reports')
    ->name('reports.')
    ->group(function () {

        Route::get(
            '/',
            [ReportsHomeController::class, 'index']
        )->name('index');

        Route::get(
            '/people',
            [PersonReportController::class, 'index']
        )->name('people');

        Route::get(
            '/birthdays',
            [BirthdayReportController::class, 'index']
        )->name('birthdays');

    });

    Route::resource('people', PersonController::class);

    Route::prefix('people/{person}/baptism')
    ->name('people.baptism.')
    ->group(function () {

        Route::get('/', [BaptismController::class, 'index'])
            ->name('index');

        Route::post('/', [BaptismController::class, 'store'])
            ->name('store');

        Route::put('/', [BaptismController::class, 'update'])
            ->name('update');

        Route::get('/certificate', [BaptismController::class, 'certificate'])
            ->name('certificate');
    });
