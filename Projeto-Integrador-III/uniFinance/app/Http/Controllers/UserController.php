<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{



    // Dependencie Injection
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }



    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'completeName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['completeName', 'email', 'password']);

        // Verifica se imagem de perfil foi enviada
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos');
        }

        // Criação de usuário com o ServiceLayer
        $user = $this->userService->createUser($data);

            return redirect()->route('login-get')->with('success', 'User created successfully');
    }

    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'completeName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:5|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::findOrFail($id);
        $data = $request->only(['completeName', 'email']);
        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos');
        }

        $updatedUser = $this->userService->updateUser($user, $data);

        return response()->json(['message' => 'User updated successfully', 'user' => $updatedUser]);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $this->userService->deleteUser($user);

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function createUserForm()
    {
        return view('signup');
    }
}
