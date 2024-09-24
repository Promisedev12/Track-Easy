    <!-- Header Start -->
    <div style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
        url({{ Vite::asset('resources/img/header.jpg') }});"
        class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">

            {{ $slot }}
        </div>
    </div>
    <!-- Header End -->
