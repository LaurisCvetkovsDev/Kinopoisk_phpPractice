<?php

use App\Kernel\Router\Route;
use App\Controllers\HomeController;
use App\Controllers\MoviesController;

return [
    Route::get(
        '/home',
        [HomeController::class, 'index']
    ),
    Route::get(
        '/',
        [HomeController::class, 'index']
    ),
    Route::get('/movies', [MoviesController::class, 'index']),
    Route::get('/admin/movies/add', [MoviesController::class, 'add']),
    Route::post('/admin/movies/add', [MoviesController::class, 'store'])

];
