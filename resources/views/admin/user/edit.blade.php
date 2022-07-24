@extends('layouts.admin');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="cart">
            <div class="card-header">
                <h3>
                    Edit User
                    <a href="{{ url('admin/user') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
        </div>
        <div class="cartbody">
            <form action="{{ url('admin/user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Email</label>
                        <input type="text" name="email" value="{{ $user->email}}" class="form-control" />
                        @error('email') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" />
                        <img src="{{ asset('/uploads/user/'.$user->image) }}" width="60px" height="60px" />
                        @error('image') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <!-- <div class="col-md-12">
                        <h4>SEO Tags</h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $user->meta_title }}" class="form-control" />
                        @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Meta Keyword</label>
                        <textarea type="text" name="meta_keyword" class="form-control" row="3">{{ $user->meta_keyword }}</textarea>
                        @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta Description</label>
                        <textarea type="text" name="meta_description" class="form-control" row="3">{{ $user->meta_description }}</textarea>
                        @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Category</label>
                        <select name="category_id" class="">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{($user->category_id == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Status</label><br />
                        <input type="checkbox" name="status" {{ $user->status=='1'?'checked':''}} />
                    </div> -->
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary floar-end">Update</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection