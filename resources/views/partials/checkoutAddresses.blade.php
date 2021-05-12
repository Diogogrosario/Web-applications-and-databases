<div class="tab-pane fade show active" id="pills-addresses" role="tabpanel" aria-labelledby="pills-addresses-tab">
    <div class="row p-4" id="addresses_checkout">
        <div id="billingAddressDiv_checkout" class="col-lg-6 col-12">
            <h4 class="text-center mb-4">Billing Address</h4>
            <div class="form-check mt-4 ps-5">
                @if (Auth::user()->shippingAddress() == null)
                    <input class="form-check-input" type="checkbox" value="" disabled id="useDefinedBilling">
                @else 
                    <input class="form-check-input" type="checkbox" value="" checked id="useDefinedBilling">
                @endif
                <label class="form-check-label" for="useDefinedBilling">
                    Use previously defined billing address
                </label>
            </div>
            <table id="billingAddress_checkout" class="mt-4 mb-5 table">
                @if (Auth::user()->shippingAddress() == null)
                <tbody>
                    <tr>
                        <th scope="row">Address</th>
                        <td>Not Set</td>
                    </tr>
                    <tr>
                        <th scope="row">City</th>
                        <td>Not Set</td>
                    </tr>
                    <tr>
                        <th scope="row">Country</th>
                        <td>Not Set</td>
                    </tr>
                    <tr>
                        <th scope="row">Zip Code</th>
                        <td>Not Set</td>
                    </tr>
                </tbody>
                @else
                    <tbody>
                        <tr>
                            <th scope="row">Address</th>
                            <td>{{ Auth::user()->shippingAddress()["street"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">City</th>
                            <td>{{ Auth::user()->shippingAddress()["city"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Country</th>
                            <td>{{ Auth::user()->shippingAddress()->country()["name"] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Zip Code</th>
                            <td>{{ Auth::user()->shippingAddress()["zip_code"] }}</td>
                        </tr>
                    </tbody>
                @endif
            </table>
        </div>

        <div class="col-lg-6 addressForm">
            <h4 class="text-center mb-4">Shipping Address</h4>
            <div class="row mt-4 ps-3">
                <div class="form-check text-md-start col-12">
                    <input class="form-check-input" type="radio" name="shippingAddress" id="useDefinedShipping">
                    <label class="form-check-label" for="useDefinedShipping">
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
                    <input class="form-check-input" checked type="radio" name="shippingAddress" id="otherShipping">
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