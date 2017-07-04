
    <h1>{{ $user->name }}'s Profile</h1>
    <p>{{ $user->email }}</p>

    <p>
        <strong>Address: </strong> {{$user->address->country}}
    </p>

    <p>
        <strong>Roles: </strong>
        <ul>
        @foreach($user->roles as $role)
            <li>{{$role->role}}</li>
        @endforeach
        </ul>
    </p>

    <p>
        <strong>Comments about User: </strong>

        @foreach($user->comments as $comment)
            <p>{{$comment->body}}</p>
        @endforeach

    </p>


    <h3>{{ $user->articles[0]->title }}</h3>
    <p>{{ $user->articles[0]->body  }}</p>

    <h3>Articles</h3>
    <hr/>

    @foreach( $user->articles as $article )
        <h3>{{ $article->title }}</h3>
        <p>{{ $article->body  }}</p>
        <br /><br />
    @endforeach
