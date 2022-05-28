@extends('template')
@section('content')

    <form action="{{ url('/login') }}" style="margin: 100px" method="POST">
        {{csrf_field()}}
        <fieldset>
            <legend>Login</legend>
            <div class="form-group">
                <label for="email" class="form-label mt-4">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="mail@mail.com">
            </div>
            <div class="form-group">
                <label for="password" class="form-label mt-4">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember Me</label>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
            <br>
            <small>Forgot Your Password?</small>
            @if ($errors->any())
                <div class="alert alert-dismissible alert-danger">
                    {{$errors->first()}}
                </div>
            @endif
        </fieldset>
    </form>

@endsection
