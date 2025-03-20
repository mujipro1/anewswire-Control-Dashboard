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
    <link href="{{ asset('css/test-global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet ">
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
                            <a class="nav-link  link-active text-white mx-3" href="#">Articles</a>
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


    <div class="d-flex justify-content-center main-wrapper pt-5">
        <div class="col-lg-10 pt-5 text-white"> 

            <div class="data-">
                @foreach($articles as $index => $article)
                <div class="items-card" onclick="handleBlogClick({{ $article['id'] }})">
                    <div class="row">
                        <div class="col-md-4 pt-2">
                            @if (!empty($article['image_link']) && str_contains($article['image_link'], 'http'))
                            <img src="{!! $article['image_link'] !!}" class=" modal-img" />
                            @else
                            <img src="
                                    https://images.unsplash.com/photo-1710503915593-9801b71740fc?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class=" modal-img" />

                            @endif
                        </div>
                        <div class="col-md-8 px-4">

                            <!-- Set unique IDs for each article -->
                            <h3 id="article-title-{{$article['id']}}" class="title-article">
                                {{ $article['title'] }}
                            </h3>
                            <p id="article-date-{{$article['id']}}">
                                {{ date('D, d M Y', strtotime($article['pub_date'])) }}
                            </p>
                            <p id="article-description-{{$article['id']}}">
                                {{ \Illuminate\Support\Str::words($article['description'], 50, '...') }}</p>

                            <div id="article-categories-{{$article['id']}}" class="">
                                @foreach(json_decode($article['categories'], true) as $cat)
                                <div class="cat-card">{{ $cat }}</div>
                                @endforeach
                            </div>

                            <div id="article-content-{{$article['id']}}" style="display: none;">
                                {!! $article['content'] !!}
                            </div>
                            <div id="article-img-{{$article['id']}}" style="display: none;">
                                {!! $article['image_link'] !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Isotope -->

</body>

<script>
    const handleBlogClick = (id) => {
        window.location.href = `/home/article/${id}`;
    }
</script>

</html>
