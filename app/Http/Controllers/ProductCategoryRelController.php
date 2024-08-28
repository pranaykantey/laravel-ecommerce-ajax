<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryRel;
use Illuminate\Http\Request;

class ProductCategoryRelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message'=>'added Category']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(['message'=>'added Category']);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategoryRel $productCategoryRel)
    {
        return response()->json(['message'=>'added Category']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategoryRel $productCategoryRel)
    {
        return response()->json(['message'=>'added Category']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategoryRel $productCategoryRel)
    {
        return response()->json(['message'=>'added Category']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategoryRel $productCategoryRel)
    {
        return response()->json(['message'=>'added Category']);
    }
}
