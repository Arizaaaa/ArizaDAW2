<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function insert(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $category = new Product();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de usuario exitoso!",
        ]);
    }
}