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
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="{{asset('css/templateCss/custom.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body style="background-color:#3a004f!important;">
    <nav class="navbar navbar-expand-lg bg-transparent w-100" style="position:absolute;">
        <div class="container d-flex justify-content-between col-10 align-items-center">
            <a class="navbar-brand h1 text-white" href="/">
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
                            <a class="nav-link text-white mx-3" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mx-3" href="{{route('about')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mx-3" href="{{route('releases')}}">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white mx-3" href="{{route('contact')}}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white link-active  mx-3" href="{{route('admin')}}">SignIn</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
        <div class="card shadow col-md-5">
            <div class="card-body p-4 px-5">
                <h4 class="text-center mb-4">Admin Login</h2>

                <!-- Error messages -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="fas fa-user me-2"></i>Email
                        </label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Password
                        </label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Enter your password" required>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-center mt-4 py-3">
                        <a href="/" class="btn btn-signin me-md-2">Home</a>
                        <button type="submit" class="btn btn-signin">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Start Footer -->
    @include('landing.footer')
    <!-- End Footer -->

</body>

</html>