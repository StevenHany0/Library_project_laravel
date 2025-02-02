<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {

        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $author=$request->author;

        $data = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'author'=>$author 
        ];

        Book::create($data);

        return view('book.success');
    }


}
