@extends('layouts.app')

@section('title', 'Admin: Users')

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-primary text-secondary">
            <tr>
                <th></th>
                <th></th>
                <th>CATEGORY</th>
                <th>OWNER</th>
                <th>CREATED AT</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_posts as $post )
                <tr>
                    <td>
                        {{$post->id}}
                    </td>
                    <td>
                        <a href="{{route('post.show', $post->id)}}">
                            <img src="{{$post->image}}" alt="{{$post->image}}" class="image-lg d-block mx-auto avatar-md">
                        </a>
                    </td>
                    <td>
                        @foreach ($post->categoryPost as $category_post)
                                <div class="badge bg-secondary bg-opacity-50">
                                    {{$category_post->category->name}}
                                </div>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('profile.show', $post->user->id)}}" class="text-decoration-none text-dark fw-bold">{{$post->user->name}}</a>
                    </td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        @if ($post->trashed())
                            <i class="fa-solid fa-circle text-secondary"></i> Hidden
                        @else
                            <i class="fa-solid fa-circle text-primary"></i>  Visible
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>

                            <div class="dropdown-menu">
                                @if ($post->trashed())
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#visible-post-{{$post->id}}">
                                        <i class="fa-solid fa-eye"></i> Unhide Post {{$post->id}}
                                    </button>
                                @else
                                    <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-post-{{$post->id}}">
                                        <i class="fa-solid fa-eye-slash"></i> Hide Post {{$post->id}}
                                    </button>
                                @endif
                            </div>
                        </div>

                        @include('admin.post.modals.status')
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    {{$all_posts->links()}}
@endsection