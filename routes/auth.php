<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create']);
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('register', [RegisteredUserController::class, 'create']);//表示
    Route::post('register', [RegisteredUserController::class, 'store']);//処理

    Route::get('added', [RegisteredUserController::class, 'create']);
    Route::post('added', [RegisteredUserController::class, 'added']);
// Route::post通信('URLの部品', [繋げたいController::class, '繋げたいメソッド']);


});
