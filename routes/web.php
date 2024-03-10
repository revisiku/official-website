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
use App\Http\Controllers\Admin\PostBlogController;
use App\Http\Controllers\Admin\PostKategoriController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\TestimoniController;

// Public Route
require __DIR__.'/publicRoute.php';

// Admin Panel Route
Route::prefix('root')->group(function() {

    Route::middleware('guest')->group(function() {
        Route::get('login', [LoginController::class, 'index'])->name('login.index');
        Route::post('login', [LoginController::class, 'login'])->name('login');
    });

    Route::middleware('auth')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
        Route::put('/pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');

        Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
        Route::put('/profil', [ProfilController::class, 'ubah'])->name('profil.ubah');

        Route::get('/ganti-password', [GantiPasswordController::class, 'index'])->name('gantiPassword.index');
        Route::put('/ganti-password', [GantiPasswordController::class, 'ubah'])->name('gantiPassword.ubah');

        Route::get('/info-kontak', [InfoKontakController::class, 'index'])->name('infoKontak.index');
        Route::put('/info-kontak', [InfoKontakController::class, 'ubah'])->name('infoKontak.ubah');

        Route::post('logout', LogoutController::class)->name('logout');

        Route::controller(AkunController::class)
            ->prefix('akun')->as('akun.')->group(function () {
                Route::get('', 'index')->name('index');
                Route::post('', 'simpan')->name('simpan');
                Route::get('/{akun}/edit', 'edit')->name('edit');
                Route::put('/{akun}', 'ubah')->name('ubah');
                Route::delete('/{akun}', 'hapus')->name('hapus');
        });

        Route::controller(PesanController::class)
            ->prefix('pesan')->as('pesan.')->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/{pesan}', 'detail')->name('detail');
                Route::delete('/{pesan}', 'hapus')->name('hapus');
        });

        Route::controller(TestimoniController::class)
            ->prefix('testimoni')->as('testimoni.')->group(function () {
                Route::get('', 'index')->name('index');
                Route::post('', 'simpan')->name('simpan');
                Route::get('/{testimoni}/edit', 'edit')->name('edit');
                Route::put('/{testimoni}', 'ubah')->name('ubah');
                Route::delete('/{testimoni}', 'hapus')->name('hapus');
        });

        Route::controller(PostKategoriController::class)
            ->prefix('post-kategori')->as('post.kategori.')->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/tambah', 'tambah')->name('tambah');
                Route::post('', 'simpan')->name('simpan');
                Route::get('/{postKategori}/edit', 'edit')->name('edit');
                Route::put('/{postKategori}', 'ubah')->name('ubah');
                Route::delete('/{postKategori}', 'hapus')->name('hapus');
        });

        Route::controller(PostBlogController::class)
            ->prefix('blog')->as('post.blog.')->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/tambah', 'tambah')->name('tambah');
                Route::post('', 'simpan')->name('simpan');
                Route::get('/{post}/edit', 'edit')->name('edit');
                Route::put('/{post}', 'ubah')->name('ubah');
                Route::delete('/{post}', 'hapus')->name('hapus');
        });

        Route::controller(PostBeritaController::class)
            ->prefix('berita')->as('post.berita.')->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/tambah', 'tambah')->name('tambah');
                Route::post('', 'simpan')->name('simpan');
                Route::get('/{post}/edit', 'edit')->name('edit');
                Route::put('/{post}', 'ubah')->name('ubah');
                Route::delete('/{post}', 'hapus')->name('hapus');
        });

        Route::controller(BannerController::class)
            ->prefix('banner')->as('banner.')->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/tambah', 'tambah')->name('tambah');
                Route::post('', 'simpan')->name('simpan');
                Route::get('/{banner}/edit', 'edit')->name('edit');
                Route::put('/{banner}', 'ubah')->name('ubah');
                Route::delete('/{banner}', 'hapus')->name('hapus');
        });

        Route::controller(PartnershipController::class)
            ->prefix('partnership')->as('partnership.')->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/tambah', 'tambah')->name('tambah');
                Route::post('', 'simpan')->name('simpan');
                Route::get('/{partnership}/edit', 'edit')->name('edit');
                Route::put('/{partnership}', 'ubah')->name('ubah');
                Route::delete('/{partnership}', 'hapus')->name('hapus');
        });

        Route::controller(BerandaSectionController::class)
            ->prefix('beranda')->as('berandaSection.')->group(function () {
                Route::get('/{berandaSection}/edit', 'edit')->name('edit');
                Route::put('/{berandaSection}', 'ubah')->name('ubah');
        });

        Route::controller(HalamanController::class)
            ->prefix('halaman')->as('halaman.')->group(function () {
                Route::get('/{halaman}/edit', 'edit')->name('edit');
                Route::put('/{halaman}', 'ubah')->name('ubah');
        });
    });
});
