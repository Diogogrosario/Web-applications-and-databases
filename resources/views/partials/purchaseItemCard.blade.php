<div class="row border-bottom pb-3 vh-50">
    <div class="col-lg-1 ps-5 align-self-center fs-4">
        {{$item->pivot["quantity"]}}x
    </div>
    <div class="col-lg-2 col-md-2">
        <a class="item-card z" href={{"/item/" . $item["item_id"]}}>
            <img src="{{ asset('img/items/' . $item->photos->sortBy('photo_id')[0]["path"]) }}" class="card-img-top img-fluid" alt="{{$item["name"]}}">
        </a>
        
    </div>
    <div class="col-7 border-left border-dark">
        <div class="row">
            <div class="col-sm-8 col-12">
                <a class="item-card z" href={{"/item/" . $item["item_id"]}}>
                    <h3 class="title">{{$item["name"]}}</h3>
                    <p class="text">{{$item["brief_description"]}}</p>
                </a>
            </div>

        </div>
    </div>
    <div class="col d-flex flex-column justify-content-center text-center">
        <p><span class="title fs-5">{{ $item->pivot["price"] }}</span></p>
    </div>
</div>