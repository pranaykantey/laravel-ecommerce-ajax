<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title'                 =>  ['required'],
            'slug'                  =>  ['required'],
            'brand_id'              =>  ['required'],
            'description'           =>  ['required'],
            'image'                 =>  ['required'],
            'short_description'     =>  ['required'],
            'regular_price'         =>  ['required'],
            'sale_price'            =>  ['nullable'],
            'images'                =>  ['nullable'],
            'SKU'                   =>  ['nullable'],
            'quantity'              =>  ['nullable'],
            'stock_status'          =>  ['nullable'],
            'featured'              =>  ['nullable'],
            'product_category_id'   =>  ['nullable'],
        ]);

        $productCreate = Product::create($fields);

        return response()->json(['message'=>'Product Added Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
