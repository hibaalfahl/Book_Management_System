<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookWebController extends Controller
{
    public function index(){
        $books = Book::query()->get();
        return view('books.index',compact('books'));
    }
    public function create(){
        return view('books.create');
    }
    public function store (StoreBookRequest $request ){
        $book = Book::query()->create($request->validated());
        return redirect()->route('index');
    }
    public function edit(Book $book){
        return view('books.edit',compact('book'));
    }
    public function update(UpdateBookRequest $request, Book $book){
        $book->update($request->validated());
        return redirect()->route('index');
    }
    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('index');
    }

}
