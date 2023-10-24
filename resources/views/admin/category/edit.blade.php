@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4 mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Update Category
                    <a href="{{ url('admin/category') }}" class="btn float-end btn-outline-primary">Back Category</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category/'.$category->id) }}" enctype="multipart/form-data" method="POST">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
                            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>description</label>
                            <textarea name="description" class="form-control"  rows="3">{{ $category->description }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('/uploads/category/'.$category->image ) }}" width="100px" height="100px" class="mt-3" alt="">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                        </div>

                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>meta_title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}">
                            @error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>meta_keyword</label>
                            <input type="text" name="meta_keyword" class="form-control" value="{{ $category->meta_keyword }}">
                            @error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>meta_description</label>
                            <textarea name="meta_description" class="form-control"  rows="3">{{ $category->meta_description }}</textarea>
                            @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>

                        </div>
                    </form>
            </div>

            </div>
        </div>

@endsection
