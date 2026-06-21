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
    <x-button type="submit">Update</x-button>
</form>
@endsection