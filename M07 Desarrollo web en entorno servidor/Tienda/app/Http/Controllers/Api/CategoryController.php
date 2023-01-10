<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    public function index()
    {
        return response()->json([
            "message" => "Método index"
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        return response()->json([
            "result" => "Método update. ID: ".$id,
            "request" => $request->description
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        //
    }
}
