@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            @if (count($users->favorite_posts) > 0)
                @include('microposts.microposts', ['microposts' => $users->favorite_posts])
            @endif
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">Microposts <span class="badge">{{ $count_microposts }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/favorite_posts') ? 'active' : '' }}"><a href="{{ route('users.favorite_posts', ['id' => $user->id]) }}">Favorite <span class="badge">{{ $count_favorite_posts }}</span></a></li>
            </ul>
            @include('users.users', ['users' => $users])
        </div>
    </div>
@endsection
