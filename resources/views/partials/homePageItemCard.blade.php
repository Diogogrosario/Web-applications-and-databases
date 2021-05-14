<a class="item-card" href="{{ './item/' . $item["item_id"]}}">
    <div class="card border-0 border-right-1 h-100">
        <div class="card-body d-flex flex-column zoom">
            <img src="{{ asset('img/items/' . $item->photos->sortBy('photo_id')[0]["path"]) }}" class="card-img-top mx-auto" alt="{{ $item["name"] }}" style="height:auto;width:auto;">
            <section class="itemInfo">
                <h5 class="card-title text-truncate">{{ $item["name"] }}</h5>
                <p class="card-text">{{ $item["price"] }}</p>
            </section>
        </div>
    </div>
</a>