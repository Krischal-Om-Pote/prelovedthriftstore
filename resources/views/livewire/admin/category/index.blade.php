<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="cart">
            <div class="card-header">
                <h3>
                    Category
                    <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
                </h3>
            </div>
        </div>
        <div class="cartbody">
            <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->status=='1'?'Visible':'Hidden'}}</td>
                        <td>
                            <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-success">Edit</a>
                            <button class="btn btn-danger deleteData" data-bs-toggle="modal" data-bs-target="#dModal" data-id="{{$category->id}}">Delete</button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$categories->links()}}
            </div>
        </div>
    </div>
</div>
@section('modal')
<!-- Modal -->
<div class="modal fade" id="dModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/category/delete')}}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" id="categoryID">
                    <h5>Do you want to delete?</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.deleteData').click(function() {
            let deleteID = $(this).data("id");
            // console.log(deleteID);
            $('#categoryID').val(deleteID);
        });

        $('#table-datatable').DataTable();
    });
</script>
@endsection