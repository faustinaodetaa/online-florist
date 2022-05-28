@extends('template')

@section('content')

    <h1 style="text-align: center; margin: 20px">Insert Flower Type</h1>
    <hr>

    <form action="{{ url('/flowertype/insert') }}" style="margin: 100px" method="POST">
        {{csrf_field()}}
        <fieldset>

            <div class="form-group">
                <label for="name" class="form-label mt-4">Flower Type Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Flower Type Name">
            </div>

            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Insert</button>
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
