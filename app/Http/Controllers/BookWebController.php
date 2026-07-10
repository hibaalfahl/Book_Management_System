<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookWebController extends Controller
{
    public function index(){
        $books = Book::with('cover')->get();
        return view('books.index',compact('books'));
    }
    public function create(){
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }
    public function store(StoreBookRequest $request){
        $validated = $request->validated();
        $book = Book::create([
            'title'=>$validated['title'],
            'author'=>$validated['author'],
            'published_year'=>$validated['published_year'],
            'is_available'=>$validated['is_available']
        ]);
        $book->cover()->create([
            'color'=>$validated['cover_color'],
            'format'=>$validated['cover_format']
        ]);
        $book->categories()->attach($request->categories ?? []);
        return redirect()->route('index');
    }
    public function edit(Book $book){
        $book->load('cover','categories');
        $categories = Category::all();
        return view('books.edit',compact('book','categories'));
    }
    public function update(UpdateBookRequest $request, Book $book)
{
    $validated = $request->validated();

    $book->update([
        'title' => $validated['title'],
        'author' => $validated['author'],
        'published_year' => $validated['published_year'],
        'is_available' => $validated['is_available'],
    ]);

    $book->cover()->updateOrCreate(
        ['book_id' => $book->id],
        [
            'color' => $validated['cover_color'],
            'format' => $validated['cover_format'],
        ]
    );
    $book->categories()->sync($request->categories ?? []);
    return redirect()->route('index');
}
    
    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('index');
    }

}
