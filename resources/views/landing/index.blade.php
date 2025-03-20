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
        <a class="navbar-brand h1 text-white" href="#">
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
                        <a class="nav-link text-white mx-3 link-active" href="#">Home</a>
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
                        <a class="nav-link text-white mx-3" href="{{route('admin')}}">SignIn</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


    <!-- Start Banner Hero -->
    <div class="banner-wrapper home-bannere bg-light">

            <div class="home-bannere-pic">
                <img src="{{asset('images/homeimg.png')}}"
                    class="img-fluid" alt="">
            </div>

            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="py-5 px-0 mx-0 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                            <p class="banner-body text-light py-News That Matters, Stories That Inspire.3 mx-0 px-0">
                            News That Matters, Stories That Inspire.
                                </p>
                                <h1
                                    class="banner-heading h1 spec-text text-light mt-3 display-3 mb-0 pb-5 mx-0 px-0 light-300 typo-space-line">
                                    Creating Impact, Amplifying Reach.
                                </h1>
                                <p class="banner-body text-light py-News That Matters, Stories That Inspire.3 mx-0 px-0">
                                Tailor your news content with custom feeds, proprietary CustomWires, and criteria that fit your business needs. Distribute your content to top-tier, high-visibility platforms, ensuring maximum reach and engaged traffic to your online presence.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Service -->
    <section class="service-wrapper py-3">
        <div class="container-fluid pb-3">
            <div class="row d-flex justify-content-center text-center">
                <h3 class="spec-text my-color mt-3 display-5 mb-0 pt-5 pb-3 mx-0 px-0 light-300">
                Comprehensive Media Solutions</h3>
                <p class="col-lg-4">Offering premium content distribution, real-time analytics, and expert support to maximize visibility and engagement.</p>
            </div>
        </div>

        <div class="row justify-content-center d-flex">

            <div class="col-md-10">

                <div class="row">
                    
                    <div class="col-md-4 p-4">
                        <div class="cardx py-4 px-4">
                        <i class="fas service-icon fa-chart-line"></i>
                            <h4 class="mt-4 fw-bold mb-3 my-color">Boost Revenue</h4>
                            <p>Combine multiple media platforms to distribute content efficiently and maximize sales for higher earnings.</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <div class="cardx py-4 px-4">
                            <i class="fas service-icon fa-network-wired"></i>
                            <h4 class="mt-4 fw-bold mb-3 my-color">Content Distribution</h4>
                            <p>Share your content across targeted networks to reach specific audiences and demographics.</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <div class="cardx py-4 px-4">
                        <i class="fas service-icon fa-newspaper"></i>
                            <h4 class="mt-4 fw-bold mb-3 my-color">Wide-Ranging Coverage</h4>
                            <p>Providing news from various sectors, including politics, economy, lifestyle, and entertainment.</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <div class="cardx py-4 px-4">
                        <i class="fas service-icon fa-star"></i>
                            <h4 class="mt-4 fw-bold mb-3 my-color">Top-Tier Publications</h4>
                            <p>Ensure your press release is featured in exclusive publications that don't accept submissions from unknown sources.</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <div class="cardx py-4 px-4">
                        <i class="fas service-icon fa-chart-bar"></i>
                            <h4 class="mt-4 fw-bold mb-3 my-color">Live Analytics</h4>
                            <p>Track audience engagement and performance metrics in real time to enhance your content strategy.</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <div class="cardx py-4 px-4">
                        <i class="fas service-icon fa-headset"></i>
                            <h4 class="mt-4 fw-bold mb-3 my-color">Expert Support</h4>
                            <p>Receive professional assistance in press release submission and content promotion for the right audience.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>



    </section>

    <!-- Start View Work -->
    <section class="bg-custom my-3">
        <div class="container py-5">
            <div class="row d-flex justify-content-center text-center">
                <h4 class="spec-text text-light display-5 mb-0 pt-5 pb-3 mx-0 px-0 light-300">
                Our Key Partners</h4>
                    <p class="text-light">Quis ipsum suspendisse ultrices gravida.</p>
                </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="w-50 d-flex justify-content-center my-3 py-5 text-light"><h3>ABC</h3></div>
                    <div class="w-50 d-flex justify-content-center my-3 py-5 text-light"><h3>ABC</h3></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="w-50 d-flex justify-content-center my-3 py-5 text-light"><h3>ABC</h3></div>
                    <div class="w-50 d-flex justify-content-center my-3 py-5 text-light"><h3>ABC</h3></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="w-50 d-flex justify-content-center my-3 py-5 text-light"><h3>ABC</h3></div>
                    <div class="w-50 d-flex justify-content-center my-3 py-5 text-light"><h3>ABC</h3></div>
                </div>
            </div>
        </div>

    </section>
    <!-- End View Work -->


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