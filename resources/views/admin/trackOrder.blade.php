<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    @vite(['resources/js/script.js', 'resources/css/bootstrap2.css', 'resources/css/style.css'])
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css"
        integrity="sha512-Zcn6bjR/8RZbLEpLIeOwNtzREBAJnUKESxces60Mpoj+2okopSAcSUIUOseddDm0cxnGQzxIR7vJgsLZbdLE3w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Leaflet JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"
        integrity="sha512-BwHfrr4c9kmRkLw6iXFdzcdWV/PGkVgiIyIWLLlTSXzWQzxuSg4DiQUCpauz/EWjgk5TYQqX/kvn9pG1NpYfqg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
    <div class="containers">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin Panel</h3>
                <button class="menu-close">
                    <i class="fas fa-x"></i>
                </button>
            </div>
            <ul class="nav-links">
                <li><a href="/admin">Dashboard</a></li>
                <li><a href="/admin/orders">Orders</a></li>
                <li><a href="/admin/orders/create">Create Order</a></li>
                <li><a href="/admin/orders/track">Tracking</a></li>
                <li><a href="/admin/settings">Account Settings</a></li>
                <li><button form="logout">Logout</button></li>
                <form action="/logout" id="logout" method="POST">
                    @csrf
                </form>
            </ul>
            <div class="theme-toggle">
                <label class="switch">
                    <input type="checkbox" id="themeSwitch" />
                    <span class="slider"></span>
                </label>
                <span id="modeText">Light Mode</span>
            </div>
        </nav>

        <!-- Main Content -->
        <div id="main-content">
            <header>
                <button id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h2>Welcome {{ Auth::user()->name }}</h2>
            </header>

            <div class="content">
                <section class="sort">
                    <div class="inputs-group" style="width: 100%">
                        <p class="label">Enter Tracking number</p>
                        <div style="display: flex; align-items: center">
                            <div style="flex: 1">
                                <input type="text" class="input" form="track" name="trackingNumber"
                                    placeholder="Tracking Nujmber" />
                                <x-form-error name='trackingNumber'></x-form-error>
                            </div>
                            <div>
                                <button type="submit" form="track" class="btn btn-primary m-2">Track</button>
                            </div>

                        </div>
                    </div>
                </section>
                <form method="POST" action="/admin/orders/track" id="track">
                    @csrf
                </form>
                <div id="map" style="height: 50vh; max-height: 400px; width: 100%; margin-bottom: 20px;"></div>

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
                    <div class="col-12">
                        <div class="student-submit">
                            <a href="/admin/orders/{{ $order['id'] }}/edite" name="submit"
                                class="btn btn-primary btn-lg">
                                Edite <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button form="delete" onclick="confirmDelete(event, '{{ $order['id'] }}')"
                                class="btn btn-danger btn-lg" href="">Delete<i
                                    onclick="confirmDelete(event, '{{ $order['id'] }}')"
                                    class="fa-solid action  mx-2 fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                <form method="POST" action="/admin/orders/{{ $order['id'] }}" id="delete">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
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
                iconUrl: 'https://image.flaticon.com/icons/png/512/2329/2329853.png', // Replace with an appropriate package icon URL
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

        function confirmDelete(event, orderId) {
            // Prevent default button behavior (form submission)
            event.preventDefault();

            // Display confirmation prompt
            const userConfirmed = confirm("Are you sure you want to delete this order?");

            if (userConfirmed) {
                // Submit the form if user confirms
                document.getElementById(`delete`).submit();
            }
            // If canceled, do nothing
        }
    </script>
</body>

</html>
