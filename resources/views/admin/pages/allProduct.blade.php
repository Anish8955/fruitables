<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span> All Product</h4>
    <!-- Hoverable Table rows -->
    <div class="card">

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Weight Type</th>
                        <th>Rating</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp

                    @foreach($products as $products)
                    <tr>
                        <td>{{ $counter }}</td>
                        <td>{{ $products->name }}</td>
                        <td>{{ $products->description }}</td>
                        <td>{{ $products->type }}</td>
                        <td>{{ $products->weight_type }}</td>
                        <td>{{ $products->rating }}</td>
                        <td>{{ $products->price }}</td>
                        <td>{{ $products->photo }}</td>

                        <!-- Assuming 'user_type' is a field in your 'users' table -->
                        <td>
                            <form action="{{ route('deleteproduct', ['id' => $products->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item"
                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </button>
                            </form>
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