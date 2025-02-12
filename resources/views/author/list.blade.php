@extends('layout.master')
@section('my-body')
<table class="table table-striped ">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Job Description</th>
        <th>Email</th>
        <th>Bio</th>
        <th>Profile Picture</th>
        <th>created_at</th>
        <th scope="col-2">Actions</th>
    </thead>
    <tbody>

        @foreach ($authors as $author)
            <tr>
                <th>{{$author->id}}</th>
                <td>{{$author->name}}</td>
                <td>{{$author->job_description}}</td>
                <td>{{$author->email}}</td>
                <td>{{$author->bio}}</td>
                <td><img src="{{asset($author->profile_pic)}}" alt="profile" class="img-thumbnail" width="100"></td>
                <td>{{\Carbon\Carbon::parse($author->created_at)->format('d/m/Y H:i')}}</td>
                <td>
                    <a href="/authors/edit/{{$author->id}}" class="btn btn-success">Update</a>

                    <form action="/authors/delete/{{$author->id}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
    <tr>
        <td colspan="8"><a href="/authors/create"><button class="btn btn-success">Create New Author <i
                        class="fa-solid fa-pen-to-square"></i></button></a></td>
    </tr>
</table>
@endsection