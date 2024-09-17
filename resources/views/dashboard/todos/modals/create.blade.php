<!-- Modal -->
<div class="modal fade" id="create_todo" tabindex="-1" aria-labelledby="create_todo_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="create_todo_label">Add New Todo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('todos.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-3">
                        <label for="title">Title <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="description">Description <small class="text-dark">(optional)</small></label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label for="image">Upload Attachment <small class="text-dark">(optional)</small></label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
                    </div>
                    <div class="form-group my-3">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
