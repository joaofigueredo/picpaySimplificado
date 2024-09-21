<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Usuario;
use Illuminate\Notifications\Channels\MailChannel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [LoginController::class, 'destroy'])
    ->name('logout');

Route::get('/criar', [UserController::class, 'create'])
    ->name('users.create');



Route::post('/store', [UserController::class, 'store'])
    ->name('users.store');

Route::middleware(Usuario::class)->group(function () {
    Route::get('/home', [HomeController::class, 'index'])
        ->name('home.index');

    Route::get('/transferencia', [HomeController::class, 'transferencia'])
        ->name('home.transferencia');
    Route::get('/contas', [HomeController::class, 'contas'])
        ->name('home.contas');
});
