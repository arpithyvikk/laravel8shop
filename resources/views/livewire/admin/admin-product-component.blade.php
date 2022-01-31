<div>
    <div class="container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-defualt">
                    <div class="panel-heanding">
                        <div class="col-md-6">
                            All Products
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addproduct')}}" class="btn btn-danger btn-sm pull-right">Add Product</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <br>
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <br>
                         <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" width="60" /></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->stock_status}}</td>
                                        <td>{{$product->regular_price}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>
                                           <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x text-warning"></i></a>
                                            &nbsp;
                                           <a href="#" wire:click.prevent="deleteProduct({{$product->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                         <div class="wrap-pagination-info">
                            {{ $products->links() }}
                            {{-- <ul class="page-numbers">
                                <li><span class="page-number-item current" >1</span></li>
                                <li><a class="page-number-item" href="#" >2</a></li>
                                <li><a class="page-number-item" href="#" >3</a></li>
                                <li><a class="page-number-item next-link" href="#" >Next</a></li>
                            </ul>
                            <p class="result-count">Showing 1-8 of 12 result</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
