@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 mt-5">
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Colors List</h4>
            <a href="{{url('admin/colors/create')}}" class="btn btn-outline-success">Add Color</a>
        </div>

        <div class="card-body">
            <table class="table table-hover table-striped table-bordered align-middle mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($color as $item )
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->status ? 'Hidden': 'Visible' }}</td>
                            <td class="d-flex justify-content-evenly">
                                <a href="{{ url('admin/colors/'.$item->id.'/edit ') }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('admin/colors/'.$item->id.'/delete ') }}"  onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5"><span class="p-5 text-center text-danger">No Color Added</span></td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
            <div class="float-end mt-3">
                {{ $color->Links() }}
            </div>
        </div>
    </div>
</div>
@endsection
