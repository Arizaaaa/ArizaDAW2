<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessorController extends Controller
{
    public function insert(Request $request) { // Inserta un estudiante

        if (auth()->user()->role == 1 || auth()->user()->role == 3 || auth()->user()->role == 4) {

            $request->validate([
                'nombre' => 'required',
                'apellidos' => 'required',
                'dni' => 'required',
            ]);
            $proffesor = new Professor();
            $proffesor->nombre = $request->nombre;
            $proffesor->apellidos = $request->apellidos;
            $proffesor->dni = $request->dni;
            $proffesor->save();

            return response()->json([
                "status" => 1,
                "msg" => "¡Registro de profesor exitoso!",
            ]);

        } else {return "No tienes permiso";}
    }

    public function delete(Request $request) { // Elimina un estudiante

        if (auth()->user()->role == 1 || auth()->user()->role == 4) {

            $request->validate([
                'id' => 'required',
            ]);

            $proffesor = Professor::find($request->id);
            $proffesor = DB::table('proffesors')->where('id', $request->id)->first();
            DB::table('proffesors')->where('id', $request->id)->delete();

            return response()->json([
                "status" => 1,
                "msg" => "Profesor eliminado!",
            ]);        

        } else {return "No tienes permiso";}

    }

    public function update(Request $request) { // Actualiza un estudiante

        if (auth()->user()->role == 1 || auth()->user()->role == 4) {

            $request->validate([
                'id' => 'required',
                'nombre' => 'required',
                'apellidos' => 'required',
                'dni' => 'required',
            ]);

            DB::update('update proffesors set nombre = ?, apellidos = ?, dni = ? WHERE id = ?',
            [$request->nombre, $request->apellidos, $request->dni, $request->id]);

            return response()->json([
                "status" => 1,
                "msg" => "¡Profesor actualizado!",
            ]);     
        
        } else {return "No tienes permiso";}

    }

    public function read(Request $request) { // Lee un estudiante

        if (auth()->user()->role == 1 || auth()->user()->role == 4) {

            $request->validate([
                'id' => '',
                'nombre' => '',
                'apellidos' => '',
                'dni' => '',
            ]);

            $proffesor = new Professor();
            $proffesor = DB::select('select * FROM proffesors WHERE id = ? OR nombre = ? OR apellidos = ? OR dni = ?',
            [$request->id, $request->name, $request->apellidos, $request->dni,]);

            return $proffesor;

            return response()->json([
                "status" => 1,
                "msg" => "Vista exitosa",
            ]);

        } else {return "No tienes permiso";}

    }
}
