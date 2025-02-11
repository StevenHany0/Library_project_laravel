@extends('book.layout.master')
@section('content')

<h1>Create a New Author</h1>

<form action="{{ route('authors.store') }}" method="post" style="height: 1000px;">
    @csrf


    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="job_description">Job Description:</label>
        <textarea name="job_description" class="form-control" required>{{ old('job_description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control"  value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="bio">Bio:</label>
        <input type="text" name="bio" class="form-control" value="{{ old('bio') }}" required>
    </div>

    <div class="form-group">
        <label for="profile_picture">Upload Image:</label>
        <input type="file" name="profile_picture" class="form-control" value="{{ old('profile_picture') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Book</button>
</form>

@endsection