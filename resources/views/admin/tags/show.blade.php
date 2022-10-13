@extends('layouts.app')


@section('content')
<div class="container">
    <h3>Name: {{$tag->name}}</h3>
    <h3>Slug: {{$tag->slug}}</h3>


    <h4>Related posts:</h4>
    @if (count($tag->posts))
    <div>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tag->posts as $post)
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->slug}}</td>
            <td><a class="btn btn-warning m-1" href="{{route('admin.posts.show', ['post' => $post->id])}}">Go to post</a></td>
            @endforeach
        </tbody>
    </table>
    @endif

    <a class="btn btn-primary" href="{{route('admin.categories.index')}}">Back to categories list</a>
</div>

@endsection
