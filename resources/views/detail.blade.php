@extends('template')

@section('content')

    <h1 style="text-align: center; margin: 20px">Flower Details</h1>
    <hr>

    <div style="margin: 100px">
        <div class="row" style="justify-content:space-evenly">
            <div class="card" >
                <div class="card-body">
                    <img src="{{ asset('storage/' .$flower->image) }}" style="width: 100px;"/>
                    <h5 class="card-title">{{$flower->name}}</h5>
                    <p class="card-text">{{$flower->description}}</p>
                    <p class="card-text">Rp. {{$flower->price}}</p>
                    <p class="card-text">Stock: {{$flower->stock}}</p>

                    <form action="{{url('/flower/addtocart/'.$flower->id)}}" method="POST">
                        <div class="form-group">
                            <label for="qty" class="form-label mt-4">Input Quantity</label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="qty" style="width: 10%">
                        </div>
                        {{csrf_field()}}
                        @if($flower->stock <= 0)
                            <button type="submit" class="btn btn-secondary disabled" style="margin-bottom: 10px; width: 150px">Add to Cart</button>
                        @else
                            <button type="submit" class="btn btn-secondary" style="margin-bottom: 10px; width: 150px">Add to Cart</button>
                        @endif
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-dismissible alert-danger">
                            {{$errors->first()}}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection
