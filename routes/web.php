<?php

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\password;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/service', function () {
    return view('services');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/track', function () {
    request()->validate([
        'trackingNumber' => ['required']
    ]);
    $trackinNum = request('trackingNumber');
    $order = Order::where('trackinNum', $trackinNum)->first();
    if ($order) {
        return view('trackResults', ['order' => $order]);
    } else {
        return view('trackError');
    }
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', function () {
    $attributes = request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    if (!Auth::attempt($attributes)) {
        throw ValidationException::withMessages([
            'email' => 'Sorry those cridentials do not match'
        ]);
    }

    request()->session()->regenerate();
    return redirect('/admin');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', function () {
    request()->validate([
        'name' => ['required'],

        'email' => ['required', 'email'],
        'password' => ['required', Password::min(6),]
    ]);
    $user = User::create(['roll' => 'user', 'name' => request('name'), 'email' => request('email'), 'password' => request('password')]);
    Auth::login($user);
    return redirect('/admin');
});
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/admin', function () {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }

    $totalOrders = Order::count();
    $totalPendingOrders = Order::where('status', 'pending')->count();
    $totalDeliveredOrders = Order::where('status', 'delivered')->count();
    $todayOrders = Order::whereDate('arivalDate', Carbon::today())->get();
    return view(
        'admin.dashboad',
        [
            'totalOrders' => $totalOrders,
            'totalPending' => $totalPendingOrders,
            'totalDelivered' => $totalDeliveredOrders,
            'totalTodayOrders' => $todayOrders
        ]
    );
});

Route::get('/admin/orders', function () {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    $orders = Order::orderBy('updated_at', 'desc')->get();

    return view('admin.orders', ['orders' => $orders]);
});

Route::get('/admin/orders/create', function () {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    return view('admin.createOrder');
});
Route::post('/admin/orders/create', function () {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    request()->validate([

        'name' => ['required'],
        'Num_items' => ['required'],
        'items' => ['required'],
        'weight' => ['required'],
        'destination' => ['required'],
        'depart-date' => ['required'],
        'arive-date' => ['required'],
        'cusName' => ['required'],
        'cusEmail' => ['required'],
        'cusLocation' => ['required'],
        'cusphoneNum' => ['required'],
        'currentLocation' => ['required'],
        'departLocation' => ['required']
    ]);

    function generateTrackingNumber()
    {
        $letters = strtoupper(Str::random(3));
        $numbers = rand(10000, 99999);
        return $letters . $numbers;
    }

    do {
        $trackinNum = generateTrackingNumber();
        $existingOrder = Order::where('trackinNum', $trackinNum)->first();
    } while ($existingOrder);

    Order::create([
        'trackinNum' => $trackinNum,
        'name' => request('name'),
        'numItems' => request('Num_items'),
        'items' => request('items'),
        'totalWeight' => request('weight'),
        'Destination' => request('destination'),
        'CurrentLocation' => request('currentLocation'),
        'departureLocation' => request('departLocation'),
        'depatureDate' => request('depart-date'),
        'arivalDate' => request('arive-date'),
        'customerName' => request('cusName'),
        'customerEmail' => request('cusEmail'),
        'customerLocation' => request('cusLocation'),
        'customerPhoneNum' => request('cusphoneNum'),
        'status' => 'pending'

    ]);

    return redirect('admin/orders');
});
Route::get('/admin/orders/track', function () {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    return view('admin.track');
});
Route::post('/admin/orders/track', function () {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    request()->validate([
        'trackingNumber' => ['required']
    ]);
    $trackinNum = request('trackingNumber');
    $order = Order::where('trackinNum', $trackinNum)->first();
    if ($order) {
        return redirect('/admin/orders/' . $order['id']);
    } else {
        return view('admin.trackError');
    }
});

Route::get('/admin/orders/{order}', function (Order $order) {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    return view('admin.trackOrder', [
        'order' => $order
    ]);
});
Route::get('/admin/orders/{order}/edite', function (Order $order) {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    return view('admin.editOrder', [
        'order' => $order
    ]);
});
Route::patch('/admin/orders/{order}/edite', function (Order $order) {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    $order->update([
        // 'trackinNum' => '202023933',
        'name' => request('name'),
        'numItems' => request('Num_items'),
        'items' => request('items'),
        'totalWeight' => request('weight'),
        'Destination' => request('destination'),
        'CurrentLocation' => request('currentLocation'),
        'departureLocation' => request('departLocation'),
        'depatureDate' => request('depart-date'),
        'arivalDate' => request('arive-date'),
        'customerName' => request('cusName'),
        'customerEmail' => request('cusEmail'),
        'customerLocation' => request('cusLocation'),
        'customerPhoneNum' => request('cusphoneNum'),
        'status' => 'pending'
    ]);
    return redirect('admin/orders');
});

Route::delete('/admin/orders/{order}', function (Order $order) {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    $order->delete();
    return redirect('admin/orders');
});
Route::get('/admin/settings', function (Order $order) {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    return view('auth.updateAccount');
});

Route::patch('/admin/settings', function () {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    request()->validate([
        'name' => ['required'],

        'email' => ['required', 'email'],
        'password' => ['required', Password::min(6),]
    ]);

    $id = Auth::user()->id;
    $user = User::find($id);
    $user->update([
        'name' => request('name'),
        'email' => request('email'),
        'password' => request('password')
    ]);

    return redirect('/login');
});
Route::get('/admin/sortOrder', function () {
    if (!Auth::check() || Auth::user()->roll !== 'admin') {
        return redirect('/login');
    }
    $orders = null;
    if (request('trackNum')) {
        $orders = Order::where('trackinNum', request('trackNum'))->first();
    } else {
        $orders = Order::orderBy('updated_at', 'desc')->get();
    }

    return view('admin.orders', ['orders' => $orders]);
});
