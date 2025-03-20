<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/quill/dist/quill.min.js"></script>

    <link href="{{ asset('css/test-global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/test-live-sites.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* add border radus to quill*/
        .ql-container {
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0 0 10px 10px;
        }
        .ql-editor {
            border: 1px solid rgba(255, 255, 255, 0.1);
            background-color: rgba(255, 255, 255, 0.11);
            color: white;
            min-height: 150px;
            border-radius: 0 0 10px 10px;            
        }
        .ql-toolbar {
            border-radius: 10px 10px 0 0;            
            color: white;
        }
        .ql-toolbar .ql-picker-label,
        .ql-toolbar .ql-picker-item {
            color: white;
        }
        .ql-toolbar .ql-stroke {
            stroke: white;
        }
        .ql-toolbar .ql-fill {
            fill: white;
        }
        .ql-toolbar .ql-picker-options {
            background-color: rgb(52, 35, 58);
            color: white;
        }
        .ql-toolbar .ql-picker-options .ql-picker-item {
            color: white;
        }
    </style>

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
                            <div class="text-white mx-2" onclick="window.location.href='/websites'">/ Websites</div>
                            <div class="text-white ">{{$isEdit == 1 ? '/ Edit' : '/ Add'}}</div>
                        </div>
                    </div>
                </div>
                
                <div class="back-card p-5">
                    <div class="d-flex justify-content-center">
                        <h3 class="mb-3 text-light">{{$isEdit == 1 ? 'Edit '.$website->site_name : 'Add New Website'}}</h3>
                    </div>
                
                <form id="siteForm" action="{{ $isEdit == 1 ? route('sites.edit') : route('sites.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="edit_site_id" name="site_id" value="{{$isEdit == 1 ? $website->id : ''}}">

                        <div class="mb-3">
                            <label for="edit_site_name" class="form-label text-secondary">Site Name<span class="mx-1 text-danger">*</span></label>
                            <input type="text" class="form-control no-white-input" id="edit_site_name" 
                            value="{{$isEdit == 1 ? $website->site_name : ''}}" name="site_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_link" class="form-label text-secondary">Link<span class="mx-1 text-danger">*</span></label>
                            <input type="text" class="form-control no-white-input" id="edit_link" name="link" 
                            value="{{$isEdit == 1 ? $website->link : ''}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_email" class="form-label text-secondary">Contact Email<span class="mx-1 text-danger">*</span></label>
                            <input type="email" class="form-control no-white-input" id="contact_email" name="contact_email" 
                            value="{{$isEdit == 1 ? $website->email : ''}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_num" class="form-label text-secondary">Contact Number<span class="mx-1 text-danger">*</span></label>
                            <input type="text" class="form-control no-white-input" id="contact_num" name="contact_num" 
                            value="{{$isEdit == 1 ? $website->phone : ''}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label text-secondary">Address<span class="mx-1 text-danger">*</span></label>
                            <input type="text" class="form-control no-white-input" id="address" name="address" 
                            value="{{$isEdit == 1 ? $website->address : ''}}" required></input>
                        </div>

                        <div class="my-5">
                            <label for="gtm" class="form-label text-secondary">Google Tag Manager ID<span class="mx-1 text-danger">*</span></label>
                            <div class="d-flex justify-content-start align-items-center">
                                <spam class='text-secondary mx-2'>GTM&nbsp;-</spam>
                                <input type="text" class="form-control no-white-input" id="gtm" name="gtm" 
                                value="{{$isEdit == 1 ? $website->gtm : ''}}" required></input>
                            </div>
                        </div>

                        
                        <div class="my-5">
                            <label for="logo" class="form-label text-secondary">Logo<span class="mx-1 text-danger">*</span></label>
                            <input type="file" class="form-control no-white-input" id="logo" name="logo">
                        </div>

                        <div class="my-5">
                            <label class="form-label text-secondary">About Us<span class="mx-1 text-danger">*</span></label>
                            <div id="edit_editor_container"></div>
                            <input type="hidden" name="about_us" id="edit_aboutUsInput"
                            value="{{$isEdit == 1 ? $website->about_us : ''}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary">Categories<span class="mx-1 text-danger">*</span></label>
                            <div class="row" id="edit_categories_container">
                                @foreach($_categories->sortBy('name') as $category)
                                <div class="col-12 col-md-6 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input edit-category-checkbox" type="checkbox"
                                            name="categories[]" value="{{ $category->name }}"
                                            id="edit-cat-{{ $loop->index }}">
                                        <label class="form-check-label" for="edit-cat-{{ $loop->index }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn my-4 btn-success">{{$isEdit == 1 ? 'Save Changes' : 'Add Website'}}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
    // Initialize Quill editors
    var editQuill = new Quill('#edit_editor_container', {
        theme: 'snow'
    });

    // Populate hidden input before submitting the form
    document.getElementById("siteForm").onsubmit = function(event) {
        document.getElementById("edit_aboutUsInput").value = editQuill.root.innerHTML;

        // Ensure at least one category is selected
        let categoryChecked = false;
        document.querySelectorAll('.edit-category-checkbox').forEach(checkbox => {
            if (checkbox.checked) {
                categoryChecked = true;
            }
        });

        if (!categoryChecked) {
            alert('Please select at least one category.');
            event.preventDefault();
        }

        // Ensure logo is uploaded
        let logoInput = document.getElementById("logo");
        if (logoInput.files.length === 0) {
            alert('Please upload a logo.');
            event.preventDefault();
        }
    };

    // Pre-check categories and set Quill editor content if editing
    document.addEventListener('DOMContentLoaded', function() {
        @if($isEdit == 1)
        let selectedCategories = @json($website->categories);
        document.querySelectorAll('.edit-category-checkbox').forEach(checkbox => {
            if (selectedCategories.includes(checkbox.value)) {
                checkbox.checked = true;
            }
        });
        editQuill.root.innerHTML = @json($website->about_us);
        @endif
    });
    </script>

</body>

</html>