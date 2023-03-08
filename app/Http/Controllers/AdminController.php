<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.index', ['products' => $products]);
    }

    public function store(Request $request){
        $validateData = $request->validateWithBag('errorsPut',[
            'name' => ['required','min:5', 'max:40', 'unique:products'],
            'description' => ['required', 'min:25'],
            'price' => ['required'],
            'image' => ['required', 'image', 'max:2049'],
        ]);
        
        $validateData['image'] = $request->file('image')->store('images');
        
        Product::create($validateData);
        
        return to_route('admin.index')->with('status', 'Produit-stocker');
    }
    
    public function edit(Product $product){
        return view('admin.edit', ['product' => $product]);
    }
    
    public function update(Request $request, Product $product){
        $productValidate = $request->validateWithBag('errorsUpdate',[
            'name' => ['required','min:5', 'max:40'],
            'description' => ['required', 'min:25'],
            'price' => ['required'],
            'image' => ['image', 'max:2049'],
        ]);
        if(isset($productValidate["image"])){
            $productValidate['image'] = $request->file('image')->store('images');
            Storage::delete($product->image);
        }
        $product->update($productValidate);

        return to_route('admin.index')->with('status', 'Produit-updated');
    }


    public function create(){
        return view('admin.create');
    }

    public function destroy(Product $product){
        Storage::delete($product->image);
        $product->delete();
        return to_route('admin.index')->with('status', 'Product-deleted');
    }
}
