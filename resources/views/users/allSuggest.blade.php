@extends('layouts.app')

@section('title', 'All Suggestion')

@section('content')
    @foreach ($suggested_users as $user )
    <div class="row align-items-center mb-3 w-50 mx-auto">
        <div class="col-auto">
            <a href="{{route('profile.show', $user->id)}}">
                @if ($user->avatar)
                    <img src="{{$user->avatar}}" alt="{{$user->name}}" class="rounded-circle avatar-sm">
                @else
                    <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                @endif
            </a>
        </div>
        <div class="col ps-0 text-truncate">
            <a href="{{route('profile.show', $user->id)}}" class="text-decoration-none text-dark fw-bold">{{$user->name}}</a>
            <p class="text-muted mb-0">{{$user->email}}</p>
        </div>
        <div class="col-auto">
            <form action="{{route('follow.store', $user->id)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
            </form>
        </div>
    </div>
    @endforeach
@endsection