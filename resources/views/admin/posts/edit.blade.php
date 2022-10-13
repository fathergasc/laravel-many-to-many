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


        <form action="{{ route('admin.posts.update', ['post' => $post]) }}" method="POST">

            @csrf

            @method('PUT')

            <a class="btn btn-primary mb-3" href="{{ route('admin.posts.index') }}">Back to posts list</a>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                    <option {{ old('category_id') == '' ? 'selected' : '' }} value="">No category</option>
                    @foreach ($categories as $category)
                        <option {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->name }}</option>
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
                        @if ($errors->any())
                            <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} name="tags[]" type="checkbox"
                                class="form-check-input" id="tag_{{ $tag->id }}" value="{{ $tag->id }}">
                        @else
                            <input {{ $post->tags->contains($tag) ? 'checked' : '' }} name="tags[]" type="checkbox"
                                class="form-check-input" id="tag_{{ $tag->id }}" value="{{ $tag->id }}">
                        @endif
                        <label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                @endforeach

            </div>
            @error('tags')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title', $post->title) }}">

                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" cols="30" rows="10"
                    class="form-control @error('content') is-invalid @enderror">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug', $post->slug)}}">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>
@endsection
