<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="container mt-4 mb-5">
    <div class="row px-5">
        <div class="col-md-6 mt-2 bg-light">
            <div class="row mb-3 informationInput px-2 d-none">
                <div class="col-12 border rounded px-2">
                    <div class="row align-items-center py-2 px-3 justify-content-center">
                        <div class="col-3 text-start"><span>Contact</span></div>
                        <div class="col-6 text-center content-email"><span></span></div>
                        <div class="col-3 d-flex justify-content-end"><a href="#"
                                class="text-decoration-none change-contact">Change</a></div>
                    </div>
                    <div class="d-none row infor-address align-items-center py-2 px-3 justify-content-center">
                        <hr>
                        <div class="col-3 text-start"><span>Ship to</span></div>
                        <div class="col-6 text-center content-address"><span></span></div>
                        <div class="col-3 d-flex justify-content-end"><a href="#"
                                class="text-decoration-none change-shipping">Change</a></div>
                    </div>
                </div>
            </div>
            <form id="contactInfoForm">
                <h4>Contact Information</h4>
                <div class="mb-3">
                    <input type="email" class="form-control email-contact" id="email" placeholder="Enter your email"
                        required>
                </div>
                <div class="mb-3 text-end">
                    <button type="button" id="continueButton" class="btn btn-secondary py-2">Continue to
                        Shipping</button>
                </div>
            </form>
            <form id="additionalForm" class="d-none mt-5 mb-4">
                <h4>Shipping Address</h4>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name"
                            required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone"
                            required>
                    </div>
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" id="note" name="note" placeholder="Note (optional)">
                </div>

                <h4 class="mt-4">Shipping Method</h4>
                <div class="pt-1 ps-2">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="shippingMethod" id="shippingMethod1"
                            value="1" checked>
                        <label class="form-check-label" for="shippingMethod1">
                            Standard Shipping (2-3 days)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="shippingMethod" id="shippingMethod2"
                            value="2">
                        <label class="form-check-label" for="shippingMethod2">
                            Express Shipping (1-2 days)
                        </label>
                    </div>
                    <div class="mb-3 text-end">
                        <button type="button" id="shippingButton" class="btn btn-secondary py-2">Continue to
                            Payment</button>
                    </div>
                </div>
            </form>
            <form id="paymentInput" class="mt-2 d-none">
                <h4>Payment Method</h4>
                <div class="pt-1 ps-2">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod1"
                            value="coc" checked>
                        <label class="form-check-label" for="paymentMethod1">
                            <img src="{{ asset('images/payment/COC.png') }}" alt="COC Payment"
                                style="width: 30px; height: 30px;" class="me-2">
                            Cash on Delivery
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod2"
                            value="momo">
                        <label class="form-check-label" for="paymentMethod2">
                            <img src="{{ asset('images/Payment/Momo-2.png') }}" alt="MoMo Payment"
                                style="width: 30px; height: 30px;" class="me-2">
                            MoMo Payment
                        </label>
                    </div>
                    <form action="" method="POST">
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-secondary py-2 placeOrder">Place Order</button>
                        </div>
                    </form>
                </div>
            </form>
            <div id="sucesssOrder" class="row mt-5 d-none">
                <div class="col-12">
                    <h4><i class="fas fa-receipt"></i> Your Order</h4>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <p><i class="fas fa-user"></i> Recipient</p>
                        </div>
                        <div class="col-6 text-end" id="nameOrder">
                            <p></p>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <p><i class="fas fa-shipping-fast"></i> Shipping Method</p>
                        </div>
                        <div class="col-6 text-end" id="shippingOrder">
                            <p></p>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <p><i class="fas fa-map-marker-alt"></i> Address</p>
                        </div>
                        <div class="col-6 text-end" id="addressOrder">
                            <p></p>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <p><i class="fas fa-credit-card"></i> Payment Method</p>
                        </div>
                        <div class="col-6 text-end" id="paymentOrder">
                            <p></p>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="mb-3 text-end">
                    <a href="{{ route('home') }}" class="btn btn-secondary w-100 py-2">Continue Shopping </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-5">
            <div class="card border-0 bg-light">
                <!-- <div class="product-cart" style="font-size:0.8em">
                    <img src="<?php echo $productDetail['image']; ?>" alt="<?php echo $productDetail['name']; ?>">
                    <div class="product-details">
                        <h5><?php echo $productDetail['name']; ?></h5>
                        <p>$<?php echo $productDetail['price']; ?></p>
                        <p>Quantity: <?php echo $productDetail['quantity']; ?></p>
                    </div>
                </div> -->
                <hr>
                <!-- Total -->
                <div class="mb-3">
                    <p class="mb-1">Sub total <span class="float-end">$ {{ $total }}</span></p>
                    <p class="mb-1">Discount <span class="float-end">$ {{ number_format($discountPrice, 2) }}</span></p>
                    <hr>
                    <h5>Total <span class="float-end">$1,129.00</span></h5>
                </div>
            </div>
        </div>
    </div>
</div>
</div>