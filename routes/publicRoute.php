<?php

use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\Public\KirimPesanController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RedirectController;


Route::get('/redirect', RedirectController::class);
Route::get('/back/{code}', ConfirmController::class);

require __DIR__.'/publicBaseRoute.php';

Route::prefix('{locale}')->where(['locale' => '[a-zA-Z]{2}'])->group(function () {
    require __DIR__.'/publicBaseRoute.php';
});
