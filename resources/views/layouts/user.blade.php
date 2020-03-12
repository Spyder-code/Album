<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <title>@yield('title')</title>
</head>

<body class="bg-light">
    <div class="jumbotron text-center mt" style="background-image:url({{ asset('assets/images/background/background.jpg') }})">
        <h1 class="border" style="background-color:white; border-radius:18px; width:30%; margin-left:35%; border-color:yellow">Album Foto Editor</h1>
    </div>
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col col-8">
                <div class="card" style="height:100%">
                    @yield('container')
                </div>
            </div>
            <div class="col col-4">
                @yield('sidebar')
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script type="text/javascript" src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
</body>
</html>
