<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/js/script.js', '', 'resources/css/bootstrap2.css'])
    <title>Log In</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 m-auto bg-white">
                <h1 class="text-center pt-3">Register</h1>

                <form action="/register" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input required type="text" value="{{ old('name') }}" placeholder="name"
                            class="form-control" name="name" />
                    </div>
                    <x-form-error name="name"></x-form-error>
                    <div class="input-group mb-3">
                        <input required type="email" value="{{ old('email') }}" placeholder="email"
                            class="form-control" name="email" />
                    </div>
                    <x-form-error name="email"></x-form-error>
                    <div class="input-group mb-3">
                        <input required type="password" placeholder="Password" class="form-control" name="password" />

                    </div>
                    <x-form-error name="password"></x-form-error>

                    <div class="d-grid">
                        <button type="submit" name="login" class="btn btn-primary">Log In</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
