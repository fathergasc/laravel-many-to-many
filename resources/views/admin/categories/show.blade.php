@extends('layouts.app')


@section('content')
<div class="container">
    <h3>Name: {{$category->name}}</h3>
    <h3>Slug: {{$category->slug}}</h3>


    <a class="btn btn-primary" href="{{route('admin.categories.index')}}">Back to categories list</a>
</div>

@endsection
