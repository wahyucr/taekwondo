<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputNilaiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengujiController;
use App\Http\Controllers\PesertaUktController;
use App\Http\Controllers\ProfilController;

Route::get('/', [LandingPageController::class, 'index']);
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::get('/profil', [ProfilController::class, 'index']);
    Route::put('/profil', [ProfilController::class, 'update']);

    Route::group(['middleware' => 'CheckRole:admin,pelatih,penguji'], function () {
        Route::get('/nilai', [NilaiController::class, 'index']);
        Route::get('/cetak-nilai', [NilaiController::class, 'cetak'])->name('cetak-nilai');
    });

    Route::group(['middleware' => 'CheckRole:admin,pelatih'], function () {
        Route::get('/anggota/cetak', [AnggotaController::class, 'cetak'])->name('anggota.cetak');

        Route::resource('/anggota', AnggotaController::class);

        Route::get('/peserta-ukt/geup/{geup}', [PesertaUktController::class, 'index']);

        Route::resource('/pelatih', PelatihController::class);
        Route::resource('/penguji', PengujiController::class);
        Route::resource('/kegiatan', KegiatanController::class);
        Route::resource('/pendaftaran', PendaftaranController::class);
    });
    Route::group(['middleware' => 'CheckRole:admin,penguji'], function () {
        Route::get('/input-nilai', [InputNilaiController::class, 'index']);
        Route::get('/input-nilai/{id}', [InputNilaiController::class, 'show']);
        Route::POST('/input-nilai', [InputNilaiController::class, 'store']);;
    });
});
