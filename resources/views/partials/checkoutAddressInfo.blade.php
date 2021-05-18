<?php if($addressType == "billing") {
        $address = Auth::user()->billingAddress();
        } else {
            $address = Auth::user()->shippingAddress();
        }
    ?>

<table id="{{$addressType}}Address_checkout" class="mt-4 mb-5 table">
    @if ($address == null)
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
                <td>{{ $address["street"] }}</td>
            </tr>
            <tr>
                <th scope="row">City</th>
                <td>{{ $address["city"] }}</td>
            </tr>
            <tr>
                <th scope="row">Country</th>
                <td>{{ $address->country()["name"] }}</td>
            </tr>
            <tr>
                <th scope="row">Zip Code</th>
                <td>{{ $address["zip_code"] }}</td>
            </tr>
        </tbody>
    @endif
</table>