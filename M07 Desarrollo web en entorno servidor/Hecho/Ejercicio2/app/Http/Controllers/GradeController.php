<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    public function insert(Request $request) { // Inserta un estudiante

        if (auth()->user()->role == 1 || auth()->user()->role == 3) {

            $request->validate([
                'grado' => 'required',
                'id_profesor' => 'required',

            ]);
            $grade = new Grade();
            $grade->grado = $request->grado;
            $grade->id_profesor = $request->id_profesor;
            $grade->save();

            return response()->json([
                "status" => 1,
                "msg" => "¡Registro de grado exitoso!",
            ]);

        } else {return "No tienes permisos";}
    }

    public function delete(Request $request) { // Elimina un estudiante

        if (auth()->user()->role == 1 || auth()->user()->role == 3) {

            $request->validate([
                'id' => 'required',
            ]);

            $grade = Grade::find($request->id);
            $grade = DB::table('grades')->where('id', $request->id)->first();
            DB::table('grades')->where('id', $request->id)->delete();

            return response()->json([
                "status" => 1,
                "msg" => "¡Grado eliminado!",
            ]);        

        } else {return "No tienes permisos";}

    }

    public function update(Request $request) { // Actualiza un estudiante

        if (auth()->user()->role == 1 || auth()->user()->role == 3) {

            $request->validate([
                'id' => 'required',
                'grado' => 'required',
                'id_profesor' => 'required',
            ]);

            DB::update('update grades set grado = ?, id_profesor = ? WHERE id = ?',
            [$request->grado, $request->id_profesor]);

            return response()->json([
                "status" => 1,
                "msg" => "¡Grado actualizado!",
            ]);     
        
        } else {return "No tienes permisos";}

    }

    public function read(Request $request) { // Lee un estudiante

        if (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4) {

            $request->validate([
                'grado' => '',
                'id_profesor' => '',
            ]);

            $grade = new Grade();
            $grade = DB::select('select * FROM grades WHERE id = ? OR grado = ? OR id_profesor = ?',
            [$request->id, $request->grado, $request->id_profesor,]);

            return $grade;

            return response()->json([
                "status" => 1,
                "msg" => "Vista exitosa",
            ]);

        } else {return "No tienes permisos";}

    }
}
