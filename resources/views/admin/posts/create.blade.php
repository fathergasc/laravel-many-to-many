@extends('layouts.app')

@section('content')

<div class="container">
    @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{route('admin.posts.store')}}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                <option {{(old('category_id') == '')? 'selected':''}}  value="">No category</option>
                @foreach ($categories as $category)
                    <option {{(old('category_id') == $category->id)? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>

            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <span class="form-check-label">Tags</span>

        <div class="card p-2 my-2">
            @foreach ($tags as $tag)
            <div class="form-group form-check">

                <input {{(in_array($tag->id, old('tags', [])))? 'checked':''}} name="tags[]" type="checkbox" class="form-check-input" id="tag_{{$tag->id}}" value="{{$tag->id}}">
                <label class="form-check-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
            </div>
            @endforeach

        </div>@error('tags')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">

            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{old('content')}}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
