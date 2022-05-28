@extends('template')

@section('content')

    <h1 style="text-align: center; margin: 20px">Insert Flower</h1>
    <hr>

    <form action="{{ url('/flower/insert') }}" style="margin: 100px" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset>

            <div class="form-group">
                <label for="flower_name" class="form-label mt-4">Flower Name</label>
                <input type="text" class="form-control" id="flower_name" name="flower_name" placeholder="Flower Name">
            </div>
            <div class="form-group">
                <label for="flower_price" class="form-label mt-4">Flower Price</label>
                <input type="number" class="form-control" id="flower_price" name="flower_price" placeholder="Flower Price">
            </div>
            <div class="form-group">
                <label for="flower_stock" class="form-label mt-4">Flower Stock</label>
                <input type="number" class="form-control" id="flower_stock" name="flower_stock" placeholder="Flower Stock">
            </div>
            <div class="form-group">
                <label for="flower_type" class="form-label mt-4">Flower Type</label>
                <select class="form-select" id="flower_type" name="flower_type">
                    @foreach($flowertypes as $ft)
                        <option value="{{$ft->name}}">{{$ft->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="flower_description" class="form-label mt-4">Flower Description</label>
                <input type="text" class="form-control" id="flower_description" name="flower_description" placeholder="Flower Description">
            </div>
            <div class="form-group">
                <label for="flower_image" class="form-label mt-4">Image</label>
                <input class="form-control" type="file" id="flower_image" name="flower_image">
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
