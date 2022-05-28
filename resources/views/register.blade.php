@extends('template')

@section('content')

    <form action="{{ url('/register') }}" style="margin: 100px" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <fieldset>
            <legend>Register</legend>
            <div class="form-group">
                <label for="name" class="form-label mt-4">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email" class="form-label mt-4">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="phone" class="form-label mt-4">Phone Number</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number" value="{{ old('phone') }}">
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
                <textarea class="form-control" id="exampleTextarea" rows="3" name="address" value="{{ old('address') }}"></textarea>
            </div>
            <div class="form-group">
                <label for="password" class="form-label mt-4">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
            </div>
            <div class="form-group">
                <label for="cp" class="form-label mt-4">Confirm Password</label>
                <input type="password" class="form-control" name="cp" id="cp" placeholder="Confirm Password" value="{{ old('cp') }}">
            </div>
            <div class="form-group">
                <label for="formFile" class="form-label mt-4">Image</label>
                <input class="form-control" type="file" id="file" name="file">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
            @if ($errors->any())
                <div class="alert alert-dismissible alert-danger">
                    {{$errors->first()}}
                </div>
            @endif
        </fieldset>
    </form>

@endsection
