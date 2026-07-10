@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4 text-center">
        Reviews for {{ $book->title }}
    </h1>

    @forelse ($book->reviews as $review)
        <div class="card shadow-sm mb-3">
            <div class="card-body">

                <h5 class="card-title mb-2">
                    Reviewer: {{ $review->reviewer_name }}
                </h5>

                <p class="card-text mb-2">
                    <strong>Rating:</strong>
                    <span class="badge bg-warning text-dark">
                        {{ $review->rating }}/10
                    </span>
                </p>

                <p class="card-text">
                    <strong>Comment:</strong>
                    {{ $review->comment }}
                </p>

            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">
            No reviews yet for this book.
        </div>
    @endforelse

</div>
@endsection