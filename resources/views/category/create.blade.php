@extends('layout.master')
@section('my-body')
<form class="form-container" action="/categories/store" method="post">
    @csrf
    <fieldset>
        <legend>Create Category</legend>
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{old('name')}}">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <button class="btn btn-success">Create</button>
    </fieldset>
</form>
@endsection