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
    <div class="main-wrapper">
        @component('components.navbar')
        @endcomponent


        
        <div class="d-flex justify-content-center align-items-center flex-column my-2">
            @if(!(request()->has('site_id')))
            <div class="d-flex justify-content-center">
                <div class="col-md-10">

                    <div class="alpha-wrap cursor-pointer m-2">
                        <div class="d-flex justify-content-start">
                            <div class="icon" onclick="window.location.href='/home'">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="15" height="15"><path d="M22,5.724V2c0-.552-.447-1-1-1s-1,.448-1,1v2.366L14.797,.855c-1.699-1.146-3.895-1.146-5.594,0L2.203,5.579c-1.379,.931-2.203,2.48-2.203,4.145v9.276c0,2.757,2.243,5,5,5h2c.553,0,1-.448,1-1V14c0-.551,.448-1,1-1h6c.552,0,1,.449,1,1v9c0,.552,.447,1,1,1h2c2.757,0,5-2.243,5-5V9.724c0-1.581-.744-3.058-2-4Z"/></svg>
                            </div>
                            <div style="transform: translateY(2px);">

                                <div class="text-white mx-2 ">/ RSS Data</div>
                            </div>
                        </div>
                    </div>
                    <div class="data-card mt-0">
                        <div class="text-center">
                            <h3 class="fw-bold my-3">RSS Data</h3>
                        </div>
                        @foreach($articles as $index => $article)
                        <div class="items-card" onclick="handleBlogClick({{ $article['id'] }})">
                            <div class="row">
                                <div class="col-md-4 pt-2">
                                    @if (!empty($article['image_link']) && str_contains($article['image_link'], 'http'))
                                    <img src="{!! $article['image_link'] !!}" class=" modal-img" />
                                    @else
                                    <img src="
                                    https://images.unsplash.com/photo-1710503915593-9801b71740fc?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class=" modal-img" />

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
            @endif

        </div>
    </div>

</body>

</html>

<script>
    const handleBlogClick = (id) => {
        window.location.href = `/article/${id}`;
    }
</script>