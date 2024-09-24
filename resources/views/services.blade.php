<x-layout>
    <!-- Header Start -->
    <div style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
        url({{ Vite::asset('resources/img/header.jpg') }});"
        class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1 class="text-white display-3">Service</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="/">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Service</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Services Start -->
    <x-services></x-services>
    <!-- Services End -->
    <!--  Quote Request Start -->
    <x-quoteReques></x-quoteReques>
    <!-- Quote Request Start -->
    <!-- Testimonial Start -->
    <x-testimonial></x-testimonial>
    <!-- Testimonial End -->

</x-layout>
