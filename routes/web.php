<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookWebController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('books')->controller(BookWebController::class)->group(function(){
Route::get('/','index')->name('index');
Route::get('/create','create')->name('create');
Route::post('/','store')->name('store');
Route::get('/{book}/edit','edit')->name('edit');
Route::put('/{book}','update')->name('update');
Route::delete('/{book}','destroy')->name('destroy');

});
Route::get('books/{book}/reviews',function(Book $book){
    $book = $book->load('reviews');
    return view('books.reviews',compact('book'));
})->name('reviews');

