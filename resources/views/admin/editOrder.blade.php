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
                <form method="post" action="/admin/orders/{{ $order['id'] }}/edite" enctype="multipart/form-data">

                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12">
                            <h5 class="student-info">
                                Edite Order
                                <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                            </h5>
                        </div>

                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Name <span class="login-danger">*</span></label>
                                <input value="{{ $order['name'] }}" name="name" class="form-control" type="text"
                                    placeholder="Name" />
                                <x-form-error name='name'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Number of items <span class="login-danger">*</span></label>
                                <input value="{{ $order['numItems'] }}" name="Num_items" class="form-control"
                                    type="number" placeholder="5" />
                                <x-form-error name='Num_items'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Items <span class="login-danger">*</span></label>
                                <input value="{{ $order['items'] }}" name="items" class="form-control" type="text"
                                    placeholder="1 Fridge, 3 TV etc" />
                                <x-form-error name='items'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms calendar-icon">
                                <label>Total Weight<span class="login-danger">*</span></label>
                                <input value="{{ $order['totalWeight'] }}" name="weight"
                                    class="form-control datetimepicker" type="text" placeholder="10kg" />
                                <x-form-error name='weight'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Destination </label>
                                <input value="{{ $order['Destination'] }}" name="destination" class="form-control"
                                    type="text" placeholder="Cmeroon / Douala" />
                                <x-form-error name='destination'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Departure Date <span class="login-danger">*</span></label>
                                <input value="{{ $order['depatureDate'] }}" name="depart-date" class="form-control"
                                    type="date" />
                                <x-form-error name='depart-date'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Arival date<span class="login-danger">*</span></label>
                                <input value="{{ $order['arivalDate'] }}" name="arive-date" class="form-control"
                                    type="date" />
                                <x-form-error name='arive-date'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Customer Name <span class="login-danger">*</span></label>
                                <input value="{{ $order['customerName'] }}" name="cusName" class="form-control"
                                    type="text" placeholder="Jhon Deo" />
                                <x-form-error name='cusName'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Customer Email<span class="login-danger">*</span></label>
                                <input value="{{ $order['customerEmail'] }}" name="cusEmail" class="form-control"
                                    type="email" placeholder="JhonDeo@gmail.com" />
                                <x-form-error name='cusEmail'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Customer Location<span class="login-danger">*</span></label>
                                <input value="{{ $order['customerLocation'] }}" name="cusLocation"
                                    class="form-control" type="text" placeholder="Douala Bonaberie" />
                                <x-form-error name='cusLocation'></x-form-error>
                            </div>
                        </div>

                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Customer Phone Number</label>
                                <input value="{{ $order['customerPhoneNum'] }}"name="cusphoneNum"
                                    class="form-control" type="number" placeholder="Enter Phone Number" />
                                <x-form-error name='cusphoneNum'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 my-2">
                            <div class="input-block local-forms">
                                <label>Status</label>
                                <input value="{{ $order['status'] }}"name="status" class="form-control"
                                    placeholder="status" />
                                <x-form-error name='status'></x-form-error>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="student-submit">
                                <button type="submit" class="btn btn-primary  btn-lg">
                                    Update
                                </button>
                                <a href="/admin/orders" type="submit" name="submit"
                                    class="btn btn-danger mx-3 btn-lg">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
