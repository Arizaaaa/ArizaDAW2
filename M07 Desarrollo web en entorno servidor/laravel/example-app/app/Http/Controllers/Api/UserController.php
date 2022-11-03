<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->edad=20;
        $user->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de usuario exitoso!",
        ]);
    }

    public function login(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        $user = User::where("email", "=", $request->email)->first();
        if( isset($user->id) ){
            if(Hash::check($request->password, $user->password)){
                //creamos el token
                $token = $user->createToken("auth_token")->plainTextToken;
                //si está todo ok
                return response()->json([
                    "status" => 1,
                    "msg" => "¡Usuario logueado exitosamente!",
                    "access_token" => $token
                ]);
            }else{
                return response()->json([
                    "status" => 0,
                    "msg" => "La password es incorrecta",
                ], 404);
            }
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no registrado",
            ], 404);
        }
    }

    public function userProfile() {
        return response()->json([
            "status" => 0,
            "msg" => "Acerca del perfil de usuario",
            "data" => auth()->user()
        ]);
    }

    public function logout() {
        $user=User::find(auth()->user()->id);
        $user->tokens()->delete();
        return response()->json([
            "status" => 1,
            "msg" => "Cierre de Sesión",
        ]);
    }

    public function insert(Request $request) {
        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required',
            'precio' => 'required'
        ]);
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro insertado!",
        ]);
    }
}