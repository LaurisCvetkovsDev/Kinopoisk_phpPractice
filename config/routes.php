<?php

use App\Controllers\LoginController;
use App\Kernel\Router\Route;
use App\Controllers\HomeController;
use App\Controllers\MoviesController;
use App\Controllers\RegisterController;

return [
    Route::get(
        '/home',
        [HomeController::class, 'index']
    ),
    Route::get(
        '/',
        [HomeController::class, 'index']
    ),
    Route::get(
        '/movies',
        [MoviesController::class, 'index']
    ),
    Route::get(
        '/admin/movies/add',
        [MoviesController::class, 'add']
    ),
    Route::post(
        '/admin/movies/add',
        [MoviesController::class, 'store']
    ),
    Route::get(
        '/register',
        [RegisterController::class, 'index']
    ),
    Route::post(
        '/register',
        [RegisterController::class, 'register']
    ),
    Route::get(
        '/login',
        [LoginController::class, 'index']
    ),
    Route::post(
        '/login',
        [LoginController::class, 'login']
    ),

];
