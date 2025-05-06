<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Method to create another user
    public function createUser(Request $request)
    {
        // Validação dos dados recebidos na requisição
        $validator = Validator::make($request->all(), [
            'completeName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Criação do usuário
        $user = User::create([
            'completeName' => $request->completeName,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash da senha
            'profile_photo' => $request->profile_photo ? $request->file('profile_photo')->store('profile_photos') : null, // Foto de perfil (se enviada)
            'email_verified_at' => now(), // Definindo a verificação de email como o momento atual
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    // Método para atualizar um usuário existente
    public function updateUser(Request $request, $id)
    {
        // Validação dos dados recebidos na requisição
        $validator = Validator::make($request->all(), [
            'completeName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Encontrar o usuário pelo ID
        $user = User::findOrFail($id);

        // Atualizar os dados do usuário
        $user->update([
            'completeName' => $request->completeName,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password, // Atualiza a senha se fornecida
            'profile_photo' => $request->profile_photo ? $request->file('profile_photo')->store('profile_photos') : $user->profile_photo, // Atualiza a foto de perfil se fornecida
            'email_verified_at' => $user->email_verified_at, // Preserva o campo de verificação de email
        ]);

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    // Método para deletar um usuário
    public function deleteUser($id)
    {
        // Encontrar o usuário pelo ID
        $user = User::findOrFail($id);

        // Deletar o usuário
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
