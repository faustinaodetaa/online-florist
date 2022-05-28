@extends('template')

@section('content')

    <h1 style="text-align: center; margin: 20px">Manage Couriers</h1>
    <hr>
    <div class="text-center">
        <a href="{{url('courier/insert')}}" type="submit" class="btn btn-primary" >Insert Courier</a>
    </div>
    <br>

    <form action="/managecourier" class="d-flex">
        <input id="search" name="q" class="form-control me-sm-2" type="search" placeholder="Search" style="width: 30%; margin-left: 30%">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>

    <div style="margin: 100px">
        <div class="row" style="justify-content:space-evenly">
            @foreach ($couriers as $courier)
                <div class="card" style="width: 200px;">
                    <div class="card-body">
                        <h5 class="card-title"> ID: {{$courier->id}}</h5>
                        <h5 class="card-title">{{$courier->name}}</h5>
                        <p class="card-text">Cost: Rp {{$courier->cost}}</p>
                        <div class="row">
                            <a href="{{url('courier/update/'.$courier->id)}}" class="btn btn-warning" style="margin-bottom: 20px">Update</a>
                            <a href="{{url('courier/delete/'.$courier->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div style="justify-content:space-around; margin-top:50px" >
                <div>
                    <div class="d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item active">
                                <a class="page-link" href="{{$couriers->previousPageUrl()}}">&laquo;</a>
                            </li>
                            @for($i = 1; $i <= $couriers->lastPage(); $i++)
                                @if($i == $couriers->currentPage())
                                    <li class="page-item active">
                                        <a class="page-link" href="#">{{$i}}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{$couriers->url($i)}}">{{$i}}</a>
                                    </li>
                                @endif
                            @endfor
                            <li class="page-item">
                                <a class="page-link" href="{{$couriers->nextPageUrl()}}">&raquo;</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
