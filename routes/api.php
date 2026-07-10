<?php

use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('books',BookController::class);
Route::post('books/{book}/reviews',function(Book $book, Request $request){
    $book->reviews()->create([
    'reviewer_name'=>$request->reviewer_name,
    'rating'=>$request->rating,
    'comment'=>$request->comment
    ]);
});