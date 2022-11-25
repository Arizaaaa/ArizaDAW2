<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function insert(Request $request) { // Inserta un estudiante
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'curso' => 'required',
        ]);
        $student = new Student();
        $student->nombre = $request->nombre;
        $student->apellidos = $request->apellidos;
        $student->dni = $request->dni;
        $student->curso = $request->curso;
        $student->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de estudiante exitoso!",
        ]);
    }

    public function delete(Request $request) { // Elimina un estudiante

        $request->validate([
            'id' => 'required',
        ]);

        $student = Student::find($request->id);
        $student = DB::table('students')->where('id', $request->id)->first();
        DB::table('students')->where('id', $request->id)->delete();

        return response()->json([
            "status" => 1,
            "msg" => "¡Estudiante eliminado!",
        ]);        

    }

    public function update(Request $request) { // Actualiza un estudiante

        $request->validate([
            'id' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'curso' => 'required',
        ]);

        DB::update('update students set nombre = ?, apellidos = ?, dni = ?, curso = ? WHERE id = ?',
        [$request->nombre, $request->apellidos, $request->dni, $request->curso, $request->id]);

        return response()->json([
            "status" => 1,
            "msg" => "¡Estudiante actualizado!",
        ]);        

    }

    public function read(Request $request) { // Lee un estudiante
        $request->validate([
            'id' => '',
            'nombre' => '',
            'apellidos' => '',
            'dni' => '',
            'curso' => '',
        ]);

        $student = new Student();
        $student = DB::select('select * FROM students WHERE id = ? OR nombre = ? OR apellidos = ? OR dni = ? OR curso = ? ',
        [$request->id, $request->name, $request->apellidos, $request->dni, $request->curso,]);

        return $student;

        return response()->json([
            "status" => 1,
            "msg" => "Vista exitosa",
        ]);
    }

}
