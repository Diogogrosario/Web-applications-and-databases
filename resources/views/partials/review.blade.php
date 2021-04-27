<div class="row">
    <div class="col-lg-1 col-md-1 col-2">
        <div id="profilePic" class="d-flex rounded-circle" style="height:0;width:100%;padding-bottom:100%;background-color:red;background-image:url(images/spidercat.png);background-position:center;background-size:cover;">
        </div>
    </div>
    <b class="col-lg-5 col-4 review_usermame">{{ $review->user()[0]["username"] }}</b>
    <div class="col-lg review_starRating">
        <div class="col-lg-8">
        @for ($i = 0; $i < 5; $i++)
            @if ($i<$review["rating"])
                <i class="bi bi-star-fill"></i>
            @else
                <i class="bi bi-star"></i>
            @endif
        @endfor
        </div>
        <div class="col">
            {{ $review->getDate() }}
        </div>
    </div>
</div>
<div class="review_text mt-2 ms-2">
    <p> {{ $review["comment_text"] }} </p>
</div>