@extends('template')

@section('content')

    <h1 style="text-align: center; margin: 20px">Update User</h1>
    <hr>

    <form action="{{ url('/user/update/'.$user->id) }}" style="margin: 100px" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset>

            <div class="form-group">
                <label for="name" class="form-label mt-4">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="email" class="form-label mt-4">E-Mail Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="phone" class="form-label mt-4">Phone Number</label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
            </div>
            <div class="form-group">
                <label for="gender" class="form-label mt-4">Gender</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                        Female
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="form-label mt-4">Address</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" name="address" value="{{$user->address}}"></textarea>
            </div>
            <div class="form-group">
                <label for="formFile" class="form-label mt-4">Image</label>
                <input class="form-control" type="file" id="file" name="file">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <hr>
            @if ($errors->any())
                <div class="alert alert-dismissible alert-danger">
                    {{$errors->first()}}
                </div>
            @endif
        </fieldset>
    </form>

@endsection
