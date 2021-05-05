<div class="list-group-item cart-item p-0 row py-3" data-id="{{$item["item_id"]}}">
    
    <div class="row px-0 mx-0">
        <div class="col-lg-2 col-9 d-flex justify-content-center">
            <a class="link-dark" href={{"/item/" . $item["item_id"]}}><img src={{$item->photos->sortBy('photo_id')[0]["path"]}} class="img-fluid" alt="..."></a>
        </div>
        <div class="col-lg-6 col-12 border-left border-dark">
            <div class="row mt-lg-0 mt-3">
                <div class="col-12 ps-lg-0 ps-4">
                    <h5 class="title ps-4"><a class="link-dark" href={{"/item/" . $item["item_id"]}}>{{ $item["name"] }}</a></h5>
                    <p class="text ps-4">{{ $item["brief_description"] }}</p>
                </div>

            </div>
        </div>
        <div class="col d-flex flex-column justify-content-center text-center">
            <span class="title fs-5 mb-3">{{ $item["price"] }}</span>
        </div>
        <div class="col ps-3 mb-3 d-flex flex-row text-center fs-5 py-4">
            <input type="number" class="form-control product-quantity" data-id="{{$index}}" value="{{$item->pivot["quantity"]}}">
            <button class="btn btn-danger ms-3 remove_cart"><i class="bi bi-trash-fill"></i></button>
        </div>
    </div>
</div>
