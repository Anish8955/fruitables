<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Orders</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Orders</li>
    </ol>
</div>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Transaction Id</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>
                            @foreach($order->orderedProducts as $orderedProduct)
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('webImage/' . $orderedProduct->photo) }}"
                                    class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;">
                            </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->orderedProducts as $orderedProduct)
                            <p class="mb-0 mt-4">{{ $orderedProduct->name }}</p>
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->orderedProducts as $orderedProduct)
                            <p class="mb-0 mt-4">{{ $orderedProduct->rate }}</p>
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->orderedProducts as $orderedProduct)
                            <p class="mb-0 mt-4 sub-total">{{ $orderedProduct->quantity }}</p>
                            @endforeach
                        </td>
                        <td>
                            <p class="mb-0 mt-4 sub-total">{{ $order->transaction_id }}</p>
                        </td>
                        <td>
                            @foreach($order->orderedProducts as $orderedProduct)
                            <p class="mb-0 mt-4 sub-total">{{ $orderedProduct->quantity * $orderedProduct->rate }}</p>
                            @endforeach
                        </td>
                        <td>
                            <p class="mb-0 mt-4 sub-total"
                                style="background-color: green; color: white; padding: 5px; border-radius: 5px; text-align: center;">
                                {{ $order->status }}
                            </p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>