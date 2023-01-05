<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', [UserController::class, 'loginPage']);
Route::get('/cars', [CarController::class, 'index']);
Route::put('/cars', [CarController::class, 'index']);

Route::post('/cars/store', [CarController::class, 'store']);
Route::put('/cars/{car}', [CarController::class, 'update']);
Route::get('/cars/{car}', [CarController::class, 'edit']);
Route::delete('/cars/{car}', [CarController::class, 'destroy']);


//Login
Route::get('/login', [UserController::class, 'loginPage']);
Route::post('/login/store', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

//Registro
Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register/store', [UserController::class, 'store']);

Route::get('/cars/{car}/history', [CarController::class, 'history']);
