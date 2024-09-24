<x-adminLayout>
    <div class="content">
        {{-- <h2>Sort by</h2> --}}
        {{-- <section class="sort">
            <div class="inputs-group">
                <p class="label">Delevery Date</p>
                <input type="date" form="sort" class="input" name="date" />
            </div>
            <div class="inputs-group">
                <p class="label">Tracking number</p>
                <input type="text" class="input" name="trackNum" form="sort" placeholder="Tracking Number" />

            </div>
            <div class="inputs-group">
                <p class="label">Status</p>
                <input type="text" class="input" form="sort" name="trackingNum" placeholder="Tracking Number" />
            </div>
            <div class="inputs-group">
                <button form="sort" class="btn btn-primary " style="background-color: #2f80ed">Sort</button>
            </div>
            <form method="get" id="sort" action="/admin/sortOrder">
                @csrf
            </form>
        </section> --}}
        <table>
            <thead>
                <tr>
                    <th>Tracking Number</th>
                    <th>Items</th>
                    <th>Quantity</th>
                    <th>Destination</th>
                    <th>Total weight</th>
                    <th>Status</th>
                    <th>Arrival date</th>
                    <th>Customer Name</th>
                    <th>Customer Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td><a class="order-link" href="/admin/orders/{{ $order['id'] }}">{{ $order['trackinNum'] }}</a>
                        </td>
                        <td><a class="order-link" href="/admin/orders/{{ $order['id'] }}">{{ $order['name'] }}</a></td>
                        <td><a class="order-link" href="/admin/orders/{{ $order['id'] }}">{{ $order['numItems'] }}</a>
                        </td>
                        <td><a class="order-link" href="/admin/orders/{{ $order['id'] }}">{{ $order['Destination'] }}</a>
                        </td>
                        <td><a class="order-link"
                                href="/admin/orders/{{ $order['id'] }}">{{ $order['totalWeight'] }}</a></td>
                        <td><a class="order-link" href="/admin/orders/{{ $order['id'] }}">{{ $order['status'] }}</a>
                        </td>
                        <td><a class="order-link"
                                href="/admin/orders/{{ $order['id'] }}">{{ $order['arivalDate'] }}</a></td>
                        <td><a class="order-link"
                                href="/admin/orders/{{ $order['id'] }}">{{ $order['customerName'] }}</a></td>
                        <td><a class="order-link"
                                href="/admin/orders/{{ $order['id'] }}">{{ $order['customerPhoneNum'] }}</a></td>
                        <td>
                            <a class="btn btn-sm" href="/admin/orders/{{ $order['id'] }}/edite"><i
                                    class="fa-solid action text-primary mx-3 fa-pen-to-square">
                                </i></a>
                            &nbsp;
                            <button style="background-color: transparent; border:none" form="delete"
                                class="btn btn-sm del-btn" href=""><i
                                    class="fa-solid action text-danger fa-trash" style="color: red"></i></button>
                        </td>
                        <form method="POST" action="/admin/orders/{{ $order['id'] }}" id="delete">
                            @csrf
                            @method('DELETE')
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-adminLayout>
