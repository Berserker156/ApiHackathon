<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Images::all();
        return response()->json($images);
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
        $imagen = new Images;
        $imagen->imagen = $request->imagen;
        $imagen->save();
        $data =[
            "mesaje" => "imagen agregada",
            "Imagen" => $imagen
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Images $images)
    {
        return response->json($images);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Images $images)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Images $images)
    {
        $imagen->imagen = $request->imagen;
        $imagen->save();
        $data =[
            "mesaje" => "imagen agregada",
            "Imagen" => $imagen
        ];
        return response()->json($data);    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Images $images)
    {
        $images->delete();
        $data =[
            "mesaje" => "imagen eliminada",
            "image" => $images
        ];
        return response()->json($data);    }
}
