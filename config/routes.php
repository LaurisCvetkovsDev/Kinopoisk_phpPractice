<?php

use App\Kernel\Router\Route;
use App\Controllers\HomeController;
use App\Controllers\MoviesController;

return [
    Route::get(
        '/home',
        [HomeController::class, 'index']
    ),
    Route::get('/', function () {
        include_once APP_PATH . '/views/pages/home.php';
    }),
    Route::get('/movies', [MoviesController::class, 'index']),
];
