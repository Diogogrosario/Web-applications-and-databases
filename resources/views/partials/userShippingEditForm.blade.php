@php
    if($user->shippingAddress() == null){
        $street = "";
        $city = "";
        $zip = "";
        $countryID = -1;
    }
    else{
        $street = $user->shippingAddress()["street"];
        $city = $user->shippingAddress()["city"];
        $zip = $user->shippingAddress()["zip_code"];
        $countryID = $user->shippingAddress()["country_id"];
    }
@endphp

<section id="userShipping">
    <div class="d-flex mb-2">
        <h2>Shipping Information</h2><button type="button" class="btn btn-lg ms-3 p-0" onclick="getShippingInfo()"><i class="bi bi-x-circle-fill"></i></button>
    </div>
    <form action="/userProfile/edit" method="post">
        {{ csrf_field() }}
        <table id="shippingInfo" class="table">
            <section id="shippingAddress">
                <tr>
                    <th scope="row">Address</th>
                    <td>        
                        <textarea name="newStreet" class="w-100 h-50" id="newStreet" rows=1 style="resize: none;" placeholder="{{ $street }}"></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">City</th>
                    <td>        
                        <textarea name="newCity" class="w-100 h-50" id="newCity" rows=1 style="resize: none;" placeholder="{{ $city }}"></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Zip-Code</th>
                    <td>        
                        <textarea name="newZip" class="w-100 h-50" id="newZip" rows=1 style="resize: none;" placeholder="{{ $zip }}"></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Country</th>
                    <td>
                        <select class="w-100 h-50" name="newCountry" id="newCountry">
                            @foreach ($countries as $country)
                                @if ($country["country_id"] == $countryID)
                                    <option selected value="{{ $country["country_id"] }}">{{ $country["name"] }}</option>
                                @else
                                    <option value="{{ $country["country_id"] }}">{{ $country["name"] }}</option>
                                @endif    
                            @endforeach
                        </select>        
                        {{-- <textarea name="newCountry" class="w-100 h-50" id="newCountry" rows=1 style="resize: none;"></textarea> --}}
                        <button type="submit" id="submitNewAddress" data-id={{Auth::user()["user_id"]}} class="mt-2 btn btn-success"><i class="bi bi-check-circle-fill"></i> Submit</button>
                    </td>
                </tr>
            </section>
        </table>
    </form>
</section>