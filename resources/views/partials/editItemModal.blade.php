<div class="modal fade" id="editItemModal_{{$item['item_id']}}" data-id="{{$item['item_id']}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-content modal-body">
        <div class="row">
            <div class="col-lg-3 zoom">
                <a class="item-card z" href={{"/item/" . $item["item_id"]}}>
                    <img src={{asset('img/items/' . $item->photos->sortBy('photo_id')[0]["path"])}} class="card-img-top mx-auto d-flex" alt="{{$item["name"]}}">
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
                    <div class="col-lg-6 col-12 d-flex flex-column justify-content-center h-50 align-items-center mt-lg-0 mt-2 text-center fs-3 item-price-modal" id="editCartModalPrice" style="color:#e3203e">
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
        <form method="POST" class="modal-footer text-start" action={{"/management/item/".$item['item_id']}}>
            {{ csrf_field() }}
            <label for="new_stock_{{$item['item_id']}}" class="col form-label"> New stock?</label>
            <input required type="number" class="form-control" name="stock" id="new_stock_{{$item['item_id']}}" value="{{ $item["stock"] }}" placeholder="Amount, I.e: 20">

            <label for="new_price_{{$item['item_id']}}" class="col form-label"> New Price?</label>
            <input required type="number" step="0.01" name="price" class="form-control" id="new_price_{{$item['item_id']}}" value="{{ $item->getPriceInt() }}" placeholder="Amount, I.e: 20">
            
            <button type="submit" id="editItemButton" data-id="{{$item['item_id']}}" class="btn btn-primary edit_item w-100" data-bs-dismiss="modal">Edit Item</button>
            <button type="button" class="btn btn-secondary close_modals w-100" data-bs-dismiss="modal">Cancel</button>
        </form>
    </div>
</div>