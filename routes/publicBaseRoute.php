<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Public\BerandaController;
use App\Http\Controllers\Public\PostController;


Route::get('/', [BerandaController::class, 'index']);
Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/{slug}', [PostController::class, 'detail']);
