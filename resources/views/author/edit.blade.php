@extends('book.layout.master')
@section('content')

    <h1>Edit Book</h1>

    <form action="/books/update" method="post" style="height: 1000px;" >
        @csrf
        
        <input type="hidden" name="id" value="{{ $book->id }}">
        <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" name="name" class="form-control" value="{{ $book->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" required>{{ $book->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $book->price }}" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author}}" required>
        </div>

        <div class="form-group">
        <label for="image">Upload Image:</label>
        <input type="file" name="image" class="form-control" value="{{ $book->image}}" required>
    </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>

@endsection