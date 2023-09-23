<?php

namespace App\Http\Controllers;

use App\Models\Rols;
use Illuminate\Http\Request;

class RolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rols = Rols::all();
        return response()->json($rols);
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
        $rols = new Rols;
        $rols->nombre_rol = $request->nombre_rol;
        $rols->enable = $request->enable;
        $rols->save();
        $data =[
            "mesaje" => "roles creada",
            "roles" => $rols
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rols $rols)
    {
        return response()->json($rols);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rols $rols)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rols $rols)
    { 
        $rols->nombre_rol = $request->nombre_rol;
        $rols->enable = $request->enable;
        $rols->save();
        $data =[
            "mesaje" => "roles creada",
            "roles" => $rols
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rols $rols)
    {
        $rols->delete();
        $data =[
            "mesaje" => "roles eliminada",
            "roles" => $rols
        ];
        return response()->json($data);
    }
}
