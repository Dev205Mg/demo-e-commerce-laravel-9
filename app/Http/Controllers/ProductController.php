<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products = Product::inRandomOrder()->paginate(16);
        // $products = Product::orderBy('id', 'desc')->paginate(20);

        return view('product.index', compact('products'));
    }

    public function show(Product $product, Request $request){

        return view('product.view', ['product' => $product]);
    }
}
