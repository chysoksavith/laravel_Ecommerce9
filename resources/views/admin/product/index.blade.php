@extends('layouts.admin')
@section('content')
@include('admin.product.modal')
<div class="container-fluid px-4 mt-5">
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Product List</h4>
            <a href="{{url('admin/product/create')}}" class="btn btn-outline-success">Add Product</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product as  $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                @if ( $item->category)
                                    {{ $item->category->name }}
                                @else
                                No Category
                                @endif

                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->selling_price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->status == '1' ? 'Hidden': 'Visible' }}</td>
                            <td class="d-flex justify-content-evenly">
                                <a href="{{ url('admin/product/' .$item->id.'/edit' ) }}" class="btn btn-success">Edit</a>
                                <a href="{{ url('admin/product/'.$item->id.'/delete') }}" onclick="return confirm('Are you sure You want to delete?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No Products Avilable</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            <div class="mt-3 float-end">
                {{-- brand variable you give in index livewire-category-index --}}
                {{ $product->Links() }}
            </div>
        </div>
    </div>
</div>

@endsection
