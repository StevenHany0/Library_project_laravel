<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('book.list', compact('books'));

    }

    public function create()
    {
        return view('book.create');
    }

    public function edit($id)
    {


        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|alpha:ascii',
                'description' => 'required',
                'price' => 'required|numeric',
                'author' => 'required|alpha:ascii',
                'image' => 'nullable|mimes:jpeg,jpg,gif,webp'
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
                'author' => $request->author,
                'image' => $path . $filename,
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
                'author' => 'required|alpha:ascii',
                'image' => 'nullable|mimes:jpeg,jpg,gif,webp'
            ]
        );

        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $author = $request->author;

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
            'author' => $author,
            'image' => $path . $filename
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
