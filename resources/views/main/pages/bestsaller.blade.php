<!-- Bestsaler Product Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">Bestseller Products</h1>
            <p>Explore our curated collection of bestselling products!</p>
        </div>
        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-lg-6 col-xl-4">
                <div class="p-4 rounded bg-light">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <img src="{{asset('webImage/'.$product->photo)}}" class="img-fluid rounded-circle w-100"
                                alt="">
                        </div>
                        <div class="col-6">
                            <a class="h5">{{$product->name ?? '--'}}</a>
                            <div class="d-flex my-3">
                                @for ($i = 0; $i < $product->rating; $i++)
                                    <i class="fas fa-star text-primary"></i>
                                @endfor
                                @for ($i = $product->rating; $i < 5; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            <h4 class="mb-3">{{$product->price ?? '00'}}per{{$product->weight_type ?? 'Kg'}}</h4>

                            <!-- Adjusted form for adding to cart -->
                            <form action="{{ route('cart.add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="price" value="{{$product->price}}">
                                <input type="hidden" name="name" value="{{$product->name}}">
                                 <input type="hidden" name="photo" value="{{$product->photo}}">
                                <button type="submit" 
                                    class="btn border border-secondary rounded-pill px-3 text-primary">
                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Bestsaler Product End -->