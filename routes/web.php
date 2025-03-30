<?php
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;




//Route::get('/books/create', 'BookController@create');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(Auth::class)->group(function () {
    //routes for books
    Route::controller(BookController::class)->group(function () {
        Route::get('/books/list', 'index')->name('books.list');

        Route::get('/books/create', 'create')->name('books.create');

        Route::post('/books/store', 'store')->name('books.store');

        Route::get('/books/edit/{id}', 'edit')->name('books.edit');

        Route::post('/books/update', 'update')->name('books.update');

        Route::delete('/books/delete/{id}', 'destroy')->name('books.delete');
    });



    //routes for authors
    Route::controller(AuthorController::class)->group(function () {
        Route::get('/authors/list', 'index')->name('authors.list');

        Route::get('/authors/create', 'create')->name('authors.create');

        Route::post('/authors/store', 'store')->name('authors.store');

        Route::get('/authors/edit/{id}', 'edit')->name('authors.edit');

        Route::post('/authors/update', 'update')->name('authors.update');

        Route::delete('/authors/delete/{id}', 'destroy')->name('authors.delete');
    });



    //routes for students
    Route::controller(StudentController::class)->group(function () {
        Route::get('/students/list', 'index')->name('students.list');

        Route::get('/students/create', 'create')->name('students.create');

        Route::post('/students/store', 'store')->name('students.store');

        Route::get('/students/edit/{id}', 'edit')->name('students.edit');

        Route::post('/students/update', 'update')->name('students.update');

        Route::delete('/students/delete/{id}', 'destroy')->name('students.delete');

    });


    //routes for categories 
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories/list', 'index')->name('categories.list');

        Route::get('/categories/create', 'create')->name('categories.create');

        Route::post('/categories/store', 'store')->name('categories.store');

        Route::get('/categories/edit/{id}', 'edit')->name('categories.edit');

        Route::post('/categories/update', 'update')->name('categories.update');

        Route::delete('/categories/delete/{id}', 'destroy')->name('categories.delete');

        
    });

    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

});

//routes for auth
Route::get('/auth/register', [AuthController::class, 'signup'])->name('auth.signup');

Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/auth/login', [AuthController::class, 'signin'])->name('auth.signin');

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');