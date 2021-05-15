@extends('layouts.app')

@section('title')
    <title>Search Results</title>
@endsection



@section("content")


@include('partials.sidebarItem',["categories" => $categories])
@include('partials.sidebarFilter',["categories" => $categories])

<script src="{{asset('js/cart.js')}}" defer></script>
<script src="{{asset('js/wishlist.js')}}" defer></script>

@include('partials.searchResultList', ["searchResults" => $searchResults])
@endsection