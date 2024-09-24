<x-layout>
    <x-header>
        <h1 class="text-primary mb-4">Safe & Faster</h1>
        <h1 class="text-white display-3 mb-5">Logistics Services</h1>
        <div class="mx-auto" style="width: 100%; max-width: 600px">
            <div class="input-group">
                <input type="text" class="form-control border-light" style="padding: 30px" placeholder="Tracking Id"
                    form="track" name="trackingNumber" />

                <div class="input-group-append">
                    <button form="track" type="submit" class="btn btn-primary px-3 pt-3">Track & Trace</button>
                </div>

            </div>
            <x-form-error name='trackingNumber'></x-form-error>
        </div>
        <form method="get" action="/track" id="track">
            @csrf
        </form>
    </x-header>
    <section class="container py-5">
        <h2 class="text-danger">
            No items found with the tracking number you provided. Please make sure its correct or contact your supplier
        </h2>
    </section>
</x-layout>
