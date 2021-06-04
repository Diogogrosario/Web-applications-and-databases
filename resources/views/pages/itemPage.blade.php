@extends('layouts.app')

@section('title')
    <title>
        {{$item["name"]}}
    </title>
@endsection


@section("content")

@php echo("<script>history.replaceState({},'','$url');</script>"); @endphp

@include('partials.sidebarItem',["categories" => $categories])

<script src="{{asset('js/cart.js')}}" defer></script>
<script src="{{asset('js/wishlist.js')}}" defer></script>


<div class="col">
    <div class="content">
        <div class="row">
            <div class="d-lg-block d-none col-lg-2 text-center p-0" style="background-color:#f0e9e1; min-height:100%" id="similarProducts">
                <h1 class="p-3 text-center fs-5 overflow-hidden">Similar Products</h1>
                @foreach ($item->getRandomItemsSameCategory(3) as $randomItem)
                    <a class="item-card zoom" href="{{'./' . $randomItem["item_id"]}}">
                        <div class="card border-0 similarProductCard">
                            <div class="card-body ps-4 pe-3">
                                {{-- TODO: Change when we have images--}}
                                <img src="{{ asset('img/items/' . $randomItem->photos->sortBy('photo_id')[0]["path"]) }}" class="card-img-top" alt="{{ $randomItem["name"] }}">
                                <section class="itemInfo">
                                    <h5 class="card-title">{{$randomItem["name"]}}</h5>
                                    <p class="card-text item-price">{{$randomItem->priceDiscounted()}}</p>
                                </section>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="col pt-4">
                <div class="row ps-lg-5 pb-lg-5 pb-2 pt-2">
                    <h1 id="productName" class="text-lg-start text-center">{{$item["name"]}}</h1>
                    <!-- <h4 class="ps-5" id="productCategory">Videogame</h4> -->
                </div>
                <div class="row" id="itemPhotosAndGenericInfo">
                    <div class="col-lg-7 col-md-6" id="itemPhotosCarrosel">
                        <div id="carouselProductImages" class="carousel carousel-dark slide" data-bs-interval="false" data-bs-touch="true">
                            <div class="carousel-indicators">
                                @foreach ($item->photos as $key => $photo)
                                    @if ($key==0)
                                        <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        
                                    @else
                                        <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="{{ $key }}" aria-label="{{'Slide' . ($key+1)}} "></button>
                                        
                                    @endif
                                @endforeach
                            </div>
                            <div class="carousel-inner d-flex" style="width:100%; height:40vh">
                                
                                @foreach ($item->photos->sortBy('photo_id') as $key => $item_photo)
                                    @if ($key==0)
                                        <div class="carousel-item active text-center">
                                    @else
                                        <div class="carousel-item text-center">    
                                    @endif
                                        <img src="{{ asset('img/items/' . $item_photo["path"]) }}" class="card-img-top  mx-auto" alt="{{ $item["name"] . "image"}}" style="max-height:40vh;height:auto;width:auto;max-width:80%;display:block;">  
                                    </div>
                                @endforeach
                                
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductImages" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProductImages" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-12 offset-md-0 mt-md-0 mt-3" id="ratingAndButtons">
                        <div class="row mb-3 text-md-start text-center">
                            <div class="col" id="productRating">
                                <span id="starRating">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if($i<$item["score"] && ($i+1)>$item["score"]) {{-- for half stars --}}
                                            <i class="bi bi-star-half"></i>
                                        @elseif ($i<$item["score"])
                                            <i class="bi bi-star-fill"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif
                                        
                                    @endfor
                                    
                                </span>
                                <span id="numReviews">{{$item->reviews()->count()}} Reviews</span>
                            </div>
                        </div>
                                        
                        <div class="row mb-3">
                            <div class="col-lg-8 col-12 ps-md-3 pe-md-5" id="buySection">
                                <div class="ps-lg-4 ps-md-0 text-lg-start text-center mb-3" id="productPrice" style="color:red; font-size:3em;">
                                    @php
                                        $discount = $item->getDiscount();
                                    @endphp
                                    {{$item->priceGivenDiscount($discount)}}
                                    @if ($discount > 0)
                                        <small class="text-decoration-line-through" style="color:black; font-size:0.5em;">{{$item['price']}}</small>
                                    @endif
                                </div>
                                <div class="text-center fs-5 mb-1"><span id="stockDisplay" style="color:green">{{ $item["stock"] }}</span> in stock</div>

                                <section id="itemActionButtons">
                                    <button type="button" class="btn btn-success w-100 btn-lg rounded-top rounded-0" data-bs-toggle="modal" data-bs-target="#addCartModal_{{$item['item_id']}}">
                                        <i class="bi bi-cart-plus"></i> Add to cart
                                    </button>
                                    <!-- Modal -->
                                    @if ($item["stock"]>0)
                                        @include('partials.addCartModal',array($item))
                                    @endif
                                    <?php $user = Auth::user()?>
                                    @if (!($user === null))
                                        @if ($user->wishlistItem($item["item_id"])->count() > 0)
                                            <button class="btn btn-danger w-100 btn-lg rounded-bottom rounded-0 wishlist remove-wishlist" data-id="{{$item['item_id']}}"><i class="bi bi-heart-fill"></i> Remove from Wishlist</button>   
                                        @else
                                            <button class="btn btn-danger w-100 btn-lg rounded-bottom rounded-0 wishlist add-wishlist" data-id="{{$item['item_id']}}"><i class="bi bi-heart"></i> Add to Wishlist</button>
                                            
                                        @endif
                                    @endif
                                    @if (!($user === null))
                                        @if ($user["is_admin"])
                                            @include('partials.editItemModal',array($item))
                                            <button type="button" class="btn btn-secondary mt-2 w-100 btn-lg rounded-top rounded-0" data-bs-toggle="modal" data-bs-target="#editItemModal_{{$item['item_id']}}">
                                                <i class="bi bi-pencil-square"></i> Edit item
                                            </button>

                                            @include('partials.editDiscountsModal',array($item))
                                            <button type="button" class="btn btn-secondary w-100 btn-lg rounded-0" style="background-color: #4f4f4f" data-bs-toggle="modal" data-bs-target="#editDiscountsModal_{{$item['item_id']}}">
                                                <i class="bi bi-pencil-square"></i> Edit Discounts
                                            </button>

                                            @if (!$item["is_archived"])
                                                @include('partials.deleteItemModal',array($item))
                                            @else
                                                @include('partials.addItemModal',array($item))
                                            @endif
                                        @endif
                                    @endif
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <nav>
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="false">Description</button>
                            <button class="nav-link" id="nav-details-tab" data-bs-toggle="tab" data-bs-target="#nav-details" type="button" role="tab" aria-controls="nav-details" aria-selected="false">Details</button>
                            <button class="nav-link" id="nav-reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews" type="button" role="tab" aria-controls="nav-reviews" aria-selected="true">Reviews</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                            <section class="px-md-5 px-2" id="productDescription">
                                <h3 class="text-start mt-4">Description</h3>
                                <div class="mt-4 text-justify pb-5" id="descriptionText">
                                    @foreach(explode('\n',$item["description"]) as $row)
                                        <p>{{ $row }}</p>
                                    @endforeach
                                </div>
                            </section>
                        </div>

                        {{-- Item Details --}}
                        <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                            @include("partials.itemDetails", array("item" => $item))
                        </div>

                        <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                            <section class="px-md-5 px-2 col-lg-8 col-md-10 col-12 offset-lg-2 offset-md-1" id="reviewSection">
                                <h3 class="text-start mt-4">Reviews <span class="fs-5" id="n_reviews">({{ $item->reviews()->count() }})</span></h3>
                                
                                <script src="{{asset('js/item_page.js')}}" defer></script>

                                @if (Auth::check() && !Auth::user()->reviewed($item['item_id']))
                                    @if (Auth::user()->hasVerifiedEmail())
                                        <form class="mt-4 mb-5" id="newReviewForm">
                                            {{csrf_field()}}
                                            <input type="hidden" id="item_id" value="{{ $item['item_id'] }}">
                                            <textarea required class="form-control" id="new_review_text" name="review_text" placeholder="Leave a review here" aria-label="Review textarea" maxlength="400" style="resize:none;"></textarea>
                                            
                                            <div id="newReviewStar" class="rate">
                                                <input type="radio" id="star5" name="rate" value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" name="rate" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" name="rate" value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" name="rate" value="2" />
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" name="rate" value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>

                                            <div class="text-end m-md-0 mt-2">
                                                <span class="btn-light" data-bs-toggle="tooltip" data-bs-placement="left" title="Your review will be visible to other users"><i class="bi bi-exclamation-circle-fill"></i></span>
                                                <button type="button" form="newReviewForm" class="btn btn-dark btn-md col-md-6 col-lg-4 col-12 rounded-bottom rounded-0">Submit your review</button>
                                            </div>
                                        </form>
                                    @endif
                                @endif
                                
                                <section class="mt-4" id="productReviews">
                                    @foreach ($item->reviews()->get() as $review)
                                        @include("partials.review",array($review))
                                    @endforeach
                                </section>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection