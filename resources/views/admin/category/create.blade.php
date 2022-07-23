@extends('layouts.admin');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="cart">
            <div class="card-header">
                <h3>
                    Add Category
                    <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
        </div>
        <div class="cartbody">
            <form action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" />
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Status</label><br />
                        <input type="checkbox" name="status" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary floar-end">Save</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection