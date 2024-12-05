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
                <div class="container">
                    <div class="row mt-2">
                        <div class="col-lg-6  ">
                            <h1 class=" pt-3 mb-2">Update Account Infor</h1>

                            <form action="/admin/settings" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="input-group mb-3">
                                    <input required type="text" value="{{ Auth::user()->name }}" placeholder="name"
                                        class="form-control" name="name" />
                                </div>
                                <x-form-error name="name"></x-form-error>
                                <div class="input-group mb-3">
                                    <input required type="email" value="{{ Auth::user()->email }}" placeholder="email"
                                        class="form-control" name="email" />
                                </div>
                                <x-form-error name="email"></x-form-error>
                                <div class="input-group mb-3">
                                    <input required type="password" placeholder="Password" class="form-control"
                                        name="password" />

                                </div>
                                <x-form-error name="password"></x-form-error>
                                <div class="d-grid">
                                    <button type="submit" name="login" class="btn btn-primary">Update</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
