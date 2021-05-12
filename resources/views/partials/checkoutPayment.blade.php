<div class="tab-pane fade p-lg-4 p-1 show active" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">
    <div class="list-group list-group-flush">
        <div class="list-group-item p-0 row pb-3">
            @foreach (Auth::user()->cart() as $item)
                @include("partials.checkoutItemCard",array("item" => $item))
            @endforeach
        </div>
        <div class="text-center mt-5 fs-4">
            <p class="mb-1"><span>Total Payment: </span></p>
            <p><span id="totalPayment" class="fs-2" style="color:red">{{Auth::user()->cartTotal()}}</span></p>
        </div>

        <div id="paymentMethods" class="mt-4">
            <h5 class="mb-4 ms-4 text-lg-start text-center">Please select the desired payment method to conclude purchase</h5>
            <ul class="list-group list-group-flush px-lg-5 text-center">
                <li class="list-group-item">
                    <button type="button" class="btn btn-success">Pay with account balance</button>
                </li>
                <li class="list-group-item d-block">
                    <a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_SbyPP_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark"></a>
                    <button type="button" class="btn btn-warning">Pay with Paypal</button>
                </li>
            </ul>
        </div>
    </div>
    <footer class="text-end mt-5 row">
        <button type="button" class="btn btn-dark col-lg-3 col-12"><i class="bi bi-arrow-left-circle"></i> Go Back</button>
        {{-- <button type="button" class="btn btn-success offset-lg-6 col-lg-3 col-12">Finish and Pay</button> --}}
    </footer>
</div>