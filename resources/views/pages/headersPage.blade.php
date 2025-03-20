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
                        <div class="icon" onclick="window.location.href='/home'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="15"
                                height="15">
                                <path
                                    d="M22,5.724V2c0-.552-.447-1-1-1s-1,.448-1,1v2.366L14.797,.855c-1.699-1.146-3.895-1.146-5.594,0L2.203,5.579c-1.379,.931-2.203,2.48-2.203,4.145v9.276c0,2.757,2.243,5,5,5h2c.553,0,1-.448,1-1V14c0-.551,.448-1,1-1h6c.552,0,1,.449,1,1v9c0,.552,.447,1,1,1h2c2.757,0,5-2.243,5-5V9.724c0-1.581-.744-3.058-2-4Z" />
                            </svg>
                        </div>
                        <div style="transform: translateY(2px);" class="d-flex justify-content-center">
                            <div class="text-white mx-2 ">/ Headers</div>
                        </div>
                    </div>
                </div>
                
                <div class="back-card">

                <div class="d-flex add-sites-parent justify-content-center align-items-center flex-column my-2">
                    <h3 class="text-light fw-bold my-2">Headers</h3>
                    <button class="btn-success add-sites-button" data-bs-toggle="modal"
                        data-bs-target="#addSiteModal"
                        onclick="window.location.href='/headers/add'"
                        >Add Header +</button>
                </div>

                <div class="d-flex justify-content-center align-items-center my-4">
                    <div class="col-lg-12 p-4">
                        <div class="row">
                            @foreach($headers as $header)
                            <div class="header-card mb-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h4>{{$header->name}}</h4>
                                        <div class="text-secondary" style="transform:translateY(-10px)">
                                            {{$header->description}}
                                        </div>
                                    </div>
                                    <div class='mt-2 d-flex justify-content-end'>
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="cursor:pointer" height="20"
                                                onclick="openEditModal('{{$header->dataid}}')"
                                                width="20" fill='white' id="Layer_1" data-name="Layer 1"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M22.987,5.452c-.028-.177-.312-1.767-1.464-2.928-1.157-1.132-2.753-1.412-2.931-1.44-.237-.039-.479,.011-.682,.137-.071,.044-1.114,.697-3.173,2.438,1.059,.374,2.428,1.023,3.538,2.109,1.114,1.09,1.78,2.431,2.162,3.471,1.72-2.01,2.367-3.028,2.41-3.098,.128-.205,.178-.45,.14-.689Z" />
                                                <path
                                                    d="M12.95,5.223c-1.073,.968-2.322,2.144-3.752,3.564C3.135,14.807,1.545,17.214,1.48,17.313c-.091,.14-.146,.301-.159,.467l-.319,4.071c-.022,.292,.083,.578,.29,.785,.188,.188,.443,.293,.708,.293,.025,0,.051,0,.077-.003l4.101-.316c.165-.013,.324-.066,.463-.155,.1-.064,2.523-1.643,8.585-7.662,1.462-1.452,2.668-2.716,3.655-3.797-.151-.649-.678-2.501-2.005-3.798-1.346-1.317-3.283-1.833-3.927-1.975Z" />
                                            </svg>
                                        </span>

                                        @if (!($header->name == 'Default Header'))
                                        <span class="mx-2">
                                            <svg fill="white" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                                x="0px" y="0px" viewBox="0 0 512 512"
                                                style="enable-background:new 0 0 512 512;" xml:space="preserve"
                                                width="20" height="20"
                                                onclick="openDeleteModal('{{$header->dataid}}', {{$header->websites->isNotEmpty()}})">
                                                <g>
                                                    <path
                                                        d="M448,85.333h-66.133C371.66,35.703,328.002,0.064,277.333,0h-42.667c-50.669,0.064-94.327,35.703-104.533,85.333H64   c-11.782,0-21.333,9.551-21.333,21.333S52.218,128,64,128h21.333v277.333C85.404,464.214,133.119,511.93,192,512h128   c58.881-0.07,106.596-47.786,106.667-106.667V128H448c11.782,0,21.333-9.551,21.333-21.333S459.782,85.333,448,85.333z    M234.667,362.667c0,11.782-9.551,21.333-21.333,21.333C201.551,384,192,374.449,192,362.667v-128   c0-11.782,9.551-21.333,21.333-21.333c11.782,0,21.333,9.551,21.333,21.333V362.667z M320,362.667   c0,11.782-9.551,21.333-21.333,21.333c-11.782,0-21.333-9.551-21.333-21.333v-128c0-11.782,9.551-21.333,21.333-21.333   c11.782,0,21.333,9.551,21.333,21.333V362.667z M174.315,85.333c9.074-25.551,33.238-42.634,60.352-42.667h42.667   c27.114,0.033,51.278,17.116,60.352,42.667H174.315z" />
                                                </g>
                                            </svg>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="preview-cont">
                                    <div class="mt-3 mx-3">Preview</div>
                                    <div class="preview-div">
                                        <div class="navbar-desktop">
                                            <div class="d-flex justify-content-center w-100">
                                                <div class="col-lg-10 d-flex border-b m-0 justify-content-between">
                                                    <div class="mt-2">
                                                        <img src="{{ asset('images/logo.png') }}" alt="logo"
                                                            height="60px">
                                                    </div>
                                                    <div class="navbar-items d-flex justify-content-center">
                                                        @php
                                                            $headerLinks = is_string($header->header_links) ? json_decode($header->header_links) : $header->header_links;
                                                        @endphp
                                                        @foreach ($headerLinks as $link)
                                                            <div style="font-size:medium" class="navbar-i px-3">{{ $link }}</div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="mt-5 my-3">Websites Using <i>{{$header->name}}</i></h6>
                                <div class="row-web-cards mb-3 d-flex flex-wrap">
                                    @if ($header->websites->isNotEmpty())
                                    @foreach ($header->websites as $website)
                                    <div class="web-card">
                                        {{$website->site_name}}
                                    </div>
                                    @endforeach
                                    @else
                                    <p class="text-secondary">No websites are using this header.</p>
                                    @endif
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Header Modal -->
    <div class="modal fade" id="deleteHeaderModal" tabindex="-1" aria-labelledby="deleteHeaderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteHeaderModalLabel">Delete Header</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="deleteHeaderMessage"></p>
                </div>
                <div class="modal-footer">
                    <form id="deleteHeaderForm" action="{{ route('headers.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="deleteHeaderId" name="header_id">
                        <button type="submit" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
function openEditModal(headerId) {
    window.location.href="/headers/edit/" + headerId;
}
function openDeleteModal(headerId, hasWebsites) {
    document.getElementById("deleteHeaderId").value = headerId;
    const messageElement = document.getElementById("deleteHeaderMessage");
    const confirmButton = document.getElementById("confirmDeleteButton");

    if (hasWebsites) {
        messageElement.textContent = "This header is linked with websites. Please remove all websites before deleting this header.";
        confirmButton.style.display = "none";
    } else {
        messageElement.textContent = "Are you sure you want to delete this header?";
        confirmButton.style.display = "block";
    }

    var modal = new bootstrap.Modal(document.getElementById("deleteHeaderModal"));
    modal.show();
}
</script>

</body>

</html>