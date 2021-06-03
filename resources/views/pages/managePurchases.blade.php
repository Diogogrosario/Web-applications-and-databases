@extends('layouts.app')


@section('title')
    <title>
        Manage Purchases - Fneuc
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

        <div class="d-flex">
            <h2 class="text-lg-start text-center">Manage Purchases</h2>
            <div class="spinner-border ms-2 d-none" role="status" id="manage_purchases_spinner">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>


        <div class="mb-3 text-md-end text-center">

            <input class="form-check-input" type="checkbox" value="" id="showArrived">
            <label class="form-check-label" for="showArrived">
                Show completed purchases (Arrived)
            </label>
        </div>

        @include('partials.purchaseManageList', array($purchases))

    </div>
</div>

@endsection