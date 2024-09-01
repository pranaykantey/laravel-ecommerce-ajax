<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index() {
        return view('frontend.cart');
    }
    public function addToCart($id ) {
        // request()->session()->put('product');

        if( request()->session()->has('productcart.items') ) {
            $cart = request()->session()->get('productcart.items');
        }else {
            $cart = [];
        }
        array_push($cart, $id);
        request()->session()->push('productcart.items', $cart);

        dd( request()->session()->all());

        return response()->json([
            'status'    => 200,
            'message'   => 'Added successfully !'
        ]);

    }
}
