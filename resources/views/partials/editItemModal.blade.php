<div class="modal fade" id="editItemModal_{{$item['item_id']}}" data-id="{{$item['item_id']}}" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3 zoom">
                        <a class="item-card z" href={{"/item/" . $item["item_id"]}}>
                            <img src={{$item->photos->sortBy('photo_id')[0]["path"]}} class="card-img-top mx-auto d-flex" id="searchResultItemImage" alt={{$item["name"]}}>
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
                            <div class="col-lg-6 col-12 d-flex flex-column justify-content-center">
                                <div class="h-50 align-items-center mt-lg-0 mt-2 text-center">
                                    <span>
                                        {{-- TODO: check for discounts --}}
                                        <span class="title fs-3 itemPrice" style="color:#e3203e">{{ $item["price"] }}</span>
                                        {{-- <small class="align-top itemPreviousPriceDiscount">    <--- original price
                                            <span class="title text-decoration-line-through">360€</span>
                                        </small> --}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" class="modal-footer text-start" action={{"/management/item/".$item['item_id']}}>
                    {{ csrf_field() }}
                    <label for="new_stock_{{$item['item_id']}}" class="col form-label"> New stock?</label>
                    <input required type="number" class="form-control" name="stock" id="new_stock_{{$item['item_id']}}" value={{ $item["stock"] }} placeholder="Amount, I.e: 20">

                    <label for="new_price_{{$item['item_id']}}" class="col form-label"> New Price?</label>
                    <input required type="number" name="price" class="form-control" id="new_price_{{$item['item_id']}}" value={{ $item->getPriceInt() }} placeholder="Amount, I.e: 20">
                    
                    <button type="submit" class="btn btn-primary edit_item w-100">Edit Item</button>
                    <button type="button" class="btn btn-secondary close_modals w-100" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div> 
        </div>
    </div>
</div>