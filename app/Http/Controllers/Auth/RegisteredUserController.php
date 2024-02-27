<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;


class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre_usuario' => ['required', 'string', 'max:255', 'unique:usuarios'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
                'password' => ['required', 'string'],
                'nombre' => ['required', 'string', 'max:255'],
                'apellidos' => ['required', 'string', 'max:255'],
                'fecha_nacimiento' => ['required','date'],
            ]);


            $user = User::create([
                'nombre_usuario' => $request->nombre_usuario,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'fecha_nacimiento' => $request->fecha_nacimiento,
            ]);

            event(new Registered($user));

            Auth::login($user);

            return response()->json(['message' => 'Usuario registrado correctamente', $user], 201);
            
            if ($validator->fails()) {
                return response()->json(['message' => 'La validación ha fallado', 'errors' => $validator->errors()], 422);
            }
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorCode = $exception->errorInfo[1];
            if ($errorCode === 1062) { // Código de error para violación de restricción única
                return response()->json(['message' => 'Este usuario ya existe'], 422);
            }
            // Manejar otros errores de base de datos si es necesario
            return response()->json(['message' => 'Error al procesar la solicitud'], 500);
        }
    }
}
