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
                    <a class="nav-link text-white" href="{{route('about')}}">About</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link text-white link-active" href="{{route('releases')}}">Articles</a>
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

    <div class="main-wrapper pb-5" style="minheight: 100vh, height: 100%, margin:0;">
        <div class="container pt-5">
            <div class="d-flex pt-4 justify-content-center">
                <div class="col-md-11 mt-1">

                    <div class="alpha-wrap cursor-pointer m-2">
                        <div class="d-flex justify-content-start">
                            <div class="icon" onclick="window.location.href='/'">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="15"
                                    height="15">
                                    <path
                                        d="M22,5.724V2c0-.552-.447-1-1-1s-1,.448-1,1v2.366L14.797,.855c-1.699-1.146-3.895-1.146-5.594,0L2.203,5.579c-1.379,.931-2.203,2.48-2.203,4.145v9.276c0,2.757,2.243,5,5,5h2c.553,0,1-.448,1-1V14c0-.551,.448-1,1-1h6c.552,0,1,.449,1,1v9c0,.552,.447,1,1,1h2c2.757,0,5-2.243,5-5V9.724c0-1.581-.744-3.058-2-4Z" />
                                </svg>
                            </div>
                            <div style="transform: translateY(2px);" class="d-flex justify-content-center">
                                <div onclick="window.location.href='/articles'" class="text-white mx-2 ">/ Articles</div>
                                <div class="text-white ">/ </div>
                            </div>
                        </div>
                    </div>

                    <div class="items-card mt-0">
                        <div class="text-light px-4">
                            <div class="my-2 text-center">
                                <img src="{{ $article->image_link }}" class="img-fluid my-4 rounded-4
                        
                        " alt="Article Image" />
                            </div>
                            <h3 class="mt-4 mb-3">{{ $article->title }}</h3>
                            <p class="text-secondary">
                                {{ date('D, d M Y', strtotime($article['pub_date'])) }}
                            </p>
                            <div class="mb-3">
                                @foreach(json_decode($article->categories) as $category)
                                <div class="cat-card">{{ $category }}</div>
                                @endforeach
                            </div>
                            <p class='text-light text-justify imp-white'>{{ $article->description }}</p>
                            <div class='text-light text-justify imp-white'>{!! $article->content !!}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <script>
        document.querySelectorAll(".imp-white span").forEach(span => {
        span.style.color = "";
        span.style.setProperty("color", "white", "important"); 
        span.style.setProperty("background-color", "transparent", "important");
    });

</script>
</body>
</html>
