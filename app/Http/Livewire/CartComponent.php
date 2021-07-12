<?php

namespace App\Http\Livewire;
use Cart;
use Livewire\Component;

class CartComponent extends Component
{
    
    public function increaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }
    public function destroy($rowId){
        Cart::remove($rowId);
        session()->flash('success-message','ITEM HAS BEEN REMOVED');
    }
    public function destroyAll(){
        Cart::destroy();
        session()->flash('success-message','ITEM HAS BEEN ALL REMOVED');
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}

//10-Laravel 8 E-Commerce - Product Sorting and Products Per Page-JRfVlI8O8OI