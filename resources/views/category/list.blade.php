
@extends('layout.master')
@section('my-body')
<table class="table table-striped ">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>created_at</th>
        <th scope="col-2">Actions</th>
    </thead>
    <tbody>

        @foreach ($categories as $category)
            <tr>
                <th>{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="/categories/edit/{{$category->id}}" class="btn btn-success">Update</a>

                    <form action="/categories/delete/{{$category->id}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach

    </tbody>
    <tr>
    <td colspan="4"><a href="/categories/create"><button class="btn btn-success">Create New Category<i
    class="fa-solid fa-pen-to-square"></i></button></a></td>
    </tr>
</table>
@endsection