
<div id="{{$addressType}}AddressFormCheckout" class="mt-4 mb-5 pe-lg-3 table text-lg-end">
    <div class="row">
        <label for="{{$addressType}}Street" class="form-label mb-0 col-lg-3">Address</label>
        <input type="text" class="form-control col" name="{{$addressType}}Street">
    </div>
    <div class="row mt-3">
        <label for="{{$addressType}}City" class="form-label col-lg-3">City</label>
        <input type="text" class="form-control col" name="{{$addressType}}City">
    </div>
    <div class="row mt-3">
        <label for="{{$addressType}}Country" class="form-label col-lg-3">Country</label>
        <select class="form-select col" aria-label="Country" name="{{$addressType}}Country">
            @foreach ($countries as $country)
            @if ($country["country_id"] == $countryID)
                <option selected value="{{ $country["country_id"] }}">{{ $country["name"] }}</option>
            @else
                <option value="{{ $country["country_id"] }}">{{ $country["name"] }}</option>
            @endif    
        @endforeach
        </select>
        <label for="{{$addressType}}Zipcode" class="form-label col-lg-3 mt-lg-0 mt-3">ZipCode</label>
        <input type="text" class="form-control col" name="{{$addressType}}Zipcode">
    </div>
</div>