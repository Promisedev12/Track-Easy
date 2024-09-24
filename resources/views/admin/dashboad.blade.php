<x-adminLayout>
    <div class="content">
        <section id="dashboard">
            <!-- <h3>Dashboard Overview</h3> -->
            <div class="grid-container">
                <div class="card">
                    <h3>Total Orders</h3>
                    <p>{{ $totalOrders }}</p>
                </div>

                <div class="card">
                    <h3>Pending orders</h3>
                    <p>{{ $totalPending }}</p>
                </div>
                <div class="card">
                    <h3>Delivered</h3>
                    <p>{{ $totalDelivered }}</p>
                </div>
            </div>
        </section>
        <section id="orders">
            <h3>To be delivered Today</h3>
            <table>
                <thead>
                    <tr>
                        <th>Tracking Number</th>
                        <th>Product Name</th>
                        <th>Quantity</th>

                        <th>Destination</th>
                        <th>Customer Name</th>
                        <th>Customer Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($totalTodayOrders)
                        @foreach ($totalTodayOrders as $order)
                            <tr>
                                <td>
                                    <a class="order-link"
                                        href="/admin/orders/{{ $order['id'] }}">{{ $order['trackinNum'] }}</a>
                                </td>
                                <td>
                                    <a class="order-link"
                                        href="/admin/orders/{{ $order['id'] }}">{{ $order['items'] }}</a>
                                </td>
                                <td>
                                    <a class="order-link"
                                        href="/admin/orders/{{ $order['id'] }}">{{ $order['numItems'] }}</a>
                                </td>
                                <td>
                                    <a class="order-link"
                                        href="/admin/orders/{{ $order['id'] }}">{{ $order['Destination'] }}
                                    </a>
                                </td>
                                <td>
                                    <a class="order-link"
                                        href="/admin/orders/{{ $order['id'] }}">{{ $order['customerName'] }}
                                    </a>
                                </td>
                                <td>
                                    <a class="order-link"
                                        href="/admin/orders/{{ $order['id'] }}">{{ $order['customerPhoneNum'] }}</a>
                                </td>
                                <td>
                                    <a href="/admin/orders/{{ $order['id'] }}/edite" class="btn btn-sm"
                                        href=""><i
                                            class="fa-solid action text-primary mx-3 fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </section>
    </div>
</x-adminLayout>
