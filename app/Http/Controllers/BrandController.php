<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('admin.brand.brands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.add-brand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name'          => ['required'],
            'slug'          => ['required', 'unique:brands'],
            'image'         => ['nullable'],
        ]);

        if( !empty($fields['image']) ) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $fields['image'] = 'images/'.$imageName;
        }

        $brand = Brand::create($fields);

        return response()->json(['message' => 'Brand Added Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {
        $brand = Brand::find($id);
        if( $request->ajax() ) {
            if ($brand) {
                return response()->json([
                    'status' => 200,
                    'html' => view('admin.brand.parts.ajax-edit', compact('brand'))->render()
                ]);
            }
        }
        return view('admin.brand.edit-brand', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $fields = $request->validate([
            'name'      => ['required'],
            'slug'      => ['required'],
            'image'     => ['nullable']
        ]);

        if( !empty( $fields['image'] ) ) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $fields['image']    = 'images/'.$imageName;

            // Dont work. optional feature delete image.
            // if( File::exists($request->image) ) {
            //     File::delete($request->image);
            // }
        }

        // $image_path = "/images/filename.ext";  // Value is not URL but directory file path
        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }


        if( $brand->update($fields) ) {
            $brands = Brand::all();
            return response()->json([
                'status' => 200,
                'html' => view('admin.brand.parts.ajax-table', compact('brands'))->render()
            ]);
        }


        // return view('admin.brand.table', compact('brands'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if( $brand->delete() ) {
            $brands = Brand::all();
            return response()->json([
                'status'    => 200,
                'html'      => view('admin.brand.parts.ajax-table', compact('brands'))->render(),
                'message'   => 'Deleted Succesfully',
            ]);
        }
    }
}
