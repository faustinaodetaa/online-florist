@extends('template')

@section('content')

    <h1 style="text-align: center; margin: 20px">Transaction History</h1>
    <hr>
    <br>
    <div style="margin: 100px">
        <div style="justify-content:space-evenly">

            @foreach ($headers as $header)

            <p>Transaction ID   : {{$header->id}}</p>
            <p>Transaction Date : {{$header->date}}</p>
            <p>Member Name      : {{$header->user->name}}</p>
            <p>Courier          : {{$header->courier->name}}</p>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Picture</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    @php
                        $total = 0;
                    @endphp
                    @foreach($header->transactiondetail as $detail)

                        <tbody>
                        <tr class="table-active">
                            <th scope="row"><img src="{{ asset('storage/' .$detail->flower->image) }}" style="width: 100px;"/></th>
                            <td>{{$detail->flower->name}}</td>
                            <td>{{$detail->qty}}</td>
                            <td>{{$detail->flower->price}}</td>
                        </tr>
                        </tbody>
                        @php
                            $total += $detail->qty * $detail->flower->price
                        @endphp
                    @endforeach

                </table>
                <p>Total: Rp {{$total}}</p>
                <br><hr>
            @endforeach
        </div>
    </div>

@endsection
