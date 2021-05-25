@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <div>
        {!!$post->body!!}
    <hr>

    <h4>Display Comments</h4>
    @foreach($post->comments as $comment)
        <div class="display-comment">
            <strong>{{ $comment->user->name }}</strong>
            <p>{{ $comment->body }}</p>
        </div>
    @endforeach

    <hr>

    <h4>Add comment</h4>
    <form method="post" action="{{ route('comment.add') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="comment_body" class="form-control" />
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="Add Comment" />
        </div>
    </form>

    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    <a href="/posts" class="btn btn-outline-secondary">Go Back</a>
    @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
    <a href="/posts/{{$post->id}}/edit" button type="button" class="btn btn-secondary">Edit</a>

    {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
    @endif
@endsection