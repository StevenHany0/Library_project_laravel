<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;



//Route::get('/books/create', 'BookController@create');

Route::get('/', [BookController::class,'create']);    //home page for create

Route::post('/books/store',[BookController::class,'store']);

    
