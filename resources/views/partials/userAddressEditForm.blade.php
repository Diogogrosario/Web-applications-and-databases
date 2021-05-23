@php
    if($addressType == "Shipping") {
        $address = $user->shippingAddress();
        $typeId = "shipping";
    }
    else {
        $address = $user->billingAddress();
        $typeId = "billing";
    }

    if($address == null){
        $street = "";
        $city = "";
        $zip = "";
        $countryID = -1;
    }
    else{
        $street = $address["street"];
        $city = $address["city"];
        $zip = $address["zip_code"];
        $countryID = $address["country_id"];
    }
@endphp

<section id="user{{$addressType}}">
    <div class="d-flex mb-2">
        <h2>{{$addressType}} Information</h2>
        @if ($user["user_id"] == Auth::user()["user_id"])
            <button type="button" class="btn btn-lg ms-3 p-0" onclick="{{"getAddressInfo('". $typeId ."')"}}"><i class="bi bi-x-circle-fill"></i></button>
        @endif
    </div>
    <form action="/userProfile/edit" method="post">
        {{ csrf_field() }}
        <table id="{{$typeId}}Info" class="table">
            <section id="{{$typeId}}Address">
                <tr>
                    <th scope="row">Address</th>
                    <td>        
                        <textarea name="newStreet" class="w-100 h-50" id="newStreet" rows=1 style="resize: none;">{{ $street }}</textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">City</th>
                    <td>        
                        <textarea name="newCity" class="w-100 h-50" id="newCity" rows=1 style="resize: none;">{{ $city }}</textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Zip-Code</th>
                    <td>        
                        <textarea name="newZip" class="w-100 h-50" id="newZip" rows=1 style="resize: none;">{{ $zip }}</textarea>
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
                        <button type="submit" id="{{"submitNew".$addressType."Address"}}" data-id="{{$user["user_id"]}}" class="mt-2 btn btn-success"><i class="bi bi-check-circle-fill"></i> Submit</button>
                    </td>
                </tr>
            </section>
        </table>
    </form>
</section>