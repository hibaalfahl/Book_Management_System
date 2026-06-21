@extends('layouts.app')
@section('content')
<form action="{{ route('store') }}" method="POST">
    @csrf
    <label for="title">Title</label>
    <x-input type="text" name="title" id="title"/>
    @error('title')
        {{ $message }}
    @enderror
    <label for="author">Author</label>
    <x-input type="text" name="author" id="author"/>
    @error('author')
        {{ $message }}
    @enderror
    <label for="published_year">Published Year</label>
    <x-input type="number" name="published_year" id="published_year"/>
    @error('published_year')
        {{ $message }}
    @enderror
    <label for="is_available">Available:</label>
    <input type="hidden" name="is_available" value="0" />
    <input type="checkbox" name="is_available" id="is_available" value="1"/>
    @error('is_available')
        {{ $message }}
    @enderror
    <x-button type="submit">Submit</x-button>
</form>
@endsection

