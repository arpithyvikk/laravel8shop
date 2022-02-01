<div>
    <div class="container">
        <div class="row">
            <div class="panel panel-defualt">
                <div class="panel-heading">
                    Manage Home Category
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Choose Categories </label>
                            <div class="col-md-4" wire:ignore>
                                <select class="sel_categories form-control" wire.model="selected_categories" name="categories[]" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{ in_array($category->id, $selected_categories) ? 'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">No of products</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" wire:model="numberofproducts"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-warning" value="Submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.sel_categories').select2();
            $('.sel_categories').on('change', function(e){
                var data = $('.sel_categories').select2('val');
                @this.set('selected_categories',data);
            });
        });
    </script>
@endpush