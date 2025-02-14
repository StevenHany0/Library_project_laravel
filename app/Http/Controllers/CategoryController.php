<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view("category.list",compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'string|required'
        ]);

        Category::create($request->all());

        $categories=Category::all();
        return redirect()->route('categories.list',compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view("category.edit",compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'string|required'
        ]);

        $category=Category::find($request->id);
        $category->update($request->all());

        $categories=Category::all();
        return redirect()->route('categories.list',compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $category=Category::find($id);
        $category->delete();
        $categories=Category::all();
        return redirect()->route('categories.list',compact('categories'));
        
    }
}
