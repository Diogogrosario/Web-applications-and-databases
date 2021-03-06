<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>

<div class="p-0" style="background-color:#f2f2f2;">
    <div id="checkoutPage" class="container col-lg-7 col-md-11 p-lg-4 p-3 shadow-sm h-100" style="background-color:white">
        <h2 class="ps-lg-5 mb-4">Checkout</h2>
        <form>
            <ul class="nav nav-tabs mb-3 nav-fill text-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link w-100" id="pills-overview-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview" aria-selected="false">
                        <span class="badge bg-secondary rounded-circle me-3">1</span>Overview
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active w-100" id="pills-addresses-tab" data-bs-toggle="pill" data-bs-target="#pills-addresses" type="button" role="tab" aria-controls="pills-addresses" aria-selected="true">
                        <span class="badge bg-secondary rounded-circle me-3">2</span>Addresses
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link w-100" id="pills-shipping-tab" data-bs-toggle="pill" data-bs-target="#pills-shipping" type="button" role="tab" aria-controls="pills-shipping" aria-selected="false">
                        <span class="badge bg-success rounded-circle me-3">3</span>Shipping
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link w-100" id="pills-payment-tab" data-bs-toggle="pill" data-bs-target="#pills-payment" type="button" role="tab" aria-controls="pills-payment" aria-selected="false">
                        <span class="badge bg-secondary rounded-circle me-3">4</span>Payment
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
                    <footer class="text-end mt-5 row">
                        <button type="button" class="btn btn-success offset-lg-9 col-lg-3 col-12">Proceed to Addresses <i class="bi bi-arrow-right-circle"></i></button>
                    </footer>
                </div>

                <div class="tab-pane fade show active" id="pills-addresses" role="tabpanel" aria-labelledby="pills-addresses-tab">
                    <div class="row p-4" id="addresses_checkout">
                        <div id="billingAddressDiv_checkout" class="col-lg-6 col-12">
                            <h4 class="text-center mb-4">Billing Address</h4>
                            <div class="form-check mt-4 text-md-start text-center">
                                <input class="form-check-input" type="checkbox" value="" id="useDefinedBilling">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Use previously defined billing address
                                </label>
                            </div>
                            <table id="paymentInfo" class="mt-4 mb-5 table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>Rua Yay nº20 Areias</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">City</th>
                                        <td>Santo Tirso</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Country</th>
                                        <td>Portugal</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="shippingAddressDiv_checkout" class="col-lg-6">
                            <h4 class="text-center mb-4">Shipping Address</h4>
                            <div class="row mt-4">
                                <div class="form-check text-md-start text-center col-lg-6">
                                    <input class="form-check-input" type="checkbox" value="" id="useDefinedShipping">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Use previously defined shipping address
                                    </label>
                                </div>
                                <div class="form-check text-md-start text-center col-lg-6">
                                    <input class="form-check-input" type="checkbox" value="" id="shippingEqualBilling">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Use my billing address as my shipping address
                                    </label>
                                </div>
                            </div>
                            <table id="paymentInfo" class="mt-4 mb-5 table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>Rua Yay nº20 Areias</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">City</th>
                                        <td>Santo Tirso</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Country</th>
                                        <td>Portugal</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <footer class="ps-4 mt-3 row">
                            <button type="button" class="btn btn-dark col-lg-3 col-12"><i class="bi bi-arrow-left-circle"></i> Go Back</button>
                            <button type="button" class="btn btn-success offset-lg-6 col-lg-3 col-12">Proceed to Payment <i class="bi bi-arrow-right-circle"></i></button>
                        </footer>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-shipping" role="tabpanel" aria-labelledby="pills-shipping-tab">
                    <div id="shippingChoose" class="p-3 px-lg-5 px-md-2 px-1">
                        <h5 class="mb-4 ms-4 text-lg-start text-center">Please select the desired shipping method</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-check row">
                                    <div class="col-1">
                                        <input class="form-check-input" type="radio" name="shippingMethod" id="ctt">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-check-label row" for="ctt">
                                            <img src="images/deliveries/ctt.jpg" class="d-md-inline d-none col-2 img-fluid thumbnail">
                                            <div class="col-7 ps-3 fs-5" class="shippingName">
                                                CTT Portugal
                                            </div>
                                            <span id="ctt_price" class="col-3 text-center">1.50 €</span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-check row">
                                    <div class="col-1">
                                        <input class="form-check-input" type="radio" name="shippingMethod" id="ctt">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-check-label row" for="ctt">
                                            <img src="images/deliveries/fedex.jpg" class="d-md-inline d-none col-2 img-fluid thumbnail">
                                            <div class="col-7 ps-3 fs-5" class="shippingName">
                                                FedEx
                                            </div>
                                            <span id="ctt_price" class="col-3 text-center">3.50 €</span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-check row">
                                    <div class="col-1">
                                        <input class="form-check-input" type="radio" name="shippingMethod" id="ctt">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-check-label row" for="ctt">
                                            <img src="images/deliveries/dhl.jpg" class="d-md-inline d-none col-2 img-fluid thumbnail">
                                            <div class="col-7 ps-3 fs-5" class="shippingName">
                                                DHL
                                            </div>
                                            <span id="ctt_price" class="col-3 text-center">2.50 €</span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <footer class="text-end mt-5 row">
                            <button type="button" class="btn btn-dark col-lg-3 col-12"><i class="bi bi-arrow-left-circle"></i> Go Back</button>
                            <button type="button" class="btn btn-success offset-lg-6 col-lg-3 col-12">Proceed to Payment <i class="bi bi-arrow-right-circle"></i></button>
                        </footer>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">

                </div>
            </div>
        </form>

    </div>
</div>

<?php include_once('footer.html'); ?>