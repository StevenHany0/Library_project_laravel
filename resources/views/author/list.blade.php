@extends('book.layout.master')
@section('content')
<div class="container">
    <h1>Authors List</h1>

    <table class="table-dark table-striped table-bordered table-hover table-width w-100 ">

        <thead>
            <tr>
                <th>Name</th>
                <th>Job Description</th>
                <th>Email</th>
                <th>Bio</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>

        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->job_description }}</td>
                    <td>{{ $book->email }}</td>
                    <td>{{ $book->bio }}</td>
                    <td>{{ \Carbon\Carbon::parse($book->created_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($book->updated_at)->format('d/m/Y H:i') }}</td>
                    <td class="text-inline"><a class="btn btn-success" href="/books/edit/{{$book->id}}">Update</a>
                        <form method="post" action="/books/delete/{{$book->id}}" class=" my-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="6" class="p-3">{{ $books->count() }} Books</td>
            </tr>
        </tfoot>
    </table>


</div>
@endsection