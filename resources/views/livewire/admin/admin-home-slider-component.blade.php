<div>
    <div class="container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-defualt">
                    <div class="panel-heanding">
                        <div class="col-md-6">
                            All Sliders
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addhomeslider')}}" class="btn btn-danger btn-sm pull-right">Add Slider</a>
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
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Price</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Date & Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->id}}</td>
                                        <td><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="120" /></td>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->subtitle}}</td>
                                        <td>{{$slider->price}}</td>
                                        <td>{{$slider->link}}</td>
                                        <td>{{$slider->status == 1 ? 'Active':'Inactive'}}</td>
                                        <td>{{$slider->created_at}}</td>
                                        <td>
                                           <a href="{{route('admin.edithomeslider',['slider_id'=>$slider->id])}}"><i class="fa fa-edit fa-2x text-warning"></i></a>
                                            &nbsp;
                                           <a href="#" wire:click.prevent="deleteSlider({{$slider->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                         <div class="wrap-pagination-info">
                            {{ $sliders->links() }}
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
