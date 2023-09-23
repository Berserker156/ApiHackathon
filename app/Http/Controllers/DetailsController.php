<?php

namespace App\Http\Controllers;

use App\Models\Details;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Details::all();
        return response()->json($details);

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
        $details = new Details;
        $details->Cantidad = $request->Cantidad; 
        $details->subtotal = $request->subtotal;
        $details->descuento = $request->descuento;
        $details->save();
        $data = [
            "mesaje"=>"details agregado",
            "Details"=> $details
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(details $details)
    {
        return response()->json($details);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(details $details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, details $details)
    {
        $details->Cantidad = $request->Cantidad; 
        $details->subtotal = $request->subtotal;
        $details->descuento = $request->descuento;
        $details->save();
        $data = [
            "mesaje"=>"details agregado",
            "Details"=> $details
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(details $details)
    {
        $details -> delete();
        $data =[
            "mesaje"=>"detalis borrado",
            "details"=>$details
        ];
        return response()->json($data);
    }
}
