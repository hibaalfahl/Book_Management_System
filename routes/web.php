<?php

use App\Http\Controllers\BookWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('books')->controller(BookWebController::class)->group(function(){
Route::get('/','index')->name('index');
Route::get('/create','create')->name('create');
Route::post('/','store')->name('store');
Route::get('/edit/{book}','edit')->name('edit');
Route::put('/{book}','update')->name('update');
Route::delete('/{book}','destroy')->name('destroy');

});