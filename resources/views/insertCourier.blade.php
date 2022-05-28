@extends('template')

@section('content')

    <h1 style="text-align: center; margin: 20px">Insert Courier</h1>
    <hr>

    <form action="{{ url('/courier/insert') }}" style="margin: 100px" method="POST">
        {{csrf_field()}}
        <fieldset>

            <div class="form-group">
                <label for="courier_name" class="form-label mt-4">Courier Name</label>
                <input type="text" class="form-control" id="courier_name" name="courier_name" placeholder="Courier Name">
            </div>
            <div class="form-group">
                <label for="courier_cost" class="form-label mt-4">Shipping Cost</label>
                <input type="number" class="form-control" id="courier_cost" name="courier_cost" placeholder="Shipping Cost">
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
