<section id="userShipping">
    <div class="d-flex mb-2">
        <h2>Shipping Information</h2><button type="class" class="btn btn-lg ms-3 p-0" onclick="getShippingEditForm()"><i class="bi bi-pencil-square"></i></button>
    </div>
    <table id="shippingInfo" class="table">
        @if ($user->shippingAddress() == null)
            <tbody id="shippingInfoBody">
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
            <tbody id="shippingInfoBody">
                <tr>
                    <th scope="row">Address</th>
                    <td>{{ $user->shippingAddress()["street"] }}</td>
                </tr>
                <tr>
                    <th scope="row">City</th>
                    <td>{{ $user->shippingAddress()["city"] }}</td>
                </tr>
                <tr>
                    <th scope="row">Zip-Code</th>
                    <td>{{ $user->shippingAddress()["zip_code"] }}</td>
                </tr>
                <tr>
                    <th scope="row">Country</th>
                    <td>{{ $user->shippingAddress()->country()["name"] }}</td>
                </tr>
            </tbody>
        @endif
    </table>
</section>