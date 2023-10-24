    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="AddBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="storeBrand()">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label> Select Category</label>
                            <select wire:model.defer="category_id" required class="form-control">
                                <option value="">select category</option>
                                @foreach ($categories as $cateItem)
                                    <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label> Brand Name </label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label> Brand Slug </label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label> Brand Status </label>
                            <input type="checkbox" wire:model.defer="status"> checked=Hidden, Un checked=Visible
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Brand update Modal -->
    <div wire:ignore.self class="modal fade" id="UpdateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div wire:loading class="p-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>Loading...
                </div>
                <div wire:loading.remove>
                    <form wire:submit.prevent="updateBrand">

                        <div class="modal-body">
                            <div class="mb-3">
                                <label> Select Category</label>
                                <select wire:model.defer="category_id" required class="form-control">
                                    <option value="">select category</option>
                                    @foreach ($categories as $cateItem)
                                        <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label> Brand Name </label>
                                <input type="text" wire:model.defer="name" class="form-control">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label> Brand Slug </label>
                                <input type="text" wire:model.defer="slug" class="form-control">
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label class="text-primary"> Brand Status </label>
                                <input type="checkbox" class="m-3" wire:model.defer="status"
                                    style="width:20px;height:20px;"> <small class="text-danger">checked=Hidden, Un
                                    checked=Visible</small>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--Brand Delete Modal -->
    <div wire:ignore.self class="modal fade" id="DeleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div wire:loading class="p-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>Loading...
                </div>
                <div wire:loading.remove>
                    <form wire:submit.prevent="destroyBrand">

                        <div class="modal-body">

                            <h4>Are you sure you want to Delete?</h4>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
