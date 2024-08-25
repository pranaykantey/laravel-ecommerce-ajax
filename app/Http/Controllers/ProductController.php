<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandProductRelationship;
use App\Models\Product;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['user','brand'])->orderBy('id', 'DESC')->get();
        return view('admin.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::orderBy('id','DESC')->get();
        return view('admin.add-product', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title'                 =>  ['required'],
            'slug'                  =>  ['required'],
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
            'brand_id'              =>  ['nullable'],
        ]);

        // $fields['brand_name']       = '';
        $fields['user_id']          = Auth::id();

        $productCreate = Product::create($fields);

        // $productCreate->brand()->create([
        //     'brand_id'          => $request->brand_id,
        //     'product_id'        => $productCreate->ID
        // ]);

        return response()->json(['message'=>'Product Added Successfully']);
        // return response()->json(['message'=>'Product Added Successfully']);
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
