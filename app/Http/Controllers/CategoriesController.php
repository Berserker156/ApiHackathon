<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = new Categories;
        $categories->NombreCategoria = $request->NombreCategoria;
        $categories->enable = $request->enable; 
        $categories->save();
        $data =[
            "mesaje" => "categoria creada",
            "categoria" => $categories
        ];
        return response()->json($data); 

    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        return response()->json($categories);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        $categories->NombreCategoria = $request->NombreCategoria;
        $categories->enable = $request->enable;
        $categories->save();
        $data =[
            "mesaje" => "update creada",
            "categoria" => $categories
        ];
        return response()->json($data);  
       }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        $categories->delete();
        $data =[
            "mesaje" => "categoria eliminada",
            "categoria" => $categories
        ];
        return response()->json($data);
    }
}
