@extends('layouts.admin');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="cart">
            <div class="card-header">
                <h3>
                    Add User
                    <a href="{{ url('admin/user/create') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
        </div>
        <div class="cartbody">
            <form action="{{url('admin/user')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" />
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" />
                        @error('email') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" />
                        @error('image') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <!-- <div class="col-md-12">
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
                    </div> -->

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary floar-end">Save</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection