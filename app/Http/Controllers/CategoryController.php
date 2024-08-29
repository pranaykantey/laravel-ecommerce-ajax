<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::withCount('products')->orderBy('id','DESC')->get();
        return view('admin.category.categories', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        $categories = Category::withCount('products')->orderBy('id','DESC')->get();
        return view('admin.category.add-category', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name'      => ['required'],
            'slug'      => ['required','unique:categories'],
            'image'     => ['nullable'],
            'parent_id' => ['nullable']
        ]);

        if( !empty($request->image) ) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $fields['image'] = 'images/'.$imageName;
        }

        Category::create($fields);
        // $categoriesGet = Category::doesntHave('parent')->with(['parent','childs'])->orderBy('id', 'ASC')->get();
        $categories = Category::withCount('products')->orderBy('id','DESC')->get();;
        // dd($categories);
        return response()->json([
            'status'    => 200,
            'html'      => view('admin.category.parts.select-box', compact('categories'))->render()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, Request $request)
    {
        $categories = Category::all();
        $catSingle = $category;
        // $categories = $this->getAllCatsAsHtml();
        if( $request->ajax() ) {
            return response()->json([
                'status'    => 200,
                'html'      => view('admin.category.parts.form', compact('category'))->render()
            ]);
        }
        return view('admin.category.edit-category', compact('catSingle','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $fields = $request->validate([
            'name'      => ['required'],
            'slug'      => ['required'],
            'image'     => ['nullable']
        ]);

        if( !empty($request->image) ) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $fields['image'] = 'images/'.$imageName;
        }

        if( $request->ajax() ) {
            $category->update($fields);
            $categories = Category::withCount('products')->orderBy('id','DESC')->get();
            // $categories = Category::withCount('products')->orderBy('id','DESC')->get();
            return response()->json([
                'status'        => 200,
                'html'          => view('admin.category.parts.table', compact('categories'))->render()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, Request $request)
    {
        if( $request->ajax() ) {

            $category->delete();

            $categories = Category::withCount('products')->orderBy('id', 'DESC')->get();
            return response()->json([
                'status'    => 200,
                'html'      => view('admin.category.parts.table', compact('categories'))->render()
            ]);
        }

    }

    // public function getAllCatsAsHtml() {
    //     $categoriesGet = Category::doesntHave('parent')->with(['parent','childs'])->orderBy('id', 'ASC')->get();
    //     $categories = '<option value="">None</option>';
    //     foreach($categoriesGet as $category) {
    //         if( !$category->parent_id ) {
    //             $categories .= '<option value="'.$category->id.'">'.$category->name.'</option>';
    //             if( $category->childs ) {
    //                 foreach( $category->childs as $child ) {
    //                     $categories .= '<option value="'.$child->id.'"> - '.$child->name.'</option>';
    //                     if( $child->childs ) {
    //                         foreach( $child->childs as $kids ) {
    //                             $categories .= '<option value="'.$kids->id.'"> - - '.$kids->name.'</option>';
    //                             if( $kids->childs ) {
    //                                 foreach( $kids->childs as $gkids ) {
    //                                     $categories .= '<option disabled="disabled" value="'.$gkids->id.'"> - - - '.$gkids->name.'</option>';
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     return $categories;
    // }
}
