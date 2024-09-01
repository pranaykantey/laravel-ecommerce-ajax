<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandProductRelationship;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategoryRel;
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
        $products = Product::with(['user', 'brand', 'category'])->orderBy('id', 'DESC')->get();
        // return $products;
        return view('admin.product.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::orderBy('id', 'DESC')->get();
        $categories = Category::doesntHave('parent')->with(['parent', 'childs'])->orderBy('id', 'DESC')->get();
        return view('admin.product.add-product', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return var_dump($request->product_category_id);
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
        $fields['user_id']          = (NULL != Auth::id()) ? Auth::id() : 1;

        if( !empty( $request->image ) ) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move( public_path('images/products'), $imageName);
            $fields['image'] = 'images/products/'. $imageName;
        }

        $productCreate = Product::create($fields);


        // return response()->json(['message' => dd( $fields['product_category_id'] )]);

        if (isset($fields['product_category_id'])) {
            if (count($fields['product_category_id']) > 0) {


                // $productCreate->category()->sync(array_values($fields['product_category_id']));

                foreach ($fields['product_category_id'] as $cat) {
                    /* // return var_dump(intVal($cat));
                    // $productCreate->category()->create([
                    //     'product_id'    => $productCreate->id,
                    //     'category_id'   => intVal($cat)
                    // ]); */
                    ProductCategoryRel::create([
                        'product_id'    => $productCreate->id,
                        'category_id'   => intVal($cat)
                    ]);
                }
            }
        }

        // $productCreate->brand()->create([
        //     'brand_id'          => $request->brand_id,
        //     'product_id'        => $productCreate->ID
        // ]);

        return response()->json(['message' => 'Product Added Successfully']);
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
        $brands = Brand::orderBy('id', 'DESC')->get();
        // $product = Product::find($product->id);
        // $categories = Category::orderBy('id', 'DESC')->get();
        $categories = Category::doesntHave('parent')->with(['parent', 'childs'])->orderBy('id', 'DESC')->get();
        $product = Product::with(['category'])->find($product->id);
        if( request()->ajax() ) {
            return response()->json([
                'status'        => 200,
                'html'          => view('admin.product.parts.edit-product', compact(['product', 'brands', 'categories']))->render()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $fields = $request->validate([
            'title'                 =>  ['required'],
            'slug'                  =>  ['required'],
            'description'           =>  ['required'],
            'image'                 =>  ['nullable'],
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


        if( !empty( $request->image ) ) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move( public_path('images/products'), $imageName);
            $fields['image'] = 'images/products/'. $imageName;
        }

        $product->update($fields);
        $products = Product::with(['user', 'brand', 'category'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status'    => 200,
            'html'      => view('admin.product.parts.table', compact('products'))->render()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        $products = Product::with(['user', 'brand', 'category'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status'    => 200,
            'html'      => view('admin.product.parts.table', compact('products'))->render()
        ]);
    }

    /**
     * return all the categories as html.
     *
     * @return  string  Html category select
     */
    // public function getAllCatsAsHtml()
    // {
    //     $categoriesGet = Category::doesntHave('parent')->with(['parent', 'childs'])->orderBy('id', 'ASC')->get();
    //     // $categories = '<input type="checkbox" name="category['.$id.']" value="">None</option>';
    //     $categories = '<ul class="catgory-ul">';
    //     foreach ($categoriesGet as $category) {
    //         if (!$category->parent_id) {
    //             $categories .= '<li><label><input type="checkbox" name="product_category_id[' . $category->id . ']" value="' . $category->id . '">' . $category->name . '</label></li>';
    //             if ($category->childs) {
    //                 foreach ($category->childs as $child) {
    //                     $categories .= '<li><label><input type="checkbox" name="product_category_id[' . $child->id . ']" value="' . $child->id . '"> - ' . $child->name . '</label></li>';
    //                     if ($child->childs) {
    //                         foreach ($child->childs as $kids) {
    //                             $categories .= '<li><label><input type="checkbox" name="product_category_id[' . $kids->id . ']" value="' . $kids->id . '"> - - ' . $kids->name . '</label></li>';
    //                             if ($kids->childs) {
    //                                 foreach ($kids->childs as $gkids) {
    //                                     $categories .= '<li><label><input type="checkbox" name="product_category_id[' . $gkids->id . ']"  value="' . $gkids->id . '"> - - - ' . $gkids->name . '</label></li>';
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     $categories .= '</ul>';
    //     return $categories;
    // }

    public function shop() {
        $products = Product::all();
        return view('frontend.shop', compact('products'));
    }

    public function singleProduct($id) {
        $product = Product::find($id);
        return view('frontend.single-product', compact('product'));
    }
}
