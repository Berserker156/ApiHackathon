<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return response()->json($products);  
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
        $products = new Products;
        $products->product = $request->product;
        $products->Price = $request->Price;
        $products->description = $request->description;
        $products->Stock = $request->Stock;
        $products->save();
        $data =[
            "mesaje" => "producto creado",
            "products" => $products
        ];
        return response()->json($data);    
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        return response()->json($products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        $products->product = $request->product;
        $products->Price = $request->Price;
        $products->description = $request->description;
        $products->Stock = $request->Stock;
        $products->save();
        $data =[
            "mesaje" => "producto creado",
            "products" => $products
        ];
        return response()->json($data); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        $products->delete();
        $data =[
            "mesaje" => "produto eliminada",
            "produto" => $products
        ];
        return response()->json($data);
        }
}
