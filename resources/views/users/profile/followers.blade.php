@extends('layouts.app')

@section('title', 'Followers')

@section('content')
    @include('users.profile.header')
    <div class="" style="margin-top: 100px;">
        @if ($user->followers->isNotEmpty())
            <div class="row justify-content-center">
                <div class="col-4">
                    <h3 class="text-muted text-center">Followers</h3>

                    @foreach ($user->followers as $follower_user )   {{--follower is an instance of Follow Model--}}
                        <div class="row align-items-center mt-3">
                            <div class="col-auto">
                                <a href="{{route('profile.show', $follower_user->follower->id)}}">
                                    @if ($follower_user->follower->avatar)
                                        <img src="{{$follower_user->follower->avatar}}" alt="{{$follower_user->follower->name}}" class="rounded-circle avatar-sm">
                                    @else
                                        <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                    @endif
                                </a>
                            </div>
                            <div class="col ps-0 text-truncate">
                                <a href="{{route('profile.show', $follower_user->follower->id)}}" class="text-decoration-none text-dark fw-bold">{{$follower_user->follower->name}}</a>
                            </div>
                            <div class="col-auto text-end">
                                @if ($follower_user->follower->id != Auth::user()->id)
                                    @if ($follower_user->follower->isFollowed())
                                        <form action="{{route('follow.destroy', $follower_user->follower->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-secondary btn-sm fw-bold">
                                                Following
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{route('follow.store', $follower_user->follower->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm fw-bold">
                                                Follow
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <h3 class="text-secondary text-center">No Followers</h3>
        @endif
    </div>
@endsection
