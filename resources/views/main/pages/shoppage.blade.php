<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Shop</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Fresh fruits shop</h1>
        <div class="row g-4">
            <div class="col-lg-12">
              <div class="row g-4">
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
                </br>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="col-lg-12">
                            <div class="position-relative">
                                <img src="{{asset('front/img/banner-fruits.jpg')}}" class="img-fluid w-100 rounded"
                                    alt="">
                                <div class="position-absolute"
                                    style="top: 50%; right: 10px; transform: translateY(-50%);">
                                    <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">

                        <div class="row g-4 justify-content-center">
                            @foreach($products as $product)
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="{{asset('webImage/'.$product->photo)}}"
                                            class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">{{$product->type ?? '--'}}</div>
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4>{{$product->name ?? '--'}}</h4>
                                        <p>{{$product->description ?? '--'}}</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">{{$product->price ??
                                                '00'}}per{{$product->weight_type ?? 'Kg'}}</p>
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
                            <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    <!-- Previous Page Link -->
                                    @if ($products->onFirstPage())
                                    <span class="rounded disabled">&laquo;</span>
                                    @else
                                    <a href="{{ $products->previousPageUrl() }}" class="rounded" rel="prev">&laquo;</a>
                                    @endif

                                    <!-- Pagination Elements -->
                                    @foreach ($products as $page=>$product)
                                    @if ($page == $products->currentPage())
                                    <a href="#" class="active rounded">{{ $page }}</a>
                                    @else
                                    <a href="{{ $products->url($page) }}" class="rounded">{{ $page }}</a>
                                    @endif
                                    @endforeach

                                    <!-- Next Page Link -->
                                    @if ($products->hasMorePages())
                                    <a href="{{ $products->nextPageUrl() }}" class="rounded" rel="next">&raquo;</a>
                                    @else
                                    <span class="rounded disabled">&raquo;</span>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>