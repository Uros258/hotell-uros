<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SobeController;
use App\Http\Controllers\RezervacijeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;


Route::get('/', [SobeController::class, 'index'])->name('home');

Route::resource('sobe', SobeController::class)->only(['index', 'show']);


Route::middleware(['auth'])->group(function () {
    Route::resource('rezervacije', RezervacijeController::class);

    Route::post('rezervacije/{rezervacija}/cancel', [RezervacijeController::class, 'cancel'])
        ->name('rezervacije.cancel');
});


Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('statuses', StatusController::class);

    Route::resource('sobe', SobeController::class)->except(['index', 'show']);

    Route::get('recepcioner/panel', [RezervacijeController::class, 'panel'])
        ->name('recepcioner.panel');

    Route::post('rezervacije/{rezervacija}/checkin', [RezervacijeController::class, 'checkin'])
        ->name('rezervacije.checkin');
});
