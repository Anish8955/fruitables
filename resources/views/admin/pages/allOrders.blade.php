<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span> All Orders</h4>
    <!-- Hoverable Table rows -->
    <div class="card">

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Transaction Id</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp

                    @foreach($orders as $order)
                    <tr>
                        
                        <td>{{ $counter }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->address->town }}</td>
                        <td>{{ $order->transaction_id }}</td>
                        <td>{{ $order->status }}</td>
                       
                        <!-- Assuming 'user_type' is a field in your 'users' table -->
                             <td>
                           
                                    <form action="{{route('deleteOrder', ['id' => $order->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"
                                            onclick="return confirm('Are you sure you want to delete this order?')">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                        <a href="{{route('orderDetails', ['id' => $order->id])}}" class="dropdown-item"  onclick="return confirm('Are you sure you want to open all details page?')">
                                           <i class="bx bx-detail">All Details</i>
                                        </a>
                             </td>
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