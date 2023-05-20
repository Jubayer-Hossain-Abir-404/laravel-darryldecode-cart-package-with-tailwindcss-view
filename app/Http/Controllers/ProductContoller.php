<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductContoller extends Controller
{
    public function product_list(){
        $products = Product::all();
        return view('products', compact('products'));
    } 
}
