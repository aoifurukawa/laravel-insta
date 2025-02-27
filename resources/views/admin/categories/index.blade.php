@extends('layouts.app')

@section('title', 'Admin: Categories')

@section('content')
    <form action="{{route('admin.categories.add')}}" class="d-flex mb-3" method="POST" >
        @csrf
        <input type="text" name="name" id="" class="form-control w-25" placeholder="Add a category">
        <button type="submit" class="btn btn-primary btn-outline-white ms-3">
            <i class="fa-solid fa-plus"></i> Add
        </button>
    </form>

    <table class="table table-hover align-middle bg-white border text-secondary w-50">
        <thead class="small table-warning text-secondary">
            <tr>
                <th>#</th>
                <th>NAME</th>
                <th>COUNT</th>
                <th>LAST UPDATE</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><span class="fw-bold">{{$category->name}}</span></td>
                    <td>{{$category->categoryPost->count()}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-category-{{$category->id}}">
                            <i class="fa-solid fa-pen text-warning"></i>
                        </button>
                        @include('admin.categories.modals.edit')
                    </td>
                    <td>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delelte-category-{{$category->id}}">
                            <i class="fa-solid fa-trash-can text-danger"></i>
                        </button>
                        @include('admin.categories.modals.delete')
                    </td>
                </tr>
            @endforeach      
                <tr>
                    <td colspan="2"><span class="fw-bold">Uncategorized</span></td>
                    <td>{{$uncategorized_count}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>     
        </tbody>
    </table>
@endsection