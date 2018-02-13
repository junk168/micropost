@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
            @include('favoriote.favorite_button', ['user' => $user])
            @include('user_follow.follow_button', ['user' => $user])
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">Microposts <span class="badge">{{ $count_microposts }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/favorite_posts') ? 'active' : '' }}"><a href="{{ route('users.favorite_posts', ['id' => $user->id]) }}">Favorite <span class="badge">{{ $count_favorite_posts }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/favorite_users') ? 'active' : '' }}"><a href="{{ route('users.favorite_users', ['id' => $user->id]) }}">Favorite Users <span class="badge">{{ $count_favorite_users }}</span></a></li>
            </ul>
            @include('users.users', ['users' => $users])
        </div>
    </div>
@endsection
