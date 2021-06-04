@extends('layouts.app')

@section('title')
    <title>
        Wishlist
    </title>
@endsection

@section("content")

@include('partials.sidebarItem',["categories" => $categories])

<script src="{{asset('js/wishlist.js')}}" defer></script>

<div class="col d-flex flex-column">

<nav class="mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb ms-4">
        <li class="breadcrumb-item"> <a class="link-dark" href={{"/userProfile/" . $user["user_id"]}}>User Profile</a></li>
        <li class="breadcrumb-item active">Wishlist</li>
    </ol>
</nav>

    <header class="row ms-lg-3 ms-md-1 me-lg-5 me-md-2 pe-lg-5 pe-md-1" id="searchControlsTop">

        <h1 class="ms-5">Wishlist</h1> 

        <meta id="user_id" value={{$id}}>
        
        <div class="row mb-2 border-bottom d-flex flex-row-reverse">
            <div class="col-md-4 col-12 d-flex justify-md-content-end justify-content-center">
                <label for="orderSelect" class="align-middle me-2">Order by </label>
                <select id="orderSelect" class="form-select form-select-sm w-50 border-bottom-0 rounded-0 ">
                    <option value="1">Name A-Z</option>
                    <option value="2">Name Z-A</option>
                    <option value="3">Price: Most expensive first</option>
                    <option value="4">Price: Least expensive first</option>
                </select>
            </div>
        </div>
    </header>
    
    @include('partials.wishlistItemCard', array("items" => $user->wishlist()->orderBy("name","asc")->get()))

    
</div>
@endsection