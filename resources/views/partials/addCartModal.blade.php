<div class="modal fade" id="addCartModal_{{$item['item_id']}}" data-id="{{$item['item_id']}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3 zoom">
                        <a class="item-card z" href={{"/item/" . $item["item_id"]}}>
                            <img src="{{ asset('img/items/' . $item->photos->sortBy('photo_id')[0]["path"]) }}" class="card-img-top mx-auto d-flex searchResultItemImage" alt="{{$item["name"]}}">
                        </a>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-12 ps-lg-3 ps-3">
                                <div class="itemTitle text-lg-start text-center">
                                    <h4 class="title col-12 d-flex flex-column justify-content-center">
                                        <a class="link-dark fs-5" href={{"./item/" . $item["item_id"]}}>
                                            {{$item["name"]}}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 d-flex flex-column justify-content-center h-50 align-items-center mt-lg-0 mt-2 text-center fs-3 item-price-modal" id="addCartModalPrice_{{$item["item_id"]}}" style="color:#e3203e">
                                @php
                                    $item_discount = $item->getDiscount();
                                @endphp
                                @if ($item_discount > 0)
                                    {{ $item->priceGivenDiscount($item_discount) }}
                                    <small class="align-top itemPreviousPriceDiscount text-decoration-line-through fs-6" style="color:black">
                                        {{$item['price']}}
                                    </small>
                                @else
                                    {{ $item['price'] }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" class="modal-footer text-start">
                    <label for="quantity_{{$item['item_id']}}" class="col form-label"> Quantity of items?</label>
                    <input required type="number" class="form-control" id="quantity_{{$item['item_id']}}" value="1" placeholder="Amount, I.e: 20">
                    
                    <button type="button" class="btn btn-primary add_cart_checkout close_modals w-100" data-bs-dismiss="modal">Add to cart and checkout</button>
                    <button type="button" class="btn btn-primary add_cart close_modals w-100" data-bs-dismiss="modal">Add to cart</button>
                    <button type="button" class="btn btn-secondary close_modals w-100" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div> 
        </div>
    </div>
</div>