@extends('template')

@section('content')

    <h1 style="text-align: center; margin: 20px">Manage Flowers</h1>
    <hr>
    <div class="text-center">
        <a href="{{url('flower/insert')}}" type="submit" class="btn btn-primary" >Insert Flower</a>
    </div>
    <br>

    <form action="/manageflower" class="d-flex">
        <input id="search" name="q" class="form-control me-sm-2" type="search" placeholder="Search" style="width: 30%; margin-left: 30%">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>

    <div style="margin: 100px">
        <div class="row" style="justify-content:space-evenly">
            @foreach ($flowers as $flower)
                <div class="card" style="width: 200px;">
                    <div class="card-body">
                        <img src="{{ asset('storage/' .$flower->image) }}" style="width: 100px;"/>
                        <h5 class="card-title">{{$flower->name}}</h5>
                        <p class="card-text">{{$flower->description}}</p>
                        <div class="row">
                            <a href="{{url('flower/update/'.$flower->id)}}" class="btn btn-warning" style="margin-bottom: 20px">Update</a>
                            <a href="{{url('flower/delete/'.$flower->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div style="justify-content:space-around; margin-top:50px" >
                <div>
                    <div class="d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item active">
                                <a class="page-link" href="{{$flowers->previousPageUrl()}}">&laquo;</a>
                            </li>
                            @for($i = 1; $i <= $flowers->lastPage(); $i++)
                                @if($i == $flowers->currentPage())
                                    <li class="page-item active">
                                        <a class="page-link" href="#">{{$i}}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{$flowers->url($i)}}">{{$i}}</a>
                                    </li>
                                @endif
                            @endfor
                            <li class="page-item">
                                <a class="page-link" href="{{$flowers->nextPageUrl()}}">&raquo;</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
