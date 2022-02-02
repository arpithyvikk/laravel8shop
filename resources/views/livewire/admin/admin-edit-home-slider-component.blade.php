<div>
    <div class="container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-defualt">
                    <div class="panel-heanding">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Slider
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
                        <form class="form-horizontal" wire:submit.prevent="editSlider" enctype="multipart/form-data">
                            
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Title</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="title" placeholder="Type Slider Title" class="form-control input-md" />
                                        @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Subtitle</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="subtitle" placeholder="Type Slider Subtitle" class="form-control input-md" />
                                        @error('subtitle') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Price</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="price" placeholder="Type Slider Price" class="form-control input-md" />
                                        @error('price') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Link</label>
                                    <div class="col-md-4">
                                        <input type="text" wire:model="link" placeholder="Type Slider Link" class="form-control input-md" />
                                        @error('link') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Status</label>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="status">
                                            <option value="1" {{$status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$status == 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        @error('status') <p class="text-danger">{{$message}}</p> @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Slider Image</label>
                                    <div class="col-md-4">
                                        <input type="file" wire:model="newimage" class="input-file input-md" />
                                        <br>
                                        @if ($newimage)
                                            <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                        @else
                                        <img src="{{asset('assets/images/sliders')}}/{{$image}}" width="120" />
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
