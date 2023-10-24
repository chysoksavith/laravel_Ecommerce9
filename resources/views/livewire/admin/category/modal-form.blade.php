
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="desctroyCategory">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete it?</h6>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
