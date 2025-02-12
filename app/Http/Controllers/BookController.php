<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;  

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('book.list', compact('books'));

    }

    public function create()
    {
        $authors = Author::all();
        return view('book.create', compact('authors'));
    }

    public function edit($id)
    {


        $authors = Author::all();
        $book = Book::find($id);
        return view('book.edit', compact('book') , compact('authors'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|alpha:ascii',
                'description' => 'required',
                'price' => 'required|numeric',
                'image' => 'nullable|mimes:jpeg,jpg,gif,webp',
                'author_id' => 'nullable'
                
            ]
        );

        $book = Book::find($request->id);
        if ($request->has('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $path = 'assets/files/';
            $file->move($path, $filename);
            if (File::exists($book->image)) {
                File::delete($book->image);
            }
        }

        $book->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $path . $filename,
                'author_id' => $request->author_id
            ]
        );

        $books = Book::all();
        return view('book.list', compact('books'));
    }

    public function store(Request $request)
    {


        $request->validate(
            [
                'name' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'nullable|mimes:jpeg,jpg,gif,webp',
                'author_id' => 'nullable'

                
            ]
        );

        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $author_id = $request->author_id;


        if ($request->has('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $path = 'assets/files/';
            $file->move($path, $filename);

        }
        $data = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $path . $filename,
            'author_id' => $author_id
        ];

        
        Book::create($data);
        $books = Book::all();

        return view('book/list', compact('books'));
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        $books = Book::all();
        return view('book.list', compact('books'));
    }


}
