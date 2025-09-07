<?php


use App\Kernel\Router\Route;
use App\Controllers\HomeController;


return [

    Route::get(
        '/',
        [HomeController::class, 'index']
    ),



];
