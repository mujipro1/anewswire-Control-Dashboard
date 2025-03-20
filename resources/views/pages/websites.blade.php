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
                            <div class="text-white mx-2 ">/ Websites</div>
                        </div>
                    </div>
                </div>
                
                <div class="back-card">
                <div class="d-flex add-sites-parent justify-content-center align-items-center flex-column my-2">
                    <h3 class="text-light fw-bold my-2">Live Websites</h3>
                    <button class="btn-success add-sites-button" onclick="window.location.href='/sites/new'">Add Website +</button>
                </div>

                <div class="d-flex justify-content-center align-items-center my-4">
                    <div class="col-12 p-4">

                        <div class="row">
                            @foreach($websites as $website)
                            <div class="col-lg-4 p-2">
                                <div class="website-card d-flex align-items-center row m-0">
                                    <div class="col-3">
                                        <div class="">
                                        <img src="{{ url('/sites/logo/' . $website->id) }}" alt="logo" width="100%">
                                        </div>
                                    </div>
                                    <div class="col-7 d-flex justify-content-center mt-2 flex-column">
                                        <h5>{{$website->site_name}}</h5>
                                        <div class="{{ optional($website->websiteData)->name ? '' : 'text-danger' }}"
                                            style="transform:translateY(-10px);">
                                            {{ optional($website->websiteData)->name ?? 'Attach Header' }}
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" style="cursor:pointer" height="20"
                                                onclick="window.location.href='/sites/edit/{{$website->id}}'"
                                                width="20" fill='white' id="Layer_1" data-name="Layer 1"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M22.987,5.452c-.028-.177-.312-1.767-1.464-2.928-1.157-1.132-2.753-1.412-2.931-1.44-.237-.039-.479,.011-.682,.137-.071,.044-1.114,.697-3.173,2.438,1.059,.374,2.428,1.023,3.538,2.109,1.114,1.09,1.78,2.431,2.162,3.471,1.72-2.01,2.367-3.028,2.41-3.098,.128-.205,.178-.45,.14-.689Z" />
                                                <path
                                                    d="M12.95,5.223c-1.073,.968-2.322,2.144-3.752,3.564C3.135,14.807,1.545,17.214,1.48,17.313c-.091,.14-.146,.301-.159,.467l-.319,4.071c-.022,.292,.083,.578,.29,.785,.188,.188,.443,.293,.708,.293,.025,0,.051,0,.077-.003l4.101-.316c.165-.013,.324-.066,.463-.155,.1-.064,2.523-1.643,8.585-7.662,1.462-1.452,2.668-2.716,3.655-3.797-.151-.649-.678-2.501-2.005-3.798-1.346-1.317-3.283-1.833-3.927-1.975Z" />
                                            </svg>
                                        </div>
                                        <div class=" mt-2 mb-2"
                                            onclick="confirmDelete('{{$website->site_name}}', '{{$website->id}}')">
                                            <svg fill="white" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                                x="0px" y="0px" viewBox="0 0 512 512"
                                                style="enable-background:new 0 0 512 512;" xml:space="preserve"
                                                width="20" height="20">
                                                <g>
                                                    <path
                                                        d="M448,85.333h-66.133C371.66,35.703,328.002,0.064,277.333,0h-42.667c-50.669,0.064-94.327,35.703-104.533,85.333H64   c-11.782,0-21.333,9.551-21.333,21.333S52.218,128,64,128h21.333v277.333C85.404,464.214,133.119,511.93,192,512h128   c58.881-0.07,106.596-47.786,106.667-106.667V128H448c11.782,0,21.333-9.551,21.333-21.333S459.782,85.333,448,85.333z    M234.667,362.667c0,11.782-9.551,21.333-21.333,21.333C201.551,384,192,374.449,192,362.667v-128   c0-11.782,9.551-21.333,21.333-21.333c11.782,0,21.333,9.551,21.333,21.333V362.667z M320,362.667   c0,11.782-9.551,21.333-21.333,21.333c-11.782,0-21.333-9.551-21.333-21.333v-128c0-11.782,9.551-21.333,21.333-21.333   c11.782,0,21.333,9.551,21.333,21.333V362.667z M174.315,85.333c9.074-25.551,33.238-42.634,60.352-42.667h42.667   c27.114,0.033,51.278,17.116,60.352,42.667H174.315z" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
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


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <strong id="websiteName"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <!-- Add a form for the delete action -->
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
    function confirmDelete(siteName, siteId) {
        document.getElementById('websiteName').innerText = siteName;

        // Set the form action URL
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/sites/${siteId}`; // Use the route defined in Step 1

        // Show the modal
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }
    </script>

</body>

</html>