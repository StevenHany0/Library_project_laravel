<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;  
use App\Models\Student;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('book.list', compact('books'));

    }

    public function create()
    {
        $students=Student::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('book.create', compact('authors','students','categories'));
    }

    public function store(Request $request)
    {
    

        $request->validate(
            [
                'name' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'nullable|mimes:jpeg,jpg,gif,webp',
                'author_id' => 'nullable',
                'student_id' => 'nullable',
                'category_ids' => 'required',
                'category_ids.*' => 'exists:categories,id'
               
            ]
        );

        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $author_id = $request->author_id;
        $student_id = $request->student_id;


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
            'author_id' => $author_id,
            'student_id' => $student_id
        ];

        
        $book=Book::create($data);
        $book->categories()->attach($request->category_ids);


        $books = Book::all();

        return view('book/list', compact('books'));
    }

    public function edit($id)
    {


        $students=Student::all();
        $authors = Author::all();
        $categories = Category::all();
        $book = Book::find($id);
        return view('book.edit', compact('book','authors','students','categories'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|alpha:ascii',
                'description' => 'required',
                'price' => 'required|numeric',
                'image' => 'nullable|mimes:jpeg,jpg,gif,webp',
                'author_id' => 'nullable',
                'student_id' => 'nullable',
                'category_ids' => 'required',
                'category_ids.*' => 'exists:categories,id'
                
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
                'author_id' => $request->author_id,
                'student_id' => $request->student_id
            ]
        );

        $book->categories()->sync($request->category_ids);

        $books = Book::all();
        return view('book.list', compact('books'));
    }

   

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        $books = Book::all();
        return view('book.list', compact('books'));
    }


}
