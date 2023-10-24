<div>
@include('livewire.admin.category.modal-form')
{{--  --}}
        <div class="container-fluid px-4 mt-5">
            @if (session('message'))
                <div class="alert alert-success"> {{ (session('message'))}} </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="{{ url('admin/category/create') }}" class="btn float-end btn-outline-primary">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped align-middle mb-0 ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Satus</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($category as $item )
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td class="d-flex justify-content-evenly">
                                        <a href="{{ url('admin/category/'.$item->id.'/edit') }}" class="btn btn-success">Edit</a>
                                        <a href="#" wire:click="deleteCategory({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"><span class="p-5 text-center text-danger">No Brand Found</span></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3 float-end">
                        {{-- category variable you give in index livewire-category-index --}}
                        {{ $category->Links() }}
                    </div>

                </div>
            </div>
        </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal' , event => {
            $('#deleteModal').modal('hide');
        } );
    </script>
@endpush
