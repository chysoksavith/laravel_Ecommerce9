@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4 mt-5">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Edit Slider</h4>
                <a href="{{ url('admin/slider') }}" class="btn btn-outline-success">Back</a>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/slider/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <div class=" mt-3 ">
                            <img src="{{ asset("$slider->image") }}" width="100px" height="100px" alt="">
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label>Status</label>
                        <input type="checkbox" name="status" class="m-2 form-check-input"
                            {{ $slider->status == '1' ? 'checked' : '' }}> <small
                            class="text-danger">Checked=Hidden,UnCheck=Visible</small>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
