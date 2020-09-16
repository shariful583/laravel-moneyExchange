<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money-Exchange-@yield('title')</title>
    <link rel="stylesheet" href="/style/main.css">
    <link rel="stylesheet" href="/style/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand nav-brand logo" href="https://www.usdbd24.com">
        <img class="img-responsive" src="storage/Logo12.jpg">
            <span class="green">Money</span><span class="">Exchange</span>
    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span>(Our Office Hour : 00:00 am - 00:00 am)</span>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                </li>
                @guest('web')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.login')}}">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.signup')}}">Sign Up</a>
                </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="/#contact">Contact</a>
                </li>
                @auth('web')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.sell')}}">Sell</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.buy')}}">Buy</a>
                    </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">{{Auth::guard('web')->user()->name}}</a>
                        <a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>
                    </div>
                </li>
                @endauth
                <li>WhatsApp : 0000000
                    <br> Call 24/7 : 0000000
                </li>
            </ul>
        </div>
</nav>
<div class="alert alert-info" style="margin-bottom: 0px">
    <marquee>Some text</marquee>
</div>

@section('sidebar')

@show

<div class="main">
    @yield('content')
</div>


<footer>
    <h1>USD <span>BD24</span></h1>
    <p><?php echo date('Y'); ?> © USDBD24</p>
    </a -->
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
{{--<script src="/script/bootstrap.min.js"></script>--}}
{{--<script src="/script/jquery-slim.min.js"></script>--}}
{{--<script src="/script/popper.min.js"></script>--}}
</body>
</html>
