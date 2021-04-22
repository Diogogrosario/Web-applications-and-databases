<a class="item-card" href="{{ './item/' . $item["item_id"]}}">
    <div class="card border-0 border-right-1 h-100">
        <div class="card-body d-flex flex-column zoom">
            {{-- when we have actuall images
            <img src="{{ asset('img/phones/' . $item->photos->sortBy('photo_id')[0]) }}" class="card-img-top" alt="iPhone4">  --}}
            <img src="{{ $item->photos->sortBy('photo_id')[0]["path"] }}" class="card-img-top" alt="iPhone4">
            <section id="itemInfo">
                <h5 class="card-title text-truncate">{{ $item["name"] }}</h5>
                <p class="card-text">{{ $item["price"] }}</p>
            </section>
        </div>
    </div>
</a>