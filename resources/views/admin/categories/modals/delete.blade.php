<div class="modal fade" id="delelte-category-{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-trash-can text-danger"></i> Delelte Category
                </h3>
            </div>

        <div class="modal-body">
            Are you sure you want to delete <span class="fw-bold">{{$category->name}}</span> category?
           <br calss="mb-3">
           This action will affect the posts under this catgory. Posts without a category will fall under Uncategorized 
        </div>
            <div class="modal-footer border-0">
                <form action="{{route('admin.categories.destroy', $category->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>