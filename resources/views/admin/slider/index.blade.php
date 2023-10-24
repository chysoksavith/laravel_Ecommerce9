@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4 mt-5">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Slider List</h4>
                <a href="{{ url('admin/slider/create') }}" class="btn btn-outline-success">Add Slider</a>
            </div>

            <div class="card-body">
                <table class="table table-hover table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($slider as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td><img src="{{ asset("$item->image") }}" width="100px" height="100px" alt=""></td>
                                <td>{{ $item->status == '0' ? 'visible' : 'Hidden' }}</td>
                                <td class="d-flex justify-content-evenly  align-items-center">
                                    <a href="{{ url('admin/slider/' . $item->id . '/edit') }}"
                                        class=" btn btn-success">Edit</a>
                                    <a href="{{ url('admin/slider/'.$item->id.'/delete') }}" class=" btn btn-danger" onclick="return confirm('Are you sure You want to delete slider?')">Delete</a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"><span class="p-5 text-center text-danger">No Slider Added</span></td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="float-end mt-3">
                    {{ $slider->Links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
