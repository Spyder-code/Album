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

<body style="background-image:url({{ asset('assets/images/background/background.jpg') }});background-size: cover;
">
    <div class="container">
        <div class="row">
            <div class="col" style="padding-top:17%; padding-left:400px;">
                <div class="card text-center shadow-lg" style="width:400px; height:245px; border-radius:18px;">
                    <div class="card-header">
                        <h1>Login</h1>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control @error ('user') is-invalid @enderror"
                                    id="exampleInputEmail" name="user" placeholder="Username...">
                                    @error('user') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                            </form>
                    </div>
                </div>
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


