<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {

        $request->session()->regenerate();

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'usuario o contraseña inválidos'], 422);
        }
        Auth::user()->tokens()->delete();
        $token = Auth::user()->createToken('token', ['usuario-registrado']);

        return response()->json(['message' => 'correcto', 'email'=>$request->email, 'token' => $token->plainTextToken], 200);
        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return response()->json(['message' => 'logged out'], 200);
    }
}
