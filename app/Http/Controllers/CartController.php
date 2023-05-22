<?php

namespace App\Http\Controllers;


use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart_list(){
        $carts = Cart::getContent();
        return view('cart', compact('cart'));
    }

    public function add_cart(Request $request){
        Cart::add(
            array(
                'id' => $request->id,
                // inique row ID
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => 1,
                'attributes' => array(
                    'image' => $request->image,
                    'description' => $request->description
                )
            )
        );

        return back();
    }
}
