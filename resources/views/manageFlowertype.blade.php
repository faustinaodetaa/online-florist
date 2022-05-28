@extends('template')

@section('content')

    <h1 style="text-align: center; margin: 20px">Manage Flower Types</h1>
    <hr>
    <div class="text-center">
        <a href="{{url('flowertype/insert')}}" type="submit" class="btn btn-primary" >Insert Flower Type</a>
    </div>
    <br>

    <form action="/manageflowertype" class="d-flex">
        <input id="search" name="q" class="form-control me-sm-2" type="search" placeholder="Search" style="width: 30%; margin-left: 30%">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>

    <div style="margin: 100px">
        <div class="row" style="justify-content:space-evenly">
            @foreach ($flowertypes as $ft)
                <div class="card" style="width: 200px;">
                    <div class="card-body">
                        <p class="card-title">{{$ft->name}}</p>
                        <div class="row">
                            <a href="{{url('flowertype/update/'.$ft->id)}}" class="btn btn-warning" style="margin-bottom: 20px">Update</a>
                            <a href="{{url('flowertype/delete/'.$ft->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div style="justify-content:space-around; margin-top:50px" >
                <div>
                    <div class="d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item active">
                                <a class="page-link" href="{{$flowertypes->previousPageUrl()}}">&laquo;</a>
                            </li>
                            @for($i = 1; $i <= $flowertypes->lastPage(); $i++)
                                @if($i == $flowertypes->currentPage())
                                    <li class="page-item active">
                                        <a class="page-link" href="#">{{$i}}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{$flowertypes->url($i)}}">{{$i}}</a>
                                    </li>
                                @endif
                            @endfor
                            <li class="page-item">
                                <a class="page-link" href="{{$flowertypes->nextPageUrl()}}">&raquo;</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
