@extends('layouts.app')
@section('content')
<table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Published Year</th>
      <th scope="col">Is Available </th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($books as $book)
      <tr>
      <th scope="row">{{ $book->id }}</th>
      <td>{{ $book->title }}</td>
      <td>{{ $book->author }}</td>
      <td>{{ $book->published_year }}</td>
      <td>
        @if ($book->is_available)
        Available
        @else
        Not Available  
      @endif
    </td>
    <td><x-button type="submit"><a href="{{ route('edit',$book->id) }}">Edit</a></x-button> <br><br>
    <form action="{{ route('destroy',$book->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <x-button type="submit">Delete</x-button>
    </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
<x-button type="submit"> <a href="{{ route('create') }}">Create New Book</a></x-button>
@endsection