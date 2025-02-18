@extends('layout.master')
@section('my-body')
<form class="form-container" action="/authors/store" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset>
        <legend>Create New Author</legend>
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{old('name')}}">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="job_description">Job Description:</label>
        <textarea id="job_description" name="job_description">{{old('job_description')}}</textarea>
        @error('job_description')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{old('email')}}">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="bio">Bio:</label>
        <input type="text" id="bio" name="bio" value="{{old('bio')}}">
        @error('bio')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <select name="book_id" id="book_id" class="form-select">
            <option value="">Select Book</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                    {{ $book->name }}
                </option>
            @endforeach
        </select><br>

        <label for="profile_pic">Upload Profile Picture:</label>
        <input type="file" id="profile_pic" name="profile_pic">
        @error('profile_pic')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <button class="btn btn-success">Create</button>
    </fieldset>
</form>

@endsection