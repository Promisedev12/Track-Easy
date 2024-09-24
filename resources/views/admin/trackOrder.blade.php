<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    @vite(['resources/js/script.js', 'resources/css/bootstrap2.css', 'resources/css/style.css'])
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
                    <div class="col-12">
                        <div class="student-submit">
                            <a href="/admin/orders/{{ $order['id'] }}/edite" name="submit"
                                class="btn btn-primary btn-lg">
                                Edite <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button form="delete" class="btn btn-danger btn-lg" href="">Delete<i
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
</body>

</html>
