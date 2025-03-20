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
    <link href="{{ asset('css/test-header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/test-nav-preview.css') }}" rel="stylesheet">
    <link href="{{ asset('css/test-live-sites.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Control Dashboard</title>
</head>

<body>
    <div class="main-wrapper">
        @component('components.navbar')
        @endcomponent

        <div class="p-4 d-flex justify-content-center align-items-center">
            <div class=" col-lg-10">

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
                            <div class="text-white mx-2 " onclick="window.location.href='/headers'">/ Headers</div>
                            <div class="text-white">/ Edit</div>
                        </div>
                    </div>
                </div>

                <div class="back-card p-5">
                <div class="d-flex justify-content-center">
                        <h3 class="mb-3 text-light">Edit {{$header->name}}</h3>
                    </div>

                <form id="addHeaderForm" action="{{ route('headers.update', ['header_id' => $header->dataid]) }}" method="POST"
                        onsubmit="submitAddHeader(event)">
                        @csrf
                        <input type="hidden" id="addheaderId" name="header_id">
                        <div class="mb-3">
                            <label for="headerName" class="form-label text-secondary">Header Name<span class="mx-1 text-danger">*</span></label>
                            <input type="text" class="form-control no-white-input" id="addheaderName" name="name" value="{{ $header->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="headerDescription" class="form-label text-secondary">Description<span class="mx-1 text-danger">*</span></label>
                            <textarea class="form-control no-white-input" id="addheaderDescription" name="description" required>{{ $header->description }}</textarea>
                        </div>

                        <h6 class="text-secondary mt-4">Websites Using This Header</h6>
                        <div id="websitesList" class="d-flex justify-content-start align-items-center flex-wrap mb-3">
                            @foreach ($websites as $website)
                                @php
                                    $isChecked = in_array($website->id, $header->websites->pluck('id')->toArray());
                                    $isDisabled = $website->data_id && $website->data_id != $header->dataid;
                                @endphp
                                <div class="form-check m-2">
                                    <input id="{{ $website->id }}site" class="form-check-input" type="checkbox" name="websites[]" value="{{ $website->id }}" {{ $isChecked ? 'checked' : '' }} {{ $isDisabled ? 'disabled' : '' }}>
                                    <label for="{{ $website->id }}site" class="form-check-label">{{ $website->site_name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <hr class="my-4" />

                        <h6 class="text-secondary">Navbar Links<span class="mx-1 text-danger">*</span></h6>
                        <div id="addlinksList" class="mb-3 d-flex justify-content-start align-items-center flex-wrap">
                            <!-- Navbar checkboxes will be inserted here dynamically -->
                        </div>

                        <div class="d-flex justify-content-center my-3">
                            <button type="submit" class="btn-success btn">Save Changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
    let allLinks = ['Home', 'About', 'Press Release', 'Contact']; // Replace with dynamic data
    let headerLinks = {!! json_encode(json_decode($header->header_links)) !!}; // Get header links from PHP

    let linksList = document.getElementById("addlinksList");
    linksList.innerHTML = "";
    allLinks.forEach(link => {
        let isChecked = headerLinks.includes(link) ? 'checked' : '';
        linksList.innerHTML += `<div class="m-2 form-check">
            <input class="form-check-input" type="checkbox" id="${link}Link" name="links[]" value="${link}" ${isChecked}>
            <label for="${link}Link" class="form-check-label">${link}</label>
        </div>`;
    });

    function submitAddHeader(e) {
        e.preventDefault(); // Prevent the form from submitting by default

        // Get all the checked navbar links
        const checkedLinks = document.querySelectorAll('#addlinksList input[type="checkbox"]:checked');

        // Check if no links are selected
        if (checkedLinks.length === 0) {
            alert("Please select at least one navbar link."); // Show an error message
            return; // Stop the function execution
        }

        // If at least one link is selected, submit the form
        document.getElementById("addHeaderForm").submit();
    }
    </script>

</body>

</html>