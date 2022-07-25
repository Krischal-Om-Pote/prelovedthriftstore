@extends('layouts.admin');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="cart">
            <div class="card-header">
                <h3>
                    Edit Product
                    <a href="{{ url('admin/product') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
        </div>
        <div class="cartbody">
            <form action="{{ url('admin/product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" />
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Price</label>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control" />
                        @error('price') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-2">
                        <label>Quantity</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control" />
                        @error('quantity') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control" row="3">{{ $product->description }}</textarea>
                        @error('description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" />
                        <img src="{{ asset('/uploads/product/'.$product->image) }}" width="60px" height="60px" />
                        @error('image') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12">
                        <h4>SEO Tags</h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control" />
                        @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Meta Keyword</label>
                        <textarea type="text" name="meta_keyword" class="form-control" row="3">{{ $product->meta_keyword }}</textarea>
                        @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta Description</label>
                        <textarea type="text" name="meta_description" class="form-control" row="3">{{ $product->meta_description }}</textarea>
                        @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Category</label>
                        <select name="category_id" class="">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{($product->category_id == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Status</label><br />
                        <input type="checkbox" name="status" {{ $product->status=='1'?'checked':''}} />
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary floar-end">Update</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection