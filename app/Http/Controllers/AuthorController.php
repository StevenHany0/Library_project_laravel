<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('author.list', compact('authors'));

    }

    public function create()
    {
        $books = Book::all();
        return view('author.create',compact('books'));
    }

    public function edit($id)
    {
     
        $books= Book::all();
        $author = Author::find($id);
        return view('author.edit',compact('author','books'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'job_description' => 'required|string',
                'bio' => 'required|string',
                'email' => 'required|email',
                'profile_pic' => 'nullable|mimes:jpeg,gif,jpg,webp',
                'book_id' => 'nullable'
            ]
        );
        $author = Author::find($request->id);
        if ($request->has('profile_pic')) {
            $file = $request->file('profile_pic');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $path = 'assets/files/';
            $file->move($path, $filename);
            
            if (File::exists(public_path($author->profile_pic))) {
                File::delete(public_path($author->profile_pic));
            }
        }
        $author->update(
            [
                'name' => $request->name,
                'job_description' => $request->job_description,
                'bio' => $request->bio,
                'email' => $request->email,
                'book_id' => $request->book_id,
                'profile_pic' => $path . $filename
            ]
        );
        
        $authors = Author::all();
        return view('author.list',compact('authors'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|string',
                'job_description' => 'required|string',
                'bio' => 'required|string',
                'email' => 'required|email',
                'profile_pic' => 'nullable|mimes:jpeg,gif,jpg,webp',
                'book_id' => 'nullable'

            ]
        );

        if ($request->has('profile_pic')) {
            $file = $request->file('profile_pic');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $path = 'assets/files/';
            $file->move($path, $filename);
            
            
        }

        $data = [
            'name' => $request->name,
            'job_description' => $request->job_description,
            'bio' => $request->bio,
            'email' => $request->email,
            'book_id' => $request->book_id,
            'profile_pic' => $path . $filename
        ];

        Author::create($data);
        $authors = Author::all();
        
        return view('author.list',compact('authors'));
    }

    public function delete($id)
    {
        $author = Author::find($id);
        $author->delete();
        $authors = Author::all();
        return view('author.list',compact('authors'));
    }


}
