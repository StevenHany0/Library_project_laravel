@extends('book.layout.master')
@section('content')

    <h1>Create a New Book</h1>

    <form action="{{ route('store') }}" method="post" style="height: 1000px; >
        @csrf
        
        <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Book</button>
    </form>

@endsection

