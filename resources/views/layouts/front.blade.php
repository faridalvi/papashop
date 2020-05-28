<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Papashop</title>
    <link href="{{asset('public/backend/css')}}/styles.css" rel="stylesheet" />
    <link href="{{asset('public/backend/css')}}/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('front')}}">Papashop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('front')}}">Home</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link" >Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
@yield('content')
<script src="{{asset('public/backend/js')}}/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="{{asset('public/backend/js')}}/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('public/backend/js')}}/scripts.js"></script>
<script src="{{asset('public/backend/js')}}/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{asset('public/backend/js')}}/chart-area-demo.js"></script>
<script src="{{asset('public/backend/js')}}/chart-bar-demo.js"></script>
<script src="{{asset('public/backend/js')}}/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="{{asset('public/backend/js')}}/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{asset('public/backend/js')}}/datatables-demo.js"></script>
</body>
</html>
