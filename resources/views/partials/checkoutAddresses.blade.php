<div class="tab-pane fade show active" id="pills-addresses" role="tabpanel" aria-labelledby="pills-addresses-tab">
    @if (session('error'))
      <div class="alert alert-danger" role="alert">
        {{session('error')}}
      </div>
    @endif

    <script src="{{asset('js/checkout.js')}}" defer></script>

    <form method="post" action="{{action('CheckoutController@toShipping')}}" class="row p-4" id="addresses_checkout_form">
        @csrf
        <div id="billingAddressDiv_checkout" class="col-lg-6 col-12">
            <h4 class="text-center mb-4">Billing Address</h4>
            <div class="form-check mt-4 ps-5">
                @if (Auth::user()->shippingAddress() == null)
                    <input class="form-check-input" type="checkbox" value="Yes" disabled name="useDefinedBilling" id="useDefinedBilling">
                @else 
                    <input class="form-check-input" type="checkbox" value="Yes" checked name="useDefinedBilling" id="useDefinedBilling">
                @endif
                <label class="form-check-label" for="useDefinedBilling">
                    Use previously defined billing address
                </label>
            </div>
            @if (Auth::user()->shippingAddress() == null)
                @include('partials.checkoutAddressForm', ["addressType" => "billing", "countries" => $countries])
            @else 
                @include('partials.checkoutAddressInfo', ["addressType" => "billing"])
            @endif
        </div>

        <div class="col-lg-6 addressForm">
            <h4 class="text-center mb-4">Shipping Address</h4>
            <div class="row mt-4 ps-3">
                <div class="form-check text-md-start col-12">
                    <input class="form-check-input" checked type="radio" name="shippingUse" value="defined" id="useDefinedShipping">
                    <label class="form-check-label" for="useDefinedShipping">
                        Use previously defined shipping address
                    </label>
                </div>
                <div class="form-check text-md-start col-12">
                    <input class="form-check-input" type="radio" name="shippingUse" value="equal" id="shippingEqualBilling">
                    <label class="form-check-label" for="flexCheckDefault">
                        Use my billing address as my shipping address
                    </label>
                </div>
                <div class="form-check text-md-start col-12">
                    <input class="form-check-input" type="radio" name="shippingUse" value="other" id="otherShipping">
                    <label class="form-check-label" for="flexCheckDefault">
                        Insert a different shipping address
                    </label>
                </div>
            </div>
            @include('partials.checkoutAddressInfo', ['addressType' => 'shipping'])
        </div>
        
        <footer class="ps-4 mt-3 row">
            <button type="button" class="btn btn-dark col-lg-3 col-12"><i class="bi bi-arrow-left-circle"></i> Go Back</button>
            <button type="submit" class="btn btn-success offset-lg-6 col-lg-3 col-12">Proceed to Shipping <i class="bi bi-arrow-right-circle"></i></button>
        </footer>
    </form>
</div>