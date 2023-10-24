@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 mt-5">
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Edit Colors</h4>
            <a href="{{url('admin/colors')}}" class="btn btn-outline-success">Back</a>
        </div>

        <div class="card-body">
           <form action="{{url('admin/colors/'.$color->id)}}" method="POST">

            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Color Name</label>
                <input type="text" name="name" value="{{$color->name}}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Color Code</label>
                <input type="text" name="code"  value="{{$color->code}}" class="form-control">
            </div>
            <div class="mb-3 d-flex align-items-center">
                <label>Color Name</label>
                <input type="checkbox" name="status" {{$color->status ? 'checked':'' }} class="m-2 form-check-input" > <small class="text-danger">Checked=Hidden,UnCheck=Visible</small>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
           </form>
        </div>
    </div>
</div>
@endsection
