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
        return view('admin.categories');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        // $categories = Category::with(['parent','childs'])->orderBy('id', 'ASC')->get();
        // $categories = Category::doesntHave('parent')->with(['parent','childs'])->orderBy('id', 'ASC')->get();


        // $categories = '';
        // foreach($categoriesGet as $category) {
        //     // dd($category->name);
        //     if( !$category->parent_id ) {
        //         $categories .= '<option value="'.$category->id.'">'.$category->name.'</option>';
        //         if( count($category->childs) > 0 ) {
        //             foreach( $category->childs as $child ) {
        //                 $categories .= '<option value="'.$child->id.'"> - '.$child->name.'</option>';
        //             }
        //         }
        //     }
        // }

        $categories = $this->getAllCatsAsHtml();
        // dd($categories);
        return view('admin.add-category', compact('categories'));
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

        Category::create($fields);

        // $categoriesGet = Category::doesntHave('parent')->with(['parent','childs'])->orderBy('id', 'ASC')->get();
        $categories = $this->getAllCatsAsHtml();
        // dd($categories);
        return response()->json(['message'=>'Category Added Successfully','categories'=>
        $categories]);
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
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function getAllCatsAsHtml() {
        $categoriesGet = Category::doesntHave('parent')->with(['parent','childs'])->orderBy('id', 'ASC')->get();
        $categories = '<option value="">None</option>';
        foreach($categoriesGet as $category) {
            if( !$category->parent_id ) {
                $categories .= '<option value="'.$category->id.'">'.$category->name.'</option>';
                if( $category->childs ) {
                    foreach( $category->childs as $child ) {
                        $categories .= '<option value="'.$child->id.'"> - '.$child->name.'</option>';
                        if( $child->childs ) {
                            foreach( $child->childs as $kids ) {
                                $categories .= '<option value="'.$kids->id.'"> - - '.$kids->name.'</option>';
                                if( $kids->childs ) {
                                    foreach( $kids->childs as $gkids ) {
                                        $categories .= '<option disabled="disabled" value="'.$gkids->id.'"> - - - '.$gkids->name.'</option>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $categories;
    }
}
