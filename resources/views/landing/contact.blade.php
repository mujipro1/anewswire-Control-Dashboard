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
                            <a class="nav-link link-active  text-dark mx-3" href="">Contact</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-dark mx-3" href="{{route('admin')}}">SignIn</a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>



    <!-- our mission -->
    <div class="container  d-flex justify-content-center align-items-center py-5" style="min-height: 100vh;">
        <div class="row py-5 d-flex justify-content-center">
            <h1 style="width:fit-content" class="display-3 text-center fw-bold pb-3"><span
                    class="typo-space-line">Contact Us
                </span></h1>
            <div class="row my-4">
            <div class="flex col-md-4 offset-md-2 justify-content-start flex-column mt-5 ">

                <p><strong>Email </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;info@newswirenetworks.com </p>
                <p><strong>Phone </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+1-212-925-1111</p>
                <p><strong>Address </strong>&nbsp;&nbsp;123 Main Street, New York, NY 10001</p>
                </div>
                <div class="col-md-3 offset-md-1">
                    <p class="light-300 text-justify mt-5">
                        We are here to help you with any queries you may have. Please feel free to reach out to us
                        and we will get back to you as soon as possible.
                    </p>
                </div>
                
            </div>
        </div>
    </div>
    <!-- end our mission -->



    <!-- Start Footer -->
    @include('landing.footer')
    <!-- End Footer -->

</body>

</html>