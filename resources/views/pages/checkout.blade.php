@extends('layouts.app')


@section('title')
    <title>Checkout</title>
@endsection


@section("content")
@include('partials.sidebarItem',["categories" => $categories])

<div class="p-0" style="background-color:#f2f2f2;">
    <div id="checkoutPage" class="container col-lg-7 col-md-11 p-lg-4 p-3 shadow-sm h-100" style="background-color:white">
        <h2 class="ps-lg-5 mb-4">Checkout</h2>
        <form>
            <ul class="nav nav-tabs mb-3 nav-fill text-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active w-100" id="pills-overview-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview" aria-selected="false">
                        <span class="badge bg-success rounded-circle me-3">1</span>Overview
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link w-100" id="pills-addresses-tab" data-bs-toggle="pill" data-bs-target="#pills-addresses" type="button" role="tab" aria-controls="pills-addresses" aria-selected="true">
                        <span class="badge bg-secondary rounded-circle me-3">2</span>Addresses
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link w-100" id="pills-shipping-tab" data-bs-toggle="pill" data-bs-target="#pills-shipping" type="button" role="tab" aria-controls="pills-shipping" aria-selected="false">
                        <span class="badge bg-secondary rounded-circle me-3">3</span>Shipping
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link w-100" id="pills-payment-tab" data-bs-toggle="pill" data-bs-target="#pills-payment" type="button" role="tab" aria-controls="pills-payment" aria-selected="false">
                        <span class="badge bg-secondary rounded-circle me-3">4</span>Payment
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active p-lg-4 p-1" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item p-0 row pb-3">
                            <div class="row">
                                <div class="col-lg-1 col-3 ps-3 align-self-center text-center fs-5">
                                    1 x
                                </div>
                                <div class="col-lg-2 col-9">
                                    <a class="link-dark" href="#"><img src="images/computers/lenovoPc.jpg" class="img-fluid" alt="..."></a>
                                </div>
                                <div class="col-lg-7 col-12 border-left border-dark">
                                    <div class="row mt-lg-0 mt-3">
                                        <div class="col-12 ps-lg-0 ps-4">
                                            <h5 class="title"><a class="link-dark" href="#">Lenovo Laptop Y-5634</a></h5>
                                            <p class="text">This Lenovo laptop is the best for it's price, and it won't even heat up on your lap!</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col d-flex flex-column justify-content-center text-center">
                                    <p><span class="title fs-5">299.99</span> €</p>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-lg-10 col-12 d-flex flex-column justify-content-center text-lg-end text-center pe-lg-5 fs-5">Total (w/ IVA):</div>
                            <div class="col-lg-2 col-12 fs-4 text-center">299.99€</div>
                        </div>
                    </div>
                    <footer class="text-end mt-5 row">
                        <button type="button" class="btn btn-success offset-lg-9 col-lg-3 col-12">Proceed to Addresses <i class="bi bi-arrow-right-circle"></i></button>
                    </footer>
                </div>

                <div class="tab-pane fade" id="pills-addresses" role="tabpanel" aria-labelledby="pills-addresses-tab">
                    <div class="row p-4" id="addresses_checkout">
                        <div id="billingAddressDiv_checkout" class="col-lg-6 col-12">
                            <h4 class="text-center mb-4">Billing Address</h4>
                            <div class="form-check mt-4 ps-5">
                                <input class="form-check-input" checked type="checkbox" value="useDefinedBilling" id="useDefinedBilling">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Use previously defined billing address
                                </label>
                            </div>
                            <table id="billingAddress_checkout" class="mt-4 mb-5 table">
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
                                    <tr>
                                        <th scope="row">Zip Code</th>
                                        <td>5960-313</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="shippingAddressDiv_checkout" class="col-lg-6">
                            <h4 class="text-center mb-4">Shipping Address</h4>
                            <div class="row mt-4 ps-3">
                                <div class="form-check text-md-start col-12">
                                    <input class="form-check-input" type="radio" name="shippingAddress" id="shippindAddressDefines">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Use previously defined shipping address
                                    </label>
                                </div>
                                <div class="form-check text-md-start col-12">
                                    <input class="form-check-input" type="radio" name="shippingAddress" id="shippingEqualBilling">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Use my billing address as my shipping address
                                    </label>
                                </div>
                                <div class="form-check text-md-start col-12">
                                    <input class="form-check-input" checked type="radio" name="shippingAddress" id="shippingEqualBilling">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Insert a different shipping address
                                    </label>
                                </div>
                            </div>
                            <div id="shippingAddressForm_checkout" class="mt-4 mb-5 pe-lg-3 table text-lg-end">
                                <div class="row">
                                    <label for="shippingAddressFormCheckout" class="form-label mb-0 col-lg-3">Address</label>
                                    <input type="text" class="form-control col" id="shippingAddressFormCheckout">
                                </div>
                                <div class="row mt-3">
                                    <label for="shippingCityFormCheckout" class="form-label col-lg-3">City</label>
                                    <input type="text" class="form-control col" id="shippingCityFormCheckout">
                                </div>
                                <div class="row mt-3">
                                    <label for="shippingCountryFormCheckout" class="form-label col-lg-3">Country</label>
                                    <select class="form-select col" aria-label="Country" id="shippingCountryFormCheckout">
                                        <option selected value="portugal">Portugal</option>
                                        <option value="spain">Spain</option>
                                        <option value="united_kingdom">United Kingdom</option>
                                    </select>
                                    <label for="shippingZipcodeFormCheckout" class="form-label col-lg-3 mt-lg-0 mt-3">ZipCode</label>
                                    <input type="text" class="form-control col" id="shippingZipcodeFormCheckout">
                                </div>
                            </div>
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
                                        <input class="form-check-input" type="radio" name="shippingMethod" id="fedex">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-check-label row" for="fedex">
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
                                        <input class="form-check-input" type="radio" name="shippingMethod" id="dhl">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-check-label row" for="dhl">
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
                <div class="tab-pane fade p-lg-4 p-1" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item p-0 row pb-3">
                            <div class="row">
                                <div class="col-lg-1 col-3 ps-3 align-self-center text-center fs-5">
                                    1 x
                                </div>
                                <div class="col-lg-2 col-9">
                                    <a class="link-dark" href="#"><img src="images/computers/lenovoPc.jpg" class="img-fluid" alt="..."></a>
                                </div>
                                <div class="col-lg-7 col-12 border-left border-dark">
                                    <div class="row mt-lg-0 mt-3">
                                        <div class="col-12 ps-lg-0 ps-4">
                                            <h5 class="title"><a class="link-dark" href="#">Lenovo Laptop Y-5634</a></h5>
                                            <p class="text">This Lenovo laptop is the best for it's price, and it won't even heat up on your lap!</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col d-flex flex-column justify-content-center text-center">
                                    <p><span class="title fs-5">299.99</span> €</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5 fs-4">
                            <p class="mb-1"><span>Total Payment: </span></p>
                            <p><span id="totalPayment" class="fs-2" style="color:red">299.99 €</span></p>
                        </div>

                        <div id="paymentMethods" class="mt-4">
                            <h5 class="mb-4 ms-4 text-lg-start text-center">Please select the desired payment method</h5>
                            <ul class="list-group list-group-flush px-lg-5">
                                <li class="list-group-item">
                                    <div class="form-check row">
                                        <div class="col-1">
                                            <input class="form-check-input" type="radio" name="paymentMethod" id="ballance">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-check-label row" for="ballance">
                                                <img src="images/payments/wallet.png" class="d-md-inline d-none col-2 img-fluid thumbnail">
                                                <div class="col-7 ps-3 fs-5" class="paymentName">
                                                    Account Ballance
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check row">
                                        <div class="col-1">
                                            <input class="form-check-input" type="radio" name="paymentMethod" id="paypal">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-check-label row" for="paypal">
                                                <img src="images/payments/paypal.png" class="d-md-inline d-none col-2 img-fluid thumbnail">
                                                <div class="col-7 ps-3 fs-5" class="paymentName">
                                                    PayPal
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <footer class="text-end mt-5 row">
                        <button type="button" class="btn btn-dark col-lg-3 col-12"><i class="bi bi-arrow-left-circle"></i> Go Back</button>
                        <button type="button" class="btn btn-success offset-lg-6 col-lg-3 col-12">Finish and Pay</button>
                    </footer>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection