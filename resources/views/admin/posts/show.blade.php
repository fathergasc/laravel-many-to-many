@extends('layouts.app')


@section('content')
<div class="container">
    <h3>Title: {{$post->title}}</h3>
    <h3>Category: {{($post->category)?$post->category->name:'No category'}}</h3>
    <div>
        <h3 class="d-inline">Tags: </h3>
        @foreach ($post->tags as $tag)
            {{$tag->name}};
        @endforeach
    </div>
    <p>Content: {{$post->content}}</p>
    <h5>Slug: {{$post->slug}}</h5>


    <a class="btn btn-primary" href="{{route('admin.posts.index')}}">Back to posts list</a>
</div>

@endsection
