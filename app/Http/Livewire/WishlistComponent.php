<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function store($product_id,$product_name,$product_price)
    {   
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }

    public function render()
    {
        $wishid = Cart::instance('wishlist')->content()->pluck('id')->toArray();
        $products = Product::whereIn('id',$wishid)->get();
        $sale = Sale::find(1);
        return view('livewire.wishlist-component',['sale'=>$sale, 'products'=>$products])->layout('layouts.base');
   
    }
}
