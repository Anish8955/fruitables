<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span> All Details</h4>
    <!-- Hoverable Table rows -->
    <div class="card">

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Order Id</th>
                        <th>Product Id</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp

                    @foreach($orderedProduct as $orderedProduct)
                    <tr>
                        <td>{{ $counter }}</td>
                        <td>{{ $orderedProduct->name }}</td>
                        <td>{{ $orderedProduct->order_id }}</td>
                        <td>{{ $orderedProduct->product_id }}</td>
                        <td>{{ $orderedProduct->quantity }}</td>
                        <td>{{ $orderedProduct->rate }}</td>
                    </tr>
                    @php
                    $counter++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Hoverable Table rows -->

</div>