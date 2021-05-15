@extends('layouts.app')

@section('title')
    <title>HomePage</title>
@endsection


@section("content")
@include('partials.sidebarHome',["categories" => $categories])
<div class="col-lg-10 col pe-0">
    <div class="content" style="padding:2%">
        <div class="row">
            <div class="container pe-0">
                @if ($adds->count() > 0)
                    <div id="carouselProductImages" class="carousel carousel-dark slide" data-bs-interval="false" data-bs-touch="true">
                        <div class="carousel-indicators">
                            @foreach ($adds as $key => $add)
                                @if ($key == 0)
                                    <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                @else
                                    <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to={{$key}} aria-label="{{"Slide" . $key}}"></button>
                                @endif
                            @endforeach
                        </div>
                        <div class="carousel-inner" style="width:100%; height:20vh">
                            @foreach ($adds as $key => $add)
                                @if ($key == 0)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('img/sales/' . $add->image()->first()["path"]) }}" class="d-block img-fluid mx-auto" alt="{{ $add["title"] }}" style='height:20vh; width: 100%; object-fit: contain; max-height:40vh;'>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/sales/' . $add->image()->first()["path"]) }}" class="d-block img-fluid mx-auto" alt="{{ $add["title"] }}" style='height:20vh; width: 100%; object-fit: contain; max-height:40vh;'>
                                    </div>
                                @endif
                                
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
                @endif
                
                @foreach ($itemsArray as $items)
                    <section class="categoryLine">
                        <h2 class="ms-5 mt-3 mb-3">
                            <a class="category-text" href="{{"searchResults?category=" . $items[0]->category()["category_id"]}}">
                                {{ $items[0]->category()["name"] }}
                            </a>
                        </h2>
                        <div class="d-flex flex-row flex-nowrap itemsListMainPage">
                            @foreach ($items as $item)
                                @include('partials.homePageItemCard', array("item" => $item))
                            @endforeach
                        </div>
                    </section>
                <hr class="my-5" style="width:90%;margin-left:5%;">
                @endforeach

                {{-- <section class="categoryLine" id="phonesMain">
                    <h2 class="ms-5 mt-0 mb-3">
                        <a class="category-text" href="searchResults.php">
                            {{ $items2[0]->category()["name"] }}
                        </a>
                    </h2>
                    <div class="d-flex flex-row flex-nowrap" id="itemsListMainPage">
                        @foreach ($items2 as $item)
                            @include('partials.homePageItemCard', array("item" => $item))
                        @endforeach
                    </div>
                    </div>
                </section> --}}
            </div>
        </div>
    </div>
</div>
@endsection