<x-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css"
        integrity="sha512-Zcn6bjR/8RZbLEpLIeOwNtzREBAJnUKESxces60Mpoj+2okopSAcSUIUOseddDm0cxnGQzxIR7vJgsLZbdLE3w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Leaflet JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"
        integrity="sha512-BwHfrr4c9kmRkLw6iXFdzcdWV/PGkVgiIyIWLLlTSXzWQzxuSg4DiQUCpauz/EWjgk5TYQqX/kvn9pG1NpYfqg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <div id="map" style="height: 50vh; max-height: 400px; width: 100%; margin-bottom: 20px;"></div>
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
                    <label class="text-primary">Departure Location </label>
                    <h2 id="departLoc">{{ $order['departureLocation'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Current Location </label>
                    <h2 id="currentLoc">{{ $order['CurrentLocation'] }}</h2>
                </div>
            </div>
            <div class="col-12 col-sm-4 my-3">
                <div class="input-block local-forms">
                    <label class="text-primary">Destination </label>
                    <h2 id="destination">{{ $order['Destination'] }}</h2>
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
    <script>
        async function app() {

            async function getCoordinate(location) {
                const response = await fetch(
                    `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(location)}&format=json&limit=1`
                );

                const data = await response.json();

                if (data.length === 0) {
                    console.error("Location not found!");
                    return null;
                }

                const latitude = parseFloat(data[0].lat);
                const longitude = parseFloat(data[0].lon);

                return [latitude, longitude];
            }
            //testing
            // const coordinate = await getCoordinate('USA New York');
            // console.log(coordinate);

            const deparLoc = document.getElementById('departLoc').textContent;
            const currentLoc = document.getElementById('currentLoc').textContent;
            const destinationLoc = document.getElementById('destination').textContent;
            console.log(deparLoc, currentLoc, destinationLoc);

            const departureLocation = await getCoordinate(deparLoc) || [10.8505,
                76.2711
            ];
            const currentLocation = await getCoordinate(currentLoc) || [11.0168,
                76.9558
            ]; // Replace with order['CurrentLocation'] coords
            const destination = await getCoordinate(destinationLoc) || [12.9716,
                77.5946
            ]; // Replace with order['Destination'] coords



            // Initialize the map
            const map = L.map('map').setView(currentLocation, 6); // Zoom level 6 to view paths

            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Markers for locations
            const departureMarker = L.circleMarker(departureLocation, {
                    color: 'blue',
                    radius: 8
                }).addTo(map)
                .bindPopup("Departure Location").openPopup();

            const currentMarker = L.marker(currentLocation, {
                icon: L.icon({
                    iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [0, -41]
                })
            }).addTo(map).bindPopup("Current Location").openPopup();

            const destinationMarker = L.circleMarker(destination, {
                    color: 'blue',
                    radius: 8
                }).addTo(map)
                .bindPopup("Destination").openPopup();

            // Paths
            // Green dashed line from departure to current location
            L.polyline([departureLocation, currentLocation], {
                color: 'green',
                weight: 8,
                dashArray: '10, 10' // Dashed line style
            }).addTo(map);

            // Solid red line from current location to destination
            L.polyline([currentLocation, destination], {
                color: 'red',
                weight: 8
            }).addTo(map);

            // Custom icon for the package at the current location
            const packageIcon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/2942/2942497.png', // New package icon URL
                iconSize: [32, 32], // Adjust size as needed
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            });


            // Replace the current location marker with the package icon
            L.marker(currentLocation, {
                icon: packageIcon
            }).addTo(map).bindPopup("Package Location").openPopup();

            // Fit map bounds to include all locations
            const bounds = L.latLngBounds([departureLocation, currentLocation, destination]);
            map.fitBounds(bounds);



        }
        app();
    </script>
</x-layout>
