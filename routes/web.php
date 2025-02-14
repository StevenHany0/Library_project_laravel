<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;



//Route::get('/books/create', 'BookController@create');

Route::get('/', function () {
    return view('welcome');
});

//routes for books
Route::get('/books/list', [BookController::class,'index'])->name('books.list');

Route::get('/books/create', [BookController::class,'create'])->name('books.create');    

Route::post('/books/store',[BookController::class,'store'])->name('books.store');

Route::get('/books/edit/{id}',[BookController::class,'edit'])->name('books.edit');

Route::post('/books/update',[BookController::class,'update'])->name('books.update');

Route::delete('/books/delete/{id}',[BookController::class,'delete'])->name('books.delete');


//routes for authors
Route::get('/authors/list', [AuthorController::class,'index'])->name('authors.list');

Route::get('/authors/create', [AuthorController::class,'create'])->name('authors.create');    

Route::post('/authors/store',[AuthorController::class,'store'])->name('authors.store');

Route::get('/authors/edit/{id}',[AuthorController::class,'edit'])->name('authors.edit');

Route::post('/authors/update',[AuthorController::class,'update'])->name('authors.update');

Route::delete('/authors/delete/{id}',[AuthorController::class,'delete'])->name('authors.delete');


//routes for students
Route::get('/students/list', [StudentController::class,'index'])->name('students.list');

Route::get('/students/create', [StudentController::class,'create'])->name('students.create');    

Route::post('/students/store',[StudentController::class,'store'])->name('students.store');

Route::get('/students/edit/{id}',[StudentController::class,'edit'])->name('students.edit');

Route::post('/students/update',[StudentController::class,'update'])->name('students.update');

Route::delete('/students/delete/{id}',[StudentController::class,'delete'])->name('students.delete');


//routes for categories    
Route::get('/categories/list', [CategoryController::class,'index'])->name('categories.list');

Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');    

Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');

Route::get('/categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');

Route::post('/categories/update',[CategoryController::class,'update'])->name('categories.update');

Route::delete('/categories/delete/{id}',[CategoryController::class,'delete'])->name('categories.delete');

