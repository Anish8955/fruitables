<style>.sub-total{}</style>
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Cart</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Cart Page Start -->
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
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $cartItem)
                    @php
                    $cartTotal = $cartItem->rate;
                    @endphp
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('webImage/'.$cartItem->product->photo)}}"
                                    class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4">{{$cartItem->product->name}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">{{$cartItem->rate}}</p>
                        </td>
                        <td>
                            <div class="input-group quantity mt-4" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border"
                                        data-product-id="{{ $cartItem->id }}"
                                        data-product-price="{{ $cartItem->rate }}">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text"
                                    class="form-control form-control-sm text-center border-0 quantity-input"
                                    data-product-id="{{ $cartItem->id }}" value="{{ $cartItem->quantity }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border"
                                        data-product-id="{{ $cartItem->id }}"
                                        data-product-price="{{ $cartItem->rate }}">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>


                        <td>
                            <p class="mb-0 mt-4 sub-total" id="total-price-{{$cartItem->id}}">{{ $cartItem->quantity *
                                $cartItem->rate }}</p>
                        </td>
                        <td>
                            <form action="{{ route('deleteitem', ['id' => $cartItem->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-md rounded-circle bg-light border mt-4"
                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Cart Total</h5>
                        <p class="mb-0 pe-4" id="mainTotal">00.00</p>
                    </div>
                    <a href="{{ route('checkout')}}"class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">Proceed Checkout</a>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const updateCartItem = (productId, newQuantity) => {
            // You can use AJAX to send the updated quantity to your Laravel controller
            // Example using fetch API:
            fetch(`/updateCartItem/${productId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token if not already present
                },
                body: JSON.stringify({ quantity: newQuantity }),
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data); // You can handle the response as needed
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        };

        document.querySelectorAll('.btn-minus').forEach(btn => {
            btn.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');
                const productPrice = parseInt(this.getAttribute('data-product-price'), 10);
                const input = document.querySelector(`.quantity-input[data-product-id="${productId}"]`);
                let newQuantity = parseInt(input.value, 10);

                if (newQuantity > 1) {
                    newQuantity--;
                    input.value = newQuantity;
                    updateCartItem(productId, newQuantity);

                    let newPrice = newQuantity * productPrice;
                    updatePrice(newPrice, productId);
                    getTotal()
                }
            });
        });

        document.querySelectorAll('.btn-plus').forEach(btn => {
            btn.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');
                const productPrice = parseInt(this.getAttribute('data-product-price'));
                const input = document.querySelector(`.quantity-input[data-product-id="${productId}"]`);
                let newQuantity = parseInt(input.value, 10);

                newQuantity++;
                input.value = newQuantity;
                updateCartItem(productId, newQuantity);

                let newPrice = newQuantity * productPrice;
                updatePrice(newPrice, productId);
                getTotal();
            });
        });
    });

    function updatePrice(price, productId) {
        var myElement = document.getElementById("total-price-" + productId);
        myElement.innerHTML = price;
    }
    function getTotal() {
        var myArray = [];
        $('.sub-total').each(function (index, element) {
            myArray.push(parseInt($(element).text()));
        });
        var sum = myArray.reduce(function (accumulator, currentValue) {
            return accumulator + currentValue;
        }, 0);
        $('#mainTotal').text(sum);
    }
    getTotal();
</script>
@endpush