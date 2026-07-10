@extends('layouts.app')
@section('content')
<form action="{{ route('update',$book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Title</label>
    <x-input type="text" name="title" id="title" value="{{ $book->title }}"/>
    @error('title')
        {{ $message }}
    @enderror
    <label for="author">Author</label>
    <x-input type="text" name="author" id="author" value="{{ $book->author }}"/>
    @error('author')
        {{ $message }}
    @enderror
    <label for="published_year">Published Year</label>
    <x-input type="number" name="published_year" id="published_year" value="{{ $book->published_year }}"/>
    @error('published_year')
        {{ $message }}
    @enderror
    <label for="is_available">Available:</label>
    <input type="hidden" name="is_available" value="0"/>
    <input type="checkbox" name="is_available" id="is_available" value="1" {{ $book->is_available ? 'checked' : '' }}/> 
    @error('is_available')
        {{ $message }}
    @enderror
    <label for="cover_color">Cover Color</label>
    <input type="text" name="cover_color" id="cover_color" value="{{ $book->cover->color }}">
    @error('cover_color')
    {{ $message }}
    @enderror
    <label for="cover_format">Cover Format</label>
    <select name="cover_format" id="cover_format">
        <option value="">Select Format</option>
        <option value="hardcover" {{ ($book->cover->format ?? '' ) == 'hardcover' ? 'selected' : ''}}>HardCover</option>
        <option value="paperback" {{ ($book->cover->format ?? '') == 'paperback' ? 'selected' : ''}}>Paperback</option>
        <option value="ebook" {{ ($book->cover->format ?? '') == 'ebook' ? 'selected' : '' }}>EBook</option>
    </select>
    @error('cover_format')
    {{ $message }}
    @enderror
    <label for="categories">Categories</label>
    <select name="categories[]" id="categories" multiple>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $book->categories->contains($category->id) ? 'selected' : '' }} >{{ $category->name }}</option>
        @endforeach
    </select>
    @error('categories')
        {{ $message }}
    @enderror
    <x-button type="submit">Update</x-button>
</form>
@endsection