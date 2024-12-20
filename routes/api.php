<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PontoController;

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->group(function () {
    Route::post('register', [UsersController::class, 'createUsers']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('users', [UsersController::class, 'usersList']);
    Route::get('users/{id}', [UsersController::class, 'userDetails']);
    Route::put('users/{id}', [UsersController::class, 'usersEdit']);
    Route::delete('users/{id}', [UsersController::class, 'usersDelete']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('pointRegister', [PontoController::class, 'pointRegister']);
});
