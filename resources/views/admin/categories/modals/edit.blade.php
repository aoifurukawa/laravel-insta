<div class="modal fade" id="edit-category-{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-warning">
            <div class="modal-header border-warning">
                <h3 class="h5 modal-title text-warning">
                    <i class="fa-solid fa-pen-to-square"></i> Edit Category
                </h3>
            </div>

            <div class="modal-body">
                <form action="{{route('admin.categories.edit', $category->id)}}" method="post">
                    <input type="text" name="name" id="category" class="form-control" value="{{old('name', $category->name)}}">
                    <div class="modal-footer border-0">
                        @csrf
                        @method('PATCH')
                        
                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning btn-sm">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>