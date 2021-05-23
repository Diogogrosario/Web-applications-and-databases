<?php 
    if($addressType == "Shipping") {
        $address = $user->shippingAddress();
        $typeId = "shipping";
    }
    else {
        $address = $user->billingAddress();
        $typeId = "billing";
    }
?>
<section id="user{{$addressType}}">
    <div class="d-flex mb-2">
        <h2>{{$addressType}} Information</h2>
        @if ($user["user_id"] == Auth::user()["user_id"])
            <button type="button" class="btn btn-lg ms-3 p-0" onclick="{{"getAddressEditForm('".$typeId."')"}}"><i class="bi bi-pencil-square"></i></button>
        @endif
    </div>
    <table id="{{$typeId}}Info" class="table">
        @if ($address== null)
            <tbody id="{{$typeId}}InfoBody">
                <tr>
                    <th scope="row">Address</th>
                    <td>Not Set</td>
                </tr>
                <tr>
                    <th scope="row">City</th>
                    <td>Not Set</td>
                </tr>
                <tr>
                    <th scope="row">Zip-Code</th>
                    <td>Not Set</td>
                </tr>
                <tr>
                    <th scope="row">Country</th>
                    <td>Not Set</td>
                </tr>
            </tbody>
        @else
            <tbody id="{{$typeId}}InfoBody">
                <tr>
                    <th scope="row">Address</th>
                    <td>{{ $address["street"] }}</td>
                </tr>
                <tr>
                    <th scope="row">City</th>
                    <td>{{ $address["city"] }}</td>
                </tr>
                <tr>
                    <th scope="row">Zip-Code</th>
                    <td>{{ $address["zip_code"] }}</td>
                </tr>
                <tr>
                    <th scope="row">Country</th>
                    <td>{{ $address->country()["name"] }}</td>
                </tr>
            </tbody>
        @endif
    </table>
</section>