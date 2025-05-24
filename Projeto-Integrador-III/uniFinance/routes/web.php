<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

// ROTAS PÚBLICAS (apenas login)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // <- nome deve ser exatamente 'login'
Route::post('/login', [AuthController::class, 'login'])->name('login');

// TODAS AS OUTRAS ROTAS PROTEGIDAS
Route::middleware('auth')->group(function () {

    // Página principal após login
    // Adicionar controller de menu
    Route::get('/menu', function () {
        return view('menu');
    })->name('menu');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/menu/accounts', [UserController::class, 'showBankAccounts'])->name('accounts');

    // Dashboard
    Route::match(['get', 'post'], '/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
});

// Criação de usuário (apenas para usuários logados)
Route::post('/users/create', [UserController::class, 'createUser'])->name('users-create');

// Criação de usuário (apenas usuários logados podem criar outros)
Route::get('/users/create', [UserController::class, 'createUserForm'])->name('user-create');

Route::get('forgot-password', function() {
    return view('auth.forgot-password');
})->name('forgot-password');

Route::post('/forgot-password', function(Request $request) {
    $request->validate([
        'email'=> 'required|email'
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::ResetLinkSent
    ? back()->with(['status' => __($status)])
    : back()->withErrors(['email' => __($status)]);
})->name('password-email');
