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
}
