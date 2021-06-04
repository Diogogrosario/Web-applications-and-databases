<ul class="list-group list-group-flush px-md-5 px-1" id="wishItemsList">
    @foreach ($items as $item)
        <li class="searchItem list-group-item pb-3 mt-3">
            <div class="row">
                <div class="col-lg-3 zoom">
                    <a class="item-card z" href={{"/item/" . $item["item_id"]}}>
                        <img src="{{ asset('img/items/' . $item->photos->sortBy('photo_id')[0]["path"]) }}" class="card-img-top mx-auto d-flex searchResultItemImage" alt="Asus Computer">
                    </a>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12 ps-lg-3 ps-3">
                            <div class="itemTitle row text-sm-start text-center">
                                <h4 class="title col-sm-10 col-12  d-flex flex-column">
                                    <a class="link-dark" href={{"/item/" . $item["item_id"]}}>
                                        {{ $item["name"] }}
                                    </a>
                                </h4>
                                <div class="wishlistButton col">
                                    <button type="button" class="btn btn-lg p-0 px-1 wishlist-list remove-wishlist" data-id="{{$item['item_id']}}">
                                        <i class="bi bi-x-circle" style="color:red"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="itemInfo mt-3 ps-2">
                                <p class="text">{{ $item["brief_description"] }}</p>
                            </div>
                            <div class="itemAvailability ps-2 text-lg-start text-center">
                                @if ($item["stock"] > 0)
                                    <span class="badge bg-success" style="font-size:0.9em">In Stock</span>
                                @else
                                    <span class="badge bg-danger" style="font-size:0.9em">Out Of Stock</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="d-flex flex-column justify-content-center h-50 align-items-center mt-lg-0 mt-2">
                                <span>
                                    <span class="title fs-3 itemPrice" style="color:#e3203e">{{ $item->priceDiscounted() }}</span>
                                
                                </span>
                            </div>

                            <div class="addToCartItem d-flex mt-lg-0 mt-2 flex-column justify-content-center pb-2 h-50 align-items-center">
                                @if ($item["stock"]>0)
                                    <button type="button" class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#addCartModal_{{$item['item_id']}}">
                                        <i class="bi bi-cart-plus"></i> Add to cart
                                    </button>
                                @else
                                    <button type="button" disabled class="btn btn-secondary w-50">
                                        <i class="bi bi-cart-plus"></i> Add to cart
                                    </button>
                                @endif
                                
                            </div>

                            @include('partials.addCartModal',array($item))

                        </div>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>