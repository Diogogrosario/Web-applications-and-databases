<div id="{{$addressType}}AddressForm_checkout" class="mt-4 mb-5 pe-lg-3 table text-lg-end">
    <div class="row">
        <label for="{{$addressType}}StreetFormCheckout" class="form-label mb-0 col-lg-3">Address</label>
        <input type="text" class="form-control col" name="{{$addressType}}StreetFormCheckout" id="{{$addressType}}StreetFormCheckout">
    </div>
    <div class="row mt-3">
        <label for="{{$addressType}}CityFormCheckout" class="form-label col-lg-3">City</label>
        <input type="text" class="form-control col" name="{{$addressType}}CityFormCheckout" id="{{$addressType}}CityFormCheckout">
    </div>
    <div class="row mt-3">
        <label for="{{$addressType}}CountryFormCheckout" class="form-label col-lg-3">Country</label>
        <select class="form-select col" aria-label="Country" name="{{$addressType}}CountryFormCheckout" id="{{$addressType}}CountryFormCheckout">
            <option selected value="portugal">Portugal</option>
            <option value="spain">Spain</option>
            <option value="united_kingdom">United Kingdom</option>
        </select>
        <label for="{{$addressType}}ZipcodeFormCheckout" class="form-label col-lg-3 mt-lg-0 mt-3">ZipCode</label>
        <input type="text" class="form-control col" name="{{$addressType}}ZipcodeFormCheckout" id="{{$addressType}}ZipcodeFormCheckout">
    </div>
</div>