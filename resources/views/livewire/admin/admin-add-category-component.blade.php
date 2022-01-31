<div>
    <div class="container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-defualt">
                    <div class="panel-heanding">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-danger btn-sm pull-right">All Categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCategory">
                            
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Category Name</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="name" wire:keyup="generateslug" placeholder="Type Category Name" class="form-control input-md" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Category Slug</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="slug" placeholder="Type Category Sulg" class="form-control input-md" />
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
