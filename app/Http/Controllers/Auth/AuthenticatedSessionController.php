<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->session()->regenerate();
        $validator = Validator::make($request->all(), [
            'email' => 'exists:usuarios,email',
        ], ['email.exists'=> 'El usuario no existe']);

        if($validator->fails()){
            return response()->json(['message'=> $validator->errors()->first()], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'contraseña incorrecta'], 422);
        }
        Auth::user()->tokens()->delete();
        $token = Auth::user()->createToken('token', ['usuario-registrado']);


        return response()->json(['message' => 'correcto',  'token' => $token->plainTextToken, 'username' => Auth::user()->nombre_usuario], 200);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::user()->tokens()->delete();
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        

        return response()->json(['message' => 'logged out'], 200);
    }
}
