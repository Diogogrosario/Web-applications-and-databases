<div class="user_review border-bottom mt-4" id={{"review_" . $review_id}}>
    <div class="row">
        <div class="col-lg-1 col-md-1 col-2">
            <div id="profilePic" class="d-flex rounded-circle" style="height:0;width:100%;padding-bottom:100%;background-color:red;background-image:url(images/spidercat.png);background-position:center;background-size:cover;">
            </div>
        </div>
        <b class="col-lg-5 col-4 review_usermame">{{ $review_user["username"] }}</b>
        <div class="col-lg d-flex review_starRating">
            <div class="col-lg-7">
            @for ($i = 0; $i < 5; $i++)
                @if ($i<$review_rating)
                    <i class="bi bi-star-fill"></i>
                @else
                    <i class="bi bi-star"></i>
                @endif
            @endfor
            </div>

            <div class="col text-center">
                {{ $review_date }}
            </div>

            @if (Auth::user()["user_id"] == $review_user["user_id"])
            <div class="col-lg-1">
                <button class="btn delete_review" style="background-color: transparent; color:red;" onclick={{"deleteReviewRequest(".$review_id.")"}}><i class="bi bi-trash-fill"></i></button>
            </div>
            @endif
        </div>
    </div>
    <div class="review_text mt-2 ms-2">
        <p> {{ $review_text }} </p>
    </div>
</div>