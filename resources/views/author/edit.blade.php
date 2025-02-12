@extends('layout.master')
@section('my-body')
<form class="form-container" action="/authors/update" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset>
        <legend>Update Author</legend>
        <br>
        <input type="hidden" name="id" value="{{$author->id}}">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{$author->name}}">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="job_description">Job Description:</label>
        <textarea id="job_description" name="job_description">{{$author->job_description}}</textarea>
        @error('job_description')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="{{$author->email}}">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="bio">Bio:</label>
        <input type="text" id="bio" name="bio" value="{{$author->bio}}">
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

        <label for="profile_pc">Upload Profile Picture:</label>
        <input type="file" id="profile_pic" name="profile_pic">
        @error('profile_pic')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <button class="btn btn-success">Update</button>
    </fieldset>
</form>

@endsection