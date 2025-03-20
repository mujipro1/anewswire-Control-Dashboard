<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill/dist/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('css/test-global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/test-home.css') }}" rel="stylesheet">
    <title>Control Dashboard</title>
</head>
<body>
    <div class="main-wrapper">
        @component('components.navbar')
        @endcomponent

        <div class="d-flex justify-content-center align-items-center flex-column my-4">
            <div class="row d-flex justify-content-center align-items-center home-row">
                <div class="home-card my-2 mx-3" onclick="onClickRSSData()">
                    <h4>RSS Data</h4>
                </div>
                <div class="home-card my-2 mx-3" onclick="onClickWebsites()">
                    <h4>Websites</h4>
                </div>
                <div class="home-card my-2 mx-3" onclick="onClickHeaders()">
                    <h4>Headers</h4>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<script>

    const onClickRSSData = () => {
        window.location.href = '/data';
    }
    const onClickWebsites = () => {
        window.location.href = "/websites"
    }
    const onClickHeaders = () => {
        window.location.href = "/headers"
    }
    
</script>