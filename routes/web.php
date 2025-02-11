<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;



//Route::get('/books/create', 'BookController@create');

Route::get('/', function () {
    return view('book.layout.welcome');
});

Route::get('/books/list', [BookController::class,'index'])->name('books.list');

Route::get('/books/create', [BookController::class,'create'])->name('books.create');    

Route::post('/books/store',[BookController::class,'store'])->name('books.store');

Route::get('/books/edit/{id}',[BookController::class,'edit'])->name('books.edit');

Route::post('/books/update',[BookController::class,'update'])->name('books.update');

Route::delete('/books/delete/{id}',[BookController::class,'delete'])->name('books.delete');

Route::get('/authors/list', [AuthorController::class,'index'])->name('authors.list');

Route::get('/authors/create', [AuthorController::class,'create'])->name('authors.create');    

Route::post('/authors/store',[AuthorController::class,'store'])->name('authors.store');

Route::get('/authors/edit/{id}',[AuthorController::class,'edit'])->name('authors.edit');

Route::post('/authors/update',[AuthorController::class,'update'])->name('authors.update');

Route::delete('/authors/delete/{id}',[AuthorController::class,'delete'])->name('authors.delete');


    
