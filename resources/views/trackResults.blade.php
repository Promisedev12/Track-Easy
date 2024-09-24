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
        <div class="row">
            <div class="col-12"></div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Tracking Number <span class="login-danger">*</span></label>
                    <h2>{{ $order['trackinNum'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Name <span class="login-danger">*</span></label>
                    <h2>{{ $order['name'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Number of items <span class="login-danger">*</span></label>
                    <h2>{{ $order['numItems'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Items <span class="login-danger">*</span></label>
                    <h2>{{ $order['items'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms calendar-icon">
                    <label class="text-primary">Total Weight<span class="login-danger">*</span></label>
                    <h2>{{ $order['totalWeight'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Destination </label>
                    <h2>{{ $order['Destination'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Departure Date <span class="login-danger">*</span></label>
                    <h2>{{ $order['depatureDate'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Arival date<span class="login-danger">*</span></label>
                    <h2>{{ $order['arivalDate'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Status<span class="login-danger">*</span></label>
                    <h2>{{ $order['status'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Owners's Name <span class="login-danger">*</span></label>
                    <h2>{{ $order['customerName'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Owners's Email<span class="login-danger">*</span></label>
                    <h2>{{ $order['customerEmail'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Owners's Location<span class="login-danger">*</span></label>
                    <h2>{{ $order['customerLocation'] }}</h2>
                </div>
            </div>

            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Owners's Phone Number</label>
                    <h2>{{ $order['customerPhoneNum'] }}</h2>
                </div>
            </div>
        </div>
    </section>
</x-layout>
