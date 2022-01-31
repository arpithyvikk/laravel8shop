<div>
    <div class="container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-defualt">
                    <div class="panel-heanding">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Slider
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeslider')}}" class="btn btn-danger btn-sm pull-right">All Sliders</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="addSlider" enctype="multipart/form-data">
                            
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Title</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="title" placeholder="Type Slider Title" class="form-control input-md" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Subtitle</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="subtitle" placeholder="Type Slider Subtitle" class="form-control input-md" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Price</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="price" placeholder="Type Slider Price" class="form-control input-md" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Link</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="link" placeholder="Type Slider Link" class="form-control input-md" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Status</label>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Image</label>
                                    <div class="col-md-4">
                                        <input type="file" wire:model="image" class="input-file input-md" />
                                        <br>
                                        @if ($image)
                                            <img src="{{$image->temporaryUrl()}}" width="140" />
                                        @endif
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
