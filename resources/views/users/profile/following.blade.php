@extends('layouts.app')

@section('title', 'Following')

@section('content')
    @include('users.profile.header')
    <div class="" style="margin-top: 100px;">
        @if ($user->following->isNotEmpty())
            <div class="row justify-content-center">
                <div class="col-4">
                    <h3 class="text-muted text-center">Following</h3>

                    @foreach ($user->following as $following_user )   {{--follower is an instance of Follow Model--}}
                        <div class="row align-items-center mt-3">
                            <div class="col-auto">
                                <a href="{{route('profile.show', $following_user->following->id)}}">
                                    @if ($following_user->following->avatar)
                                        <img src="{{$following_user->following->avatar}}" alt="{{$following_user->following->name}}" class="rounded-circle avatar-sm">
                                    @else
                                        <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                    @endif
                                </a>
                            </div>
                            <div class="col ps-0 text-truncate">
                                <a href="{{route('profile.show', $following_user->following->id)}}" class="text-decoration-none text-dark fw-bold">{{$following_user->following->name}}</a>
                            </div>
                            <div class="col-auto text-end">
                                @if ($following_user->following->id != Auth::user()->id)
                                    @if ($following_user->following->isFollowed())
                                        <form action="{{route('follow.destroy', $following_user->following->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-secondary btn-sm fw-bold">
                                                Following
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{route('follow.store', $following_user->following->id)}}" method="post">
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
            <h3 class="text-secondary text-center">No Following</h3>
        @endif
    </div>
@endsection
