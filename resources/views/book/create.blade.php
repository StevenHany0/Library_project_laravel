@extends('layout.master')
@section('my-body')
<form class="form-container" action="/books/store" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset>
        <legend>Create New Book</legend>
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{old('name')}}">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="description">description:</label>
        <textarea id="description" name="description">{{old('description')}}</textarea>
        @error('description')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="{{old('price')}}">
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

        <label for="image">upload image:</label>
        <input type="file" id="image" name="image">
        @error('image')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <button class="btn btn-success">Create</button>
    </fieldset>
</form>

@endsection