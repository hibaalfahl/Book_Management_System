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
    <br>
    @error('is_available')
        {{ $message }}
    @enderror
    <label for="cover_color">Cover Color</label>
    <x-input type="text" name="cover_color" id="cover_color"/>
    @error('cover_color')
    {{ $message }}
    @enderror
    <label for="cover_format">Cover Format</label>
    <select name="cover_format" id="cover_format">
        <option value="">Select Format</option>
        <option value="hardcover" {{ old('format') == 'hardcover' ? 'selected' : '' }}>HardCover</option>
        <option value="paperback"{{ old('format')== 'paperback' ? 'selected' : '' }}>Paperback</option>
        <option value="ebook"{{ old('format')== 'ebook' ? 'selected' : '' }}>EBook</option>
    </select>
    @error('cover_format')
    {{ $message }}
    @enderror
    <br>
    <label for="categories"> Categories </label>
    <select name="categories[]" id="categories" multiple>
    @foreach ($categories as $category )
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
    </select>
    @error('categories')
        {{ $message }}
    @enderror
    <x-button type="submit">Submit</x-button>
</form>
@endsection

