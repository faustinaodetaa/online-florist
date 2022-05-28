@extends('template')

@section('content')

    <h1 style="text-align: center; margin: 20px">Manage Users</h1>
    <hr>

    <br>

    <div style="margin: 100px">
        <div class="row" style="justify-content:space-evenly">
            @foreach ($users as $user)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Picture</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="table-active">
                        <th scope="row"><img src="{{ asset('storage/' .$user->image) }}" style="width: 100px;"/></th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->address}}</td>
                        <td>
                            <div>
                                <a href="{{url('user/update/'.$user->id)}}" class="btn btn-warning" style="margin-bottom: 20px; width: 50%">Update</a>
                                <a href="{{url('user/delete/'.$user->id)}}" class="btn btn-danger" style="width: 50%">Remove</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            @endforeach

        </div>
    </div>

@endsection
