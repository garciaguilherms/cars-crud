<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', [CarController::class, 'index']);
Route::get('/cars', [CarController::class, 'index']);
Route::put('/cars', [CarController::class, 'index']);

Route::post('/cars/store', [CarController::class, 'store']);
Route::put('/cars/{car}', [CarController::class, 'update']);
Route::get('/cars/{car}', [CarController::class, 'edit']);
Route::delete('/cars/{car}', [CarController::class, 'destroy']);

Route::get('/login', [UserController::class, 'index']);
Route::get('/register', [UserController::class, 'register']);
