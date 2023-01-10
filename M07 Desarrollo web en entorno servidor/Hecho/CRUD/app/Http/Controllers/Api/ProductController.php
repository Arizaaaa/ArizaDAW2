<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function insert(Request $request) {
        $request->validate([
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'idCategory' => 'required'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->idCategory = $request->idCategory;
        $product->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de producto exitoso!",
        ]);
    }

    public function delete(Request $request) {

        $request->validate([
            'id' => 'required',
        ]);

        $product = Product::find($request->id);
        $product = DB::table('products')->where('id', $request->id)->first();
        DB::table('products')->where('id', $request->id)->delete();

        return response()->json([
            "status" => 1,
            "msg" => "¡Producto eliminado!",
        ]);        

    }

    public function update(Request $request) {

        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'idCategory' => 'required'
        ]);

        DB::update('update products set name = ?, stock = ?, price = ?, idCategory = ? WHERE id = ?',
        [$request->name, $request->stock, $request->price, $request->idCategory, $request->id]);

        return response()->json([
            "status" => 1,
            "msg" => "¡Producto actualizado!",
        ]);        

    }

    public function read(Request $request) {
        $request->validate([
            'id' => '',
            'name' => '',
            'stock' => '',
            'price' => '',
            'idCategory' => '',
        ]);

        $product = new Product();
        $product = DB::select('select * FROM products WHERE id = ? OR name = ? OR stock = ? OR price = ? OR idCategory = ?',
        [$request->id, $request->name, $request->stock, $request->price, $request->idCategory]);

        return $product;

        return response()->json([
            "status" => 1,
            "msg" => "Vista exitosa",
        ]);
    }
}