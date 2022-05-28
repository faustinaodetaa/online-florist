<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OnlineFlorist</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">OnlineFlorist</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                @if (auth()->user() == NULL)
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/login')}}">Login
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/register')}}">Register
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>

                @endif
                @if (auth()->user() != NULL)
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/profile')}}">Profile</a>
                        </li>
                    @if (auth()->user()->role == 'admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin Menu</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{'/cart'}}">Cart Page</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{'/manageflower'}}">Manage Flowers</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{'/manageflowertype'}}">Manage Flowers Types</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{'/managecourier'}}">Manage Couriers</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{'/manageuser'}}">Manage Users</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{'/history'}}">Transaction History</a>

                                </div>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">@if(auth()->check()) {{auth()->user()->name}} @endif Menu</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{'/cart'}}">Cart Page</a>
                                </div>
                            </li>
                    @endif
                        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" style="margin-left: 500px">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">{{ date('H:i:s D/M/Y ') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{'/logout'}}">Logout</a>
                                </li>
                            </ul>
                        </div>
                @endif

            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer>
    <div >
        <p style="text-align: center">
            &copy; LC036
        </p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
