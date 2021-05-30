@extends('layouts.app')


@section('title')
    <title>
        {{-- Change to user's name --}}
        User Administration
    </title>
@endsection


@section("content")

<script  src="{{asset('js/managePurchases.js')}}" defer></script>


@include('partials.sidebarItem',["categories" => $categories])

<div class="p-0" style="background-color:#f2f2f2;">
    <div id="managePurchases" class="d-flex flex-column col-lg-10 col-12 p-lg-5 pt-lg-2 p-3 m-lg-auto shadow-lg-sm h-100" style="background-color:white; margin:0">
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="/management">Administration Area</a></li>
                <li class="breadcrumb-item active">Manage Purchases</li>
            </ol>
        </nav>

        <h2 class="text-lg-start text-center">Manage Purchases</h2>

        <div class="mb-3 text-md-end text-center">
            <input class="form-check-input" type="checkbox" value="" id="showArrived">
            <label class="form-check-label" for="showArrived">
                Show completed purchases (Arrived)
            </label>
        </div>

        <ul id="managePurchasesList" class="list-group list-unstyled">
            @foreach ($purchases as $purchase)
                @include('partials.purchaseManageEntry', array($purchase))
            @endforeach
        </ul>
    </div>
</div>

@endsection