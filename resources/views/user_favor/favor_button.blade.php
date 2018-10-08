    @if (Auth::user()->is_favoring($micropost->id))
        {!! Form::open(['route' => ['user.unfavor', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('お気に入り削除', ['class' => "btn btn btn-success btn-xs"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favor', $micropost->id]]) !!}
            {!! Form::submit('お気に入り登録', ['class' => "btn btn-default btn-xs"]) !!}
        {!! Form::close() !!}
    @endif
