@extends('layouts.app')


@section('title')
    <title>
        {{-- Change to user's name --}}
        User Administration
    </title>
@endsection


@section("content")

<script  src="{{asset('js/manageUsers.js')}}" defer></script>


@include('partials.sidebarItem',["categories" => $categories])
<nav aria-label="breadcrumb" class="mt-2">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="/management">Administration Area</a></li>
        <li class="breadcrumb-item active">Manage Purchases</li>
    </ol>
</nav>


@endsection