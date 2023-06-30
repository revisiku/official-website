<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BerandaSectionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GantiPasswordController;
use App\Http\Controllers\Admin\HalamanController;
use App\Http\Controllers\Admin\InfoKontakController;
use App\Http\Controllers\Admin\PartnershipController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\PostBeritaController;
use App\Http\Controllers\Admin\PostKategoriController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\TestimoniController;

// Public Route
require __DIR__.'/publicRoute.php';
