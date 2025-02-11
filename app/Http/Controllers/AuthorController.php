<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('author.list', compact('authors'));

    }

    public function create()
    {
        return view('author.create');
    }

    public function edit($id)
    {
     
        
        $author = Author::find($id);
        return view('author.edit',compact('author'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|alpha:ascii',
                'description' => 'required',
                'price' => 'required|numeric',
                'author' => 'required|alpha:ascii',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        );
        $author = Author::find($request->id);
        $author->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'author' => $request->author,
                'image' => $request->file('image')->store('assets/files','public')
            ]
        );
        
        $authors = Author::all();
        return view('author.list',compact('authors'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|alpha:ascii',
                'description' => 'required',
                'price' => 'required|numeric',
                'author' => 'required|alpha:ascii',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

            ]
        );

        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $author = $request->author;

        $data = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'author' => $author,
            'image' => $request->file('image')->store('assets/files','public')
        ];

        Author::create($data);
        $authors = Author::all();
        
        return view('book.author.list',compact('authors'));
    }

    public function delete($id)
    {
        $author = Author::find($id);
        $author->delete();
        $authors = Author::all();
        return view('book.author.list',compact('authors'));
    }


}
