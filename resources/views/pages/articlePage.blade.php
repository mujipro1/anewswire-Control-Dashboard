<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill/dist/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

    <link href="{{ asset('css/test-global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet ">

    <title>Control Dashboard</title>
</head>

<body>
    <div class="main-wrapper pb-5" style="minheight: 100vh, height: 100%, margin:0;">
        @component('components.navbar')
        @endcomponent

        <div class="container">


            <div class="d-flex justify-content-center">
                <div class="col-md-11 mt-1">

                    <div class="alpha-wrap cursor-pointer m-2">
                        <div class="d-flex justify-content-start">
                            <div class="icon" onclick="window.location.href='/home'">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="15"
                                    height="15">
                                    <path
                                        d="M22,5.724V2c0-.552-.447-1-1-1s-1,.448-1,1v2.366L14.797,.855c-1.699-1.146-3.895-1.146-5.594,0L2.203,5.579c-1.379,.931-2.203,2.48-2.203,4.145v9.276c0,2.757,2.243,5,5,5h2c.553,0,1-.448,1-1V14c0-.551,.448-1,1-1h6c.552,0,1,.449,1,1v9c0,.552,.447,1,1,1h2c2.757,0,5-2.243,5-5V9.724c0-1.581-.744-3.058-2-4Z" />
                                </svg>
                            </div>
                            <div style="transform: translateY(2px);" class="d-flex justify-content-center">
                                <div onclick="window.location.href='/data'" class="text-white mx-2 ">/ RSS Data</div>
                                <div class="text-white ">/ Article</div>
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
</body>

<script>
    document.querySelectorAll(".imp-white span").forEach(span => {
    span.style.color = "";
    span.style.setProperty("color", "white", "important");
    span.style.setProperty("background-color", "transparent", "important");
});

</script>
</html>
