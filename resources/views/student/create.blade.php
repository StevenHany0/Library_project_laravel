@extends('layout.master')
@section('my-body')
<form class="form-container" action="/students/store" method="post">
    @csrf
    <fieldset>
        <legend>Create Student</legend>
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{old('name')}}">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">{{old('email')}}</input>
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{old('phone')}}">
        @error('phone')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <button class="btn btn-success">Create</button>
    </fieldset>
</form>
@endsection