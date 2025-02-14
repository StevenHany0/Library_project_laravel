
@extends('layout.master')
@section('my-body')
<table class="table table-striped ">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>created_at</th>
        <th scope="col-2">Actions</th>
    </thead>
    <tbody>

        @foreach ($students as $student)
            <tr>
                <th>{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->phone}}</td>
                <td>{{ \Carbon\Carbon::parse($student->created_at)->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="/students/edit/{{$student->id}}" class="btn btn-success">Update</a>

                    <form action="/students/delete/{{$student->id}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach

    </tbody>
    <tr>
        <td colspan="6"><a href="/students/create"><button class="btn btn-success">Create New Student<i
                        class="fa-solid fa-pen-to-square"></i></button></a></td>
    </tr>
</table>
@endsection