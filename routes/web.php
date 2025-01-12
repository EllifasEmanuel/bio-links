<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/logout', LogoutController::class)->name('logout');

    Route::controller(LinkController::class)->group(function () {
        Route::prefix('links')->group(function () {
            Route::name('links.')->group(function () {

                Route::get('create', 'create')->name('create');
                Route::post('create', 'store')->name('store');

                Route::middleware('can:linkBelongsToUserLogged,link')->group(function () {
                    Route::get('{link}/edit', 'edit')->name('edit');
                    Route::put('{link}/edit', 'update');
                    Route::delete('{link}', 'destroy')->name('destroy');
                    Route::patch('{link}/up', 'up')->name('up');
                    Route::patch('{link}/down', 'down')->name('down');
                });

            });
        });
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update']);
});
