<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span> Add Product</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Product Details</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('addProduct')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-S.No.">Name</label>
                                    <input type="text" class="form-control" id="basic-default-S.No."
                                        placeholder="Enter Product Name" required name="name" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-Description">Description</label>
                                    <textarea class="form-control" id="basic-default-Description"
                                        placeholder="Enter Description" name="description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-WeightType">Weight Type</label>
                                    <select class="form-select" id="basic-default-WeightType" name="weight_type"
                                        required>
                                        <option value="">Select Weight Type</option>
                                        <option value="1">1 kg</option>
                                        <option value="0.5">0.5 kg</option>
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-Full Name">Price</label>
                                    <input type="number" class="form-control" id="basic-default-Price"
                                        placeholder="Enter Price" required name="price" />
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-Type">Type</label>
                                    <select class="form-select" id="basic-default-Type" name="type" required>
                                        <option value="">Select Type</option>
                                        <option value="vegetable">Vegetable</option>
                                        <option value="fruit">Fruit</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-Rating">Rating</label>
                                    <select class="form-select" id="basic-default-Rating" name="rating" required>
                                        <option value="">Select Rating</option>
                                        <option value="5">5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-Photo">Photo</label>
                                    <input type="file" class="form-control" id="basic-default-Photo" name="photo"
                                        accept="image/*" required />
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->