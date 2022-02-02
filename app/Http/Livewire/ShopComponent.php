<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use  App\Models\Category;
use App\Models\Sale;

class ShopComponent extends Component
{   

    public $sorting;
    public $pagesize;
    
    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "defualt";
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 100000;
    }

    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
    }

    public function render()
    {
        if($this->sorting == 'date')
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price')
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price-desc')
        {
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
        }

        $categories = Category::all();
        $sale = Sale::find(1);
        return view('livewire.shop-component',['products'=>$products, 'categories'=>$categories, 'sale'=>$sale])->layout('layouts.base');
    }

    public function store($product_id,$product_name,$product_price)
    {   
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }


}
