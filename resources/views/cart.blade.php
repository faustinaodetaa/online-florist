@extends('template')

@section('content')

    <h1 style="text-align: center; margin: 20px">Cart</h1>
    <hr>

    <br>

    <div style="margin: 100px">
        <div style="justify-content:space-evenly">
            <form action="{{ url('/cart/checkout') }}" style="margin: 100px" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Picture</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>

                        </tr>
                        </thead>
                        @php
                            $total = 0;
                        @endphp

                        @foreach ($carts as $cart)
                            <tbody>
                            <tr class="table-active">
                                <th scope="row"><img src="{{ asset('storage/' .$cart->flower->image) }}" style="width: 100px;"/></th>
                                <td>{{$cart->flower->name}}</td>
                                <td>{{$cart->qty}}</td>
                                <td>{{$cart->flower->price}}</td>

                                @php

                                $total += $cart->qty * $cart->flower->price
                                @endphp


                                <td>
                                    <div>
                                        <a href="{{url('cart/delete/'.$cart->id)}}" class="btn btn-danger" style="width: 50%">Remove</a>
                                    </div>
                                </td>
                            </tr>


                            </tbody>
                        @endforeach

                    </table>
                    <div class="form-group">
                        <label for="courier_name" class="form-label mt-4">Courier</label>
                        <select class="form-select" id="courier_name" name="courier_name" style="width: 20%">
                            @foreach($couriers as $courier)
                                <option value="{{$courier->id}}">{{$courier->name}} - {{$courier->cost}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total" class="form-label mt-4">Total Price</label>
                        <p>{{$total}}  </p>

                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Checkout</button>
                    </div>

{{--                @endif--}}
            </form>




        </div>
    </div>

@endsection
