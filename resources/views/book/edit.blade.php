@extends('layout.master')
@section('my-body')
<form class="form-container" action="/books/update" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset>
        <legend>Update Book</legend>
        <br>
        <input type="hidden" name="id" value="{{$book->id}}">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{$book->name}}">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="description">description:</label>
        <textarea id="description" name="description">{{$book->description}}</textarea>
        @error('description')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="{{$book->price}}">
        @error('price')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <select name="author_id" id="author_id" class="form-select">
            <option value="">Select Author</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select><br>

        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" class="" value="{{ $book->image }}" required>
        </div>
        @error('image')
            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
        @enderror

        
        <button class="btn btn-success">Update</button>
    </fieldset>
</form>
@endsection