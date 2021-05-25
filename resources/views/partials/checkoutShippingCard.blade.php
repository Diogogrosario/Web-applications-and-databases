<li class="list-group-item">
    <div class="form-check row">
        <div class="col-1">
            <input required class="form-check-input" type="radio" name="shippingMethod" value="{{$shipping_option['shipping_id']}}" id="shipping_{{$shipping_option['shipping_id']}}">
        </div>
        <div class="col-12">
            <label class="form-check-label row" for="shipping_{{$shipping_option['shipping_id']}}">
                <img src="{{asset("/img/deliveries/" . $shipping_option->image()->first()['path'])}}" class="d-md-inline d-none col-2 img-fluid thumbnail">
                <div class="col-7 ps-3 fs-5" class="shippingName">
                    {{$shipping_option['name']}}
                </div>
                <span class="shipping-price col-3 text-center">{{$shipping_option['price']}}</span>
            </label>
        </div>
    </div>
</li>