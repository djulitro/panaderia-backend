<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Iniciar sesión
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            // Cargamos la organización y el tipo de usuario
            $user->load('organization');

            // Agregamos un expired_at al token
            $expiredAt = now()->addMinutes(config('sanctum.expiration', 60));

            return response()->json([
                'user' => $user,
                'token' => $token,
                'expires_at' => $expiredAt,
                'token_type' => 'Bearer',
            ]);
        }
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }

    // Obtener usuario autenticado
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}
