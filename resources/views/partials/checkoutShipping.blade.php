<div class="tab-pane fade show active" id="pills-shipping" role="tabpanel" aria-labelledby="pills-shipping-tab">
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
        {{session('error')}}
        </div>
    @endif
    <form method="post" action="{{action('CheckoutController@toPayment')}}" id="shippingChoose" class="p-3 px-lg-5 px-md-2 px-1">
        @csrf
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
            <button type="submit" class="btn btn-success offset-lg-6 col-lg-3 col-12">Proceed to Payment <i class="bi bi-arrow-right-circle"></i></button>
        </footer>
    </form>
</div>