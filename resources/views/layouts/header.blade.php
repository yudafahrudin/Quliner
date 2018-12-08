@section('header')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{'Quliner'}}</title>

    <!---- CSS ------>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.2/css/swiper.css">
    <link rel="stylesheet" href="{{asset('/css/user/custom.css')}}">
    <!---- CSS ------>
</head>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('img/headerico.png')}}" style="padding:0.5rem;height: 50px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('list')}}">Daftar Lokasi</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('location')}}">Pencarian Peta</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <form class="form-inline my-2 my-lg-0" action="{{route('list')}}">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn  btn-warning my-2 my-sm-0 mr-4 " type="submit">Search</button>
                </form>
                <li class="nav-item dropdown">
                    @if(Auth::check())         
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$name}} <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a href="{{route('profile')}}" class="dropdown-item" >Profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{route('logout')}}" class="dropdown-item" >Logout</a>
                    </div>
                    @else
                <li class="nav-item active">
                    <a href="{{route('login')}}" class="nav-link" href="#">Masuk</a>
                </li>
                @endif
                </li>
            </ul>
        </div>
    </nav>
</div>
@endsection