<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;



//Route::get('/books/create', 'BookController@create');

Route::get('/', function () {
    return view('book.layout.welcome');
});

Route::get('/books/list', [BookController::class,'index'])->name('list');

Route::get('/books/create', [BookController::class,'create'])->name('create');    

Route::post('/books/store',[BookController::class,'store'])->name('store');

    
