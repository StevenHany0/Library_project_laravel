@extends('book.layout.master')
@section('content')
    <div class="container" >
        <h1>Books List</h1>
        
        <table class="table-dark table-striped table-bordered table-hover table-width w-100 p-3" style=" height: 1000px;">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Author</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ \Carbon\Carbon::parse($book->created_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($book->updated_at)->format('d/m/Y H:i') }}</td>
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
