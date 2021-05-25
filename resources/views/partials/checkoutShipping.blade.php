<div class="tab-pane fade show active" id="pills-shipping" role="tabpanel" aria-labelledby="pills-shipping-tab">
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
        {{session('error')}}
        </div>
    @endif
    <form method="post" action="{{action('CheckoutController@toPayment')}}" id="shippingChoose" class="p-3 px-lg-5 px-md-2 px-1">
        @csrf
        <h5 class="mb-4 ms-4 text-lg-start text-center">Please select the desired shipping method</h5>
        <ul class="list-group list-group-flush" id="shipping_list">
            @foreach ($shipping_options as $shipping_option)
                @include('partials.checkoutShippingCard', ["shipping_option" => $shipping_option])
            @endforeach
        </ul>
        <footer class="text-end mt-5 row">
            <button type="button" class="btn btn-dark col-lg-3 col-12 go_back_checkout" id="go_back_shipping"><i class="bi bi-arrow-left-circle"></i> Go Back</button>
            <button type="submit" class="btn btn-success offset-lg-6 col-lg-3 col-12">Proceed to Payment <i class="bi bi-arrow-right-circle"></i></button>
        </footer>
    </form>
</div>