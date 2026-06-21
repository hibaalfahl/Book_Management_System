<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::query()->get();
        return $books;
    }
    public function store(StoreBookRequest $request){
        $book = Book::query()->create($request->validated());
        return $book;
    }
    public function update(UpdateBookRequest $request,Book $book){
        $book->update($request->validated());
        return $book;
    }
    public function show(Book $book){
        return $book;
    }
    public function destroy(Book $book){
        $book -> delete();
    }
}
