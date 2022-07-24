@extends('layouts.admin');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="cart">
            <div class="card-header">
                <h3>
                    Add Product
                    <a href="{{ url('admin/product/create') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
        </div>
        <div class="cartbody">
            <form action="{{url('admin/product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" />
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" />
                        @error('price') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control" row="3"></textarea>
                        @error('description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" />
                        @error('image') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12">
                        <h4>SEO Tags</h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" />
                        @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Meta Keyword</label>
                        <textarea type="text" name="meta_keyword" class="form-control" row="3"></textarea>
                        @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta Description</label>
                        <textarea type="text" name="meta_description" class="form-control" row="3"></textarea>
                        @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Category</label>
                        <select name="category_id" class="">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
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