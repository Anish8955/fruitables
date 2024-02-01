<style>
    .sub-total {}
</style>
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Checkout</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Checkout</li>
    </ol>
</div>
<!-- Single Page Header End -->


<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Billing details</h1>
        <form method="post" action="{{ route('checkoutPost')}}">
            @csrf
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">First Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="first_name">
                                @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Last Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="last_name">
                                @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-item">
                                <label class="form-label my-3">Address <sup>*</sup></label>
                                <input type="text" class="form-control" placeholder="House Number Street Name" name="address">
                                @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                    <div class="form-item">
                        <label class="form-label my-3">Town/City<sup>*</sup></label>
                        <input type="text" class="form-control" name="town">
                        @if ($errors->has('town'))
                        <span class="text-danger">{{ $errors->first('town') }}</span>
                        @endif
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">State<sup>*</sup></label>
                        <input type="text" class="form-control" name="state">
                        @if ($errors->has('state'))
                        <span class="text-danger">{{ $errors->first('state') }}</span>
                        @endif
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                        <input type="text" class="form-control" name="pin_code">
                        @if ($errors->has('pin_code'))
                        <span class="text-danger">{{ $errors->first('pin_code') }}</span>
                        @endif

                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Mobile<sup>*</sup></label>
                        <input type="tel" class="form-control" name="mobile">
                        @if ($errors->has('mobile'))
                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                        @endif
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Email Address<sup>*</sup></label>
                        <input type="email" class="form-control" name="email">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $key => $cartItem)
                                @php
                                $total[$key] = $cartItem->rate*$cartItem->quantity;
                                @endphp
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{asset('webImage/'.$cartItem->product->photo)}}"
                                                class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                                                alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">{{$cartItem->product->name}}</td>
                                    <td class="py-5">{{$cartItem->rate}}</td>
                                    <td class="py-5">{{ $cartItem->quantity }}</td>
                                    <td class="py-5 sub-total" id="total-price-{{$cartItem->id}}">{{ $cartItem->quantity
                                        *$cartItem->rate }}</td>
                                </tr>
                                @endforeach

                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark" id="mainTotal">{{array_sum($total)}}</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                                    name="Delivery" value="Delivery" checked>
                                <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="submit"
                            class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place
                            Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->
@push('scripts')
<script>




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