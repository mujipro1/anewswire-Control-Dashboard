<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel with Bootstrap</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/news.css')}}" rel="stylesheet">
    <link href="{{asset('css/videos.css')}}" rel="stylesheet">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="row header">
            @component('components.topBar')
            @endcomponent

            @component('components.logoBar')
            @endcomponent

            @component('components.navBar')
            @endcomponent
        </div>
        <div class="row m-0 p-0">
            <div class="col-md-7 offset-md-1">
                @component('news')
                @slot('panel')
                    NEWS
                @endslot
                @endcomponent

                @component('news')
                @slot('panel')
                    PRESS
                @endslot
                @endcomponent

            </div>
            <div class="col-md-3">
                @component('videos')
                @endcomponent
            </div>
        </div>
    </div>
</body>
</html>
