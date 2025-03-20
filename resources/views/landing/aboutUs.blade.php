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
    <div class="container d-flex justify-content-bw col-10 align-items-center">
        <a class="d-flex justify-content-center  h1 text-white" href="#" style="text-decoration: none;">
            <span class="mx-4 text-center h4">NewsWire Networks</span>
        </a>

        <div class="">
            <div class="nav-top text-center">
                <div class="nav-item">
                    <a class="nav-link text-white" href="{{route('home')}}">Home</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link text-white link-active" href="{{route('about')}}">About</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link text-white" href="{{route('releases')}}">Articles</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link text-white" href="{{route('contact')}}">Contact</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link text-white" href="{{route('admin')}}">SignIn</a>
                </div>
            </div>
        </div>
    </div>
</nav>

    <!-- Start Banner Hero -->
    <div class="banner-wrapper home-bannere bg-light">

            <div class="home-bannere-pic">
                <img src="{{asset('images/aboutus.png')}}"
                    class="img-fluid" alt="">
            </div>

            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="py-5 px-0 mx-0 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                            <p class="banner-body text-light py-News That Matters, Stories That Inspire.3 mx-0 px-0">
                            Empowering content distribution with cutting-edge solutions.
                                </p>
                                <h1
                                    class="banner-heading h1 spec-text text-light mt-3 fw-bold display-3 mb-0 pb-5 mx-0 px-0 light-300 typo-space-line">
                                    About Us
                                </h1>
                                <h5 class="banner-body text-light py-News That Matters, Stories That Inspire.3 mx-0 px-0">
                                Newswire Networks is a premier content distribution company specializing in news syndication, press release dissemination, and audience engagement solutions. Our platform ensures businesses gain maximum visibility through high-quality media outreach.
                                </h5>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </div>
    <!-- End Banner Hero -->


    <!-- our mission -->
    <div class="container py-5">
        <div class="row py-5 d-flex justify-content-center">
            <div class="col-lg-10 d-flex flex-column align-items-center justify-content-center col-10">
                <h1 style="width:fit-content" class="display-3 text-center fw-bold pb-3"><span class="typo-space-line">Our Mission
                </span></h1>
                <p class="light-300 text-justify mt-5">
                At NewsWire Networks, our mission is to revolutionize content distribution by delivering high-quality, tailored news solutions. We empower businesses, publishers, and media professionals with cutting-edge syndication tools, ensuring their stories reach the right audience at the right time. Through advanced analytics, strategic partnerships, and seamless integrations, we help maximize visibility and engagement. Our commitment is to provide reliable, efficient, and innovative content delivery solutions that keep brands ahead in an ever-evolving digital landscape.
                </p>
            </div>
        </div>
    </div>
    <!-- end our mission -->



    <!-- Start Footer -->
    @include('landing.footer')
    <!-- End Footer -->


    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Isotope -->

</body>

</html>