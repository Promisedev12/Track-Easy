<x-layout>
    <!-- Header Start -->
    <div style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
        url({{ Vite::asset('resources/img/header.jpg') }});"
        class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1 class="text-white display-3">About</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="/">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">About</p>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- About Start -->
    <x-abouUs></x-abouUs>
    <!-- About End -->
    <!-- Features Start -->
    <x-features></x-features>
    <!-- Features End -->

</x-layout>
