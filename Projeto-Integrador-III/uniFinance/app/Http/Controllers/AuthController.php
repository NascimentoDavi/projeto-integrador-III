<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Procura o usuário pelo email
        $user = User::where('email', trim($request->email))->first();

        // Verifica se o usuário existe e se a senha está correta
        if ($user && Hash::check($request->password, $user->password)) {
            // Senha correta, retorna sucesso
            return response()->json([
                'message' => 'Authenticated successfully',
                'user' => $user,
            ]);
        }

        // Se falhar na autenticação
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

}
