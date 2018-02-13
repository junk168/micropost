@if (Auth::user()->id != $user->id)
    @if (Auth::user()->is_favorite($user->id))
        {!! Form::open(['route' => ['user.un_favorite', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('Delete Favorite', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.add_favorite', $user->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif
