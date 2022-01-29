<div>
    <div class="container" style="padding:30px 0px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-defualt">
                    <div class="panel-heanding">
                        All Categories
                    </div>
                    <div class="panel-body">
                         <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            <button class="btn btn-warning">edit</button>
                                            <button class="btn btn-danger">remove</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                         <div class="wrap-pagination-info">
                            {{ $categories->links() }}
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
