
@extends('layout.master')
@section('my-body')
<table class="table table-striped ">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Author</th>
        <th>Student</th>
        <th>Image</th>
        <th>created_at</th>
        <th scope="col-2">Actions</th>
    </thead>
    <tbody>

        @foreach ($books as $book)
            <tr>
                <th>{{$book->id}}</th>
                <td>{{$book->name}}</td>
                <td>{{$book->description}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->author? $book->author->name:NULL}}</td>
                <td>{{$book->student? $book->student->name:NULL}}</td>
                <td><img src="{{ asset($book->image) }}" alt="{{ $book->name }}" class="img-thumbnail" width="100"></td>
                <td>{{ \Carbon\Carbon::parse($book->created_at)->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="/books/edit/{{$book->id}}" class="btn btn-success">Update</a>

                    <form action="/books/delete/{{$book->id}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach

    </tbody>
    <tr>
        <td colspan="9"><a href="/books/create"><button class="btn btn-success">Create New Book <i
                        class="fa-solid fa-pen-to-square"></i></button></a></td>
    </tr>
</table>
@endsection