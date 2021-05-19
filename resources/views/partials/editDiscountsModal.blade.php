<div class="modal fade" id="editDiscountsModal_{{$item['item_id']}}" data-id="{{$item['item_id']}}" tabindex="-1" aria-labelledby="editDiscountsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3 zoom">
                        <a class="item-card z" href={{"/item/" . $item["item_id"]}}>
                            <img src={{asset('img/items/' . $item->photos->sortBy('photo_id')[0]["path"])}} class="card-img-top mx-auto d-flex" id="searchResultItemImage" alt={{$item["name"]}}>
                        </a>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-12 ps-lg-3 ps-3 itemTitle text-lg-start text-center">
                                <h4 class="title col-12 d-flex flex-column justify-content-center">
                                    <a class="link-dark fs-5" href={{"./item/" . $item["item_id"]}}>
                                        {{$item["name"]}}
                                    </a>
                                </h4>
                            </div>
                            <div class="col-lg-6 col-12 d-flex flex-column justify-content-center h-50 align-items-center mt-lg-0 mt-2 text-center">
                                <span>
                                    {{-- TODO: check for discounts --}}
                                    <span class="title fs-3 itemPrice" id="editCartModalPrice" style="color:#e3203e">{{ $item["price"] }}</span>
                                    {{-- <small class="align-top itemPreviousPriceDiscount">    <--- original price
                                        <span class="title text-decoration-line-through">360€</span>
                                    </small> --}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mt-3 ps-2">Discounts</h4>
                <table class="table" id="discounts_list">
                    <thead>
                        <tr>
                            <th scope="col">Begin</th>
                            <th scope="col">End</th>
                            <th scope="col">Percentage</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->discounts()->get() as $discount)
                            <tr class="item_discount">
                                <td scope="row">{{$discount->getBeginDate()}}</td>
                                <td>{{$discount->getEndDate()}}</td>
                                <td>{{$discount['percentage']}}%</td>
                                <td class="p-0 pt-1"><button class="btn fs-4 p-0 m-0" id="deleteDiscount_{{$discount["discount_id"]}}" style="color:red;"><i class="bi bi-trash-fill"></i></button></td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table> 

                <form method="POST" class="text-start mt-4" action={{"/management/item/".$item['item_id']}}>
                    {{ csrf_field() }}
                    <fieldset>
                        <legend class="fs-4 ps-2">Add Discount</legend>
                        <div class="row" id="add_discount_dates">
                        <div class="col-md-6 col-12">
                        <label for="new_discount_{{$item['item_id']}}" class="col form-label ps-2">Begin date</label>
                        <input required type="date" class="form-control" name="begin_date" id="new_stock_{{$item['item_id']}}" value={{now()}}>
                        </div>

                        <div class="col-md-6 col-12">
                        <label for="new_discount_{{$item['item_id']}}" class="col form-label ps-2">End date</label>
                        <input required type="date" class="form-control" name="end_date" id="new_stock_{{$item['item_id']}}" value={{now()}}>
                        </div>
                    </div>

                        <label for="new_discount_{{$item['item_id']}}" class="col form-label mt-2 ps-2">Percentage</label>
                        <input required type="number" class="form-control mb-2" name="percentage" id="new_stock_{{$item['item_id']}}" placeholder="Percentage between 1-99">
                        
                        <button type="submit" id="editItemButton" data-id="{{$item['item_id']}}" class="btn btn-primary edit_item w-100" data-bs-dismiss="modal">Add Discount</button>
                        <button type="button" class="btn btn-secondary close_modals w-100 mt-5" data-bs-dismiss="modal">Cancel</button>
                    </fieldset>
                </form>
            </div> 
        </div>
    </div>
</div>