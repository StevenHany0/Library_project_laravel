@extends('layout.master')
@section('my-body')
<form class="form-container" action="/students/update" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset>
        <legend>Update Student</legend>
        <br>
        <input type="hidden" name="id" value="{{$student->id}}">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{$student->name}}">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">{{$student->email}}</input>
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{$student->phone}}">
        @error('phone')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <button class="btn btn-success">Update</button>
    </fieldset>
</form>
@endsection