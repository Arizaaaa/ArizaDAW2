<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function insert(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de categoria exitoso!",
        ]);
    }

    public function delete(Request $request) {

        $request->validate([
            'id' => 'required',
        ]);

        $category = Category::find($request->id);
        $category = DB::table('categories')->where('id', $request->id)->first();
        DB::table('categories')->where('id', $request->id)->delete();

        return response()->json([
            "status" => 1,
            "msg" => "¡Categoria eliminada!",
        ]);        

    }

    public function update(Request $request) {

        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        DB::update('update categories set name = ?, description = ? WHERE id = ?',
        [$request->name, $request->description, $request->id]);

        return response()->json([
            "status" => 1,
            "msg" => "¡Categoria actualizada!",
        ]);        

    }

    public function read(Request $request) {
        $request->validate([
            'id' => '',
            'name' => '',
            'description' => '',
        ]);

        $category = new Category();
        $category = DB::select('select * FROM categories WHERE id = ? OR name = ? OR description = ? ',
        [$request->id, $request->name, $request->description]);

        return $category;

        return response()->json([
            "status" => 1,
            "msg" => "Vista exitosa",
        ]);
    }

}