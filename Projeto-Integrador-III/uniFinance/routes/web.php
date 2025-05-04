<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Show Login Route
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Login By POST
Route::post('/login', [AuthController::class, 'login']);

// Rota protegida pela autenticação
Route::middleware('auth:sanctum')->get('/menu', function() {
    return view('menu');
})->name('menu');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
