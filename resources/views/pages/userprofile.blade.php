<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill/dist/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('css/test-global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/test-home.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Control Dashboard</title>
</head>

<body>
    <div class="main-wrapper">
        @component('components.navbar')
        @endcomponent

        <div class="container d-flex justify-content-center mt-5">
            <div class="col-md-6">

                <div class="data-card px-5 p-4 shadow-sm">
                    <h3 class="text-center mb-4">User Profile</h3>
                    <form method="POST" action="{{ route('update-profile') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="new_password" name="new_password"
                                    required>
                            </div>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p style="color:red;">{{ $error }}</p>
                            @endforeach
                        @endif
                        <!-- check sucess -->
                        @if (session('success'))
                            <p style="color:green;">{{ session('success') }}</p>
                        @endif

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Update Profile</button>
                        </div>
                    </form>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="mt-3">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-success">Logout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>