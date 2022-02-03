<div>
    <main id="main" class="main-site left-sidebar">
        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="{{url('/')}}" class="link">home</a></li>
                    <li class="item-link"><span>Wishlist</span></li>
                </ul>
            </div>
            <div class="row">
                @if (Cart::instance('wishlist')->content()->count() > 0)
                <ul class="product-list grid-products equal-container">
                    @foreach ($products as $product)
                        <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now() )
                                    <div class="group-flash">
                                        <span class="flash-item sale-label">sale</span>
                                    </div>                                    
                                    @endif
                                    <a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{$product->image}}" alt="{{$product->name}}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{route('product.details',['slug'=>$product->slug])}}" class="product-name"><span>{{$product->name}}</span></a>
                                    @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now() )
                                    <div class="wrap-price"><ins><p class="product-price">₹{{$product->sale_price}}</p></ins><del><p class="product-price">₹{{$product->regular_price}}</p></del></div>                    
                                    <a href="#" class="btn add-to-cart" wire:click="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">Add To Cart</a>
                                    @else
                                    <div class="wrap-price"><span class="product-price">  ₹{{$product->regular_price}}</span></div>                    
                                    <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add To Cart</a>
                                    @endif   
                                    <div class="product-wish">  
                                        <a href="#" title="Remove from Wishlist" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fa fa-close detail-add-wish"></i></a>
                                    </div>                                 
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @else
                    <h3>Your </b class="text-danger">Wishlist</b> is Empty</h3>
                @endif
                
            </div>
        </div>
    </main>
</div>
