<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Método para exibir o formulário de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Método para processar o login
    public function login(Request $request)
    {
        // Validação do formulário de login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        // Tentativa de login com as credenciais fornecidas
        if (Auth::attempt($request->only('email', 'password'))) {
            // Login bem-sucedido, redireciona para a página menu
            return redirect()->route('menu');
        }

        // Se as credenciais estiverem incorretas, redireciona de volta com mensagem de erro
        return redirect()->route('login')->withErrors(['email' => 'Credenciais inválidas']);
    }

    // Método para fazer o logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
