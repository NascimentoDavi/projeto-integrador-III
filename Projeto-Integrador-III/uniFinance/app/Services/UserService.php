<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{
    /**
     * Cria um novo usuário
     */
    public function createUser(array $data): User
    {

        // Lógica de Comunicação com o Banco de Dados
        return User::create([
            'completeName' => $data['completeName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Utiliza algoritmo Bcrypt para criptografar
            'profile_photo' => $data['profile_photo'] ?? null,
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Atualiza um usuário existente
     */
    public function updateUser(User $user, array $data): User
    {
        $user->update([
            'completeName' => $data['completeName'],
            'email' => $data['email'],
            'password' => isset($data['password']) ? Hash::make($data['password']) : $user->password, // Utiliza algortimo Bcrypt para criptografar
            'profile_photo' => $data['profile_photo'] ?? $user->profile_photo,
        ]);

        return $user;
    }

    /**
     * Deleta um usuário
     */
    public function deleteUser(User $user): void
    {
        $user->delete();
    }
}
