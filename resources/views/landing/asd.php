<!DOCTYPE html>
<html lang="en">

<head>
    <title>Purple Buzz HTML Template with Bootstrap 5 Beta 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="{{asset('css/templateCss/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/templateCss/boxicon.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/templateCss/templatemo.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="{{asset('css/templateCss/custom.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-transparent w-100" style="position:absolute;">
        <div class="container d-flex justify-content-between col-10 align-items-center">
            <a class="navbar-brand h1 text-dark" href="/">
                <span class="mx-4 h4">NewsWire Networks</span>
            </a>

            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-toggler-success">
                <div class="ms-auto">
                    <ul class="nav navbar-nav d-flex justify-content-end text-center">
                        <li class="nav-item">
                            <a class="nav-link text-dark mx-3" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark mx-3" href="{{route('about')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark mx-3" href="{{route('releases')}}">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-active  text-dark mx-3" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-dark mx-3" href="{{route('admin')}}">SignIn</a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <div class="login-container">
        <div class="login-box">
            <h2 class="text-center">Admin Login</h2>
            <!-- catch error -->
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color:red;">{{ $error }}</p>
                @endforeach
            @endif
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="email"><i class="fas fa-user"></i> Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <div class="input-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <button onclick="window.location.href='/'" type="button" class="btn-login">Home</button>
                <button type="submit" class="btn-login">Sign In</button>
            </form>
        </div>
    </div>

    <!-- Start Footer -->
    @include('landing.footer')
    <!-- End Footer -->

</body>

</html>