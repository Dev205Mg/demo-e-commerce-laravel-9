<?php

namespace App\Repositories;

use App\Models\Product;

Class CartRepository 
{
    public function add(Product $product) :int
    {
        \Cart::session(auth()->user()->id)
            ->add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
                'attributes' => [],
                'associatedModel' => $product
            ]);

        return $this->count();

    }

    public function content(){
        return \Cart::session(auth()->user()->id)->getContent();
    }

    public function increase($id){
        \Cart::session(auth()->user()->id)->update($id, [
            'quantity' => +1
        ]);
    }
    
    public function decrease($id){

        $item = \Cart::session(auth()->user()->id)->get($id);

        if($item->quantity === 1){
            $this->remove($id);
            return;
        }

        \Cart::session(auth()->user()->id)->update($id, [
            'quantity' => -1
        ]);
    }

    public function remove($id){
        \Cart::session(auth()->user()->id)->remove($id);
    }

    public function count() :int
    {
        return $this->content()->sum('quantity');
    }

}