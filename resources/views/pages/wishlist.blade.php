@extends('layouts.app')

@section('title')
    <title>
        Wishlist
    </title>
@endsection

@section("content")

@include('partials.sidebarItem',["categories" => $categories])

<script type="text/javascript" src="{{asset('js/wishlist.js')}}" defer></script>

<nav class="mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb ms-4">
        <li class="breadcrumb-item"> <a class="link-dark" href={{"/userProfile/" . $user["user_id"]}}>User Profile</a></li>
        <li class="breadcrumb-item active">Wishlist</li>
    </ol>
</nav>

<div class="col d-flex flex-column">
    <header class="row mt-3 ms-lg-3 ms-md-1 me-lg-5 me-md-2 pe-lg-5 pe-md-1 border-bottom" id="searchControlsTop">
        <div class="col-md-4 col-5">
            Showing <span id="nResultsCurrent">1-{{$user->wishlist()->count()}}</span> of <span id="totalResults">{{$user->wishlist()->count()}}</span> items
        </div>
        <nav class="col-md-4 col-7 d-flex text-center justify-content-md-center justify-content-end" aria-label="Search Results Pages">
            <div class="d-flex flex-column justify-content-center">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item"><a class="page-link link-secondary">Previous</a></li>
                    <li class="page-item"><a class="page-link link-dark" href="#">1</a></li>
                    <li class="page-item"><a class="page-link link-secondary">Next</a></li>
                </ul>
            </div>
        </nav>
        <div class="col-md-4 col-12 d-flex justify-md-content-end justify-content-center">
            <label for="orderSelect" class="align-middle me-2">Order by </label>
            <select id="orderSelect" class="form-select form-select-sm w-50 border-bottom-0 rounded-0 rounded-top">
                <option value="1">Name A-Z</option>
                <option value="2">Name Z-A</option>
                <option value="3">Price: Most expensive first</i></option>
                <option value="4">Price: Least expensive first <i class="bi bi-arrow-down-short"></i></option>
            </select>
        </div>
    </header>
    <ul class="list-group list-group-flush px-md-5 px-1" id="wishItemsList">
        @foreach ($user->wishlist() as $item)
            @include('partials.wishlistItemCard', array("item" => $item))
        @endforeach
    </ul>
    <footer class="row mt-3 pt-2 ms-lg-3 ms-md-1 me-lg-5 me-md-2 pe-lg-5 pe-md-1 px-2 border-top" id="searchControlsBottom">
        <div class="col-md-4 col-5">
            Showing <span id="nResultsCurrent">1-{{$user->wishlist()->count()}}</span> of <span id="totalResults">{{$user->wishlist()->count()}}</span> items
        </div>
        <nav class="col-md-4 col-7 d-flex text-center justify-content-md-center justify-content-end" aria-label="Search Results Pages">
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item"><a class="page-link link-secondary">Previous</a></li>
                <li class="page-item"><a class="page-link link-dark" href="#">1</a></li>
                <li class="page-item"><a class="page-link link-secondary">Next</a></li>
            </ul>
        </nav>
    </footer>
</div>
@endsection