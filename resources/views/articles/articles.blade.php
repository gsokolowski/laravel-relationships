@foreach($articles as $article)

    <h1>{{ $article->title }} <span style="color: red">posted by {{ $article->getPosterName() }}</span> </h1>
    <h1>{{ $article->title }} <span style="color: red">posted by {{ $article->poster->name }}</span> </h1>

    <p>{{ $article->body }}</p>


    <h3>Article Comments: </h3>

    @foreach($article->comments as $comment)
        <p>{{$comment->body}}</p>
    @endforeach

@endforeach


