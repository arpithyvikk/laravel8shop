<div>
    <div class="container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-defualt">
                    <div class="panel-heanding">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-danger btn-sm pull-right">All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="addProduct" enctype="multipart/form-data">
                            
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Product Name</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="name" wire:keyup="generateSlug" placeholder="Type Product Name" class="form-control input-md" />
                                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Product Slug</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="slug" placeholder="Type Product Sulg" class="form-control input-md" />
                                        @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Short Description</label>
                                    <div class="col-md-4" wire:ignore>
                                        <textarea cols="30" rows="5" id="short_description" wire:model="short_description" class="form-control" placeholder="Type Sort Description about Product"></textarea>
                                        @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-4" wire:ignore>
                                        <textarea cols="30" rows="5" id="description" wire:model="description" class="form-control" placeholder="Type Description about Product"></textarea>
                                        @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Regular Price</label>
                                    <div class="col-md-4">
                                        <input type="number" wire:model="regular_price" placeholder="Type Product Regular Price" class="form-control input-md" />
                                        @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Sale Price</label>
                                    <div class="col-md-4">
                                        <input type="number" wire:model="sale_price" placeholder="Type Product Sale Price" class="form-control input-md" />
                                        @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">SKU</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="SKU" placeholder="Type SKU" class="form-control input-md" />
                                        @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Stock Status</label>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="stock_status">
                                            <option value="instock">InStock</option>
                                            <option value="outstock">Out of Stock</option>
                                        </select>
                                        @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Featured</label>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('featured') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Quantity</label>
                                    <div class="col-md-4">
                                        <input type="number" wire:model="quantity" placeholder="Type Product Quantity" class="form-control input-md" />
                                        @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div><div class="form-group">
                                    <label for="" class="col-md-4 control-label">Product Image</label>
                                    <div class="col-md-4">
                                        <input type="file" wire:model="image" class="input-file input-md" />
                                        @if ($image)
                                            <img src="{{$image->temporaryUrl()}}" width="120" />
                                        @endif
                                        @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Category</label>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="category_id">
                                            <option selected>Select Product Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label"> </label>
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-warning" value="Submit"/>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector:'#short_description',
                setup:function(editor){
                    editor.on('change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }
            });
            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
@endpush