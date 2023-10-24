<div>
    @include('livewire.admin.brand.modal-form')

    <div class="container-fluid px-5 mt-5">
        @if (session('message'))
            <div class="alert alert-success"> {{ session('message') }} </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Brands List</h4>
                <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddBrandModal">Add
                    Brands</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brand as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if ($item->category)
                                        {{ $item->category->name }}
                                    @else
                                        No category
                                    @endif
                                </td>
                                <td>{{ $item->status == '1' ? 'hidden' : 'visible' }}</td>
                                <td class="d-flex justify-content-evenly">
                                    <a href="#" wire:click="editBrand({{ $item->id }})"
                                        class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#UpdateBrandModal">Edit</a>
                                    <a href="#" wire:click="deleteBrand({{ $item->id }})"
                                        class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#DeleteBrandModal">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Brand Found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="mt-3 float-end">
                    {{-- brand variable you give in index livewire-category-index --}}
                    {{ $brand->Links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#AddBrandModal').modal('hide');
            $('#UpdateBrandModal').modal('hide');
            $('#DeleteBrandModal').modal('hide');

        });
    </script>
@endpush
