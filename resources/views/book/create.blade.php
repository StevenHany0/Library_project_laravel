@extends('book.layout.master')
@section('content')

<h1>Create a New Book</h1>

<form action="{{ route('books.store') }}" method="post" style="height: 1000px;" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Title:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    @error('name')
        <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
    @enderror

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
    </div>
    @error('description')
        <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
    @enderror

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
    </div>
    @error('price')
        <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
    @enderror

    <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
    </div>
    @error('author')
        <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
    @enderror

    <div class="form-group">
        <label for="image">Upload Image:</label>
        <input type="file" name="image" class="" value="{{ old('image') }}" required>
    </div>
    @error('image')
        <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
    @enderror
    <button type="submit" class="btn btn-primary">Create Book</button>
</form>

@endsection