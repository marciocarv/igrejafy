<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

Route::resource('people', PersonController::class);

Route::get('/', function () {
    return view('welcome');
});
