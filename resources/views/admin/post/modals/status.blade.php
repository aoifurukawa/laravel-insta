@if ($post->trashed())
    {{--visible--}}
<div class="modal fade" id="visible-post-{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-primary">
            <div class="modal-header border-primary">
                <h3 class="h5 modal-title text-primary">
                    <i class="fa-solid fa-eye"></i> Unhide Post
                </h3>
            </div>

        <div class="modal-body">
            Are you sure you want to unhide this post?
            <img src="{{$post->image}}" alt="{{$post->image}}" class="image-lg d-block avatar-md">
                <p>{{$post->description}}</p>
        </div>
            <div class="modal-footer border-0">
                <form action="{{route('admin.post.visible', $post->id)}}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Activate</button>
                </form>
            </div>
        </div>
    </div>
</div>
@else
    {{--hide--}}
    <div class="modal fade" id="hide-post-{{$post->id}}">
        <div class="modal-dialog">
            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h3 class="h5 modal-title text-danger">
                        <i class="fa-solid fa-eye-slash"></i> Hide Post
                    </h3>
                </div>

            <div class="modal-body">
                Are you sure you want to hide this post?
                <img src="{{$post->image}}" alt="{{$post->image}}" class="image-lg d-block avatar-md">
                <p>{{$post->description}}</p>
            </div>
                <div class="modal-footer border-0">
                    <form action="{{route('admin.post.hide', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-sm">Hide</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
