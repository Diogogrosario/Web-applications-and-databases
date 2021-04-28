<div class="list-group-item p-0 row py-3">
    
    <div class="row">
        <div class="col-lg-1 col-3 ps-3 align-self-center text-center fs-5">
            {{$item->pivot["quantity"]}} x
        </div>
        <div class="col-lg-2 col-9 d-flex justify-content-center">
            <a class="link-dark" href={{"/item/" . $item["item_id"]}}><img src={{$item->photos->sortBy('photo_id')[0]["path"]}} class="img-fluid" alt="..."></a>
        </div>
        <div class="col-lg-7 col-12 border-left border-dark">
            <div class="row mt-lg-0 mt-3">
                <div class="col-12 ps-lg-0 ps-4">
                    <h5 class="title ps-4"><a class="link-dark" href={{"/item/" . $item["item_id"]}}>{{ $item["name"] }}</a></h5>
                    <p class="text ps-4">{{ $item["brief_description"] }}</p>
                </div>

            </div>
        </div>
        <div class="col d-flex flex-column justify-content-center text-center">
            <p><span class="title fs-5">{{ $item["price"] }}</span></p>
        </div>
    </div>
</div>
