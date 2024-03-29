<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Models\User;

//Tabela
Route::get('/cars', [CarController::class, 'index']);
Route::put('/cars', [CarController::class, 'index']);
Route::post('/cars/store', [CarController::class, 'store']);
Route::put('/cars/{car}', [CarController::class, 'update']);
Route::get('/cars/{car}', [CarController::class, 'edit']);
Route::delete('/cars/{car}', [CarController::class, 'destroy']);


//Login
Route::get('/', [UserController::class, 'loginPage']);
Route::get('/login', [UserController::class, 'loginPage']);
Route::post('/login/store', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

//Registro
Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register/store', [UserController::class, 'store']);

//Histórico
Route::get('/cars/{car}/history', [CarController::class, 'history']);

//Mais informações
Route::get('/cars/{car}/more', [CarController::class, 'more']);

//Marcas 
Route::post('/brands/store', [CarController::class, 'storeBrand']);

//Modelos
Route::post('/models/store', [CarController::class, 'storeModel']);
