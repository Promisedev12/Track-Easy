<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    @vite(['resources/js/script.js', 'resources/css/bootstrap2.css', 'resources/css/style.css'])
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

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
                <li><a href="/logout">Logout</a></li>
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
                <form method="POST" action="/admin/orders/create">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <h5 class="student-info">
                                Create Order
                                <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                            </h5>
                        </div>

                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Name <span class="login-danger">*</span></label>
                                <input name="name" id="name" value="{{ old('name') }}" class="form-control"
                                    type="text" placeholder="Name" />
                                <x-form-error name='name'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Number of items <span class="login-danger">*</span></label>
                                <input name="Num_items" value="{{ old('Num_items') }}" class="form-control"
                                    type="number" placeholder="5" />
                                <x-form-error name='Num_items'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Items <span class="login-danger">*</span></label>
                                <input name="items" value="{{ old('items') }}" class="form-control" type="text"
                                    placeholder="1 Fridge, 3 TV etc" />
                                <x-form-error name='items'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms calendar-icon">
                                <label>Total Weight<span class="login-danger">*</span></label>
                                <input name="weight" value="{{ old('weight') }}" class="form-control datetimepicker"
                                    type="text" placeholder="10kg" />
                                <x-form-error name='weight'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Departure Location </label>
                                <input name="departLocation" value="{{ old('departLocation') }}" class="form-control"
                                    type="text" placeholder="USA / Los Angelas" />
                                <x-form-error name='departLocation'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Current Location </label>
                                <input name="currentLocation" value="{{ old('currentLocation') }}" class="form-control"
                                    type="text" placeholder="South Africa / Cape Town" />
                                <x-form-error name='currentLocation'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Destination </label>
                                <input name="destination" value="{{ old('destination') }}" class="form-control"
                                    type="text" placeholder="Cameroon / Douala" />
                                <x-form-error name='destination'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Departure Date <span class="login-danger">*</span></label>
                                <input name="depart-date" value="{{ old('depart-date') }}" class="form-control"
                                    type="date" />
                                <x-form-error name='depart-date'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Arrival Date<span class="login-danger">*</span></label>
                                <input name="arive-date" value="{{ old('arive-date') }}" class="form-control"
                                    type="date" />
                                <x-form-error name='arive-date'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Customer Name <span class="login-danger">*</span></label>
                                <input name="cusName" value="{{ old('cusName') }}" class="form-control"
                                    type="text" placeholder="John Doe" />
                                <x-form-error name='cusName'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Customer Email<span class="login-danger">*</span></label>
                                <input name="cusEmail" value="{{ old('cusEmail') }}" class="form-control"
                                    type="email" placeholder="JohnDoe@gmail.com" />
                                <x-form-error name='cusEmail'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Customer Location<span class="login-danger">*</span></label>
                                <input name="cusLocation" value="{{ old('cusLocation') }}" class="form-control"
                                    type="text" placeholder="Douala Bonaberi" />
                                <x-form-error name='cusLocation'></x-form-error>
                            </div>
                        </div>

                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Customer Phone Number</label>
                                <input name="cusphoneNum" value="{{ old('cusphoneNum') }}" class="form-control"
                                    type="number" placeholder="Enter Phone Number" />
                                <x-form-error name='cusphoneNum'></x-form-error>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="student-submit">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
