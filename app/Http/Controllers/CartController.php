<?php

namespace App\Http\Controllers;


use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_cart(Request $request)
    {
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

    public function update_cart(Request $request)
    {
        Cart::update(
            $request->id,
            array(
                'quantity' => $request->quantity,
                // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            )
        );
        return back();
    }

    public function view_cart()
    {
        $carts = Cart::getContent();
        return view('view_cart', compact('carts'));
    }

    public function remove_item($id){
        Cart::remove($id);

        return back();
    }

    public function clear_item(){
        Cart::clear();
        return back();
    }
}