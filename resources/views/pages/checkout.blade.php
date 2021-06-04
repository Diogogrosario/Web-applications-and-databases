@extends('layouts.app')


@section('title')
    <title>Checkout</title>
@endsection

@section("content")
@include('partials.sidebarItem',["categories" => $categories])

@if (session('checkout_error'))
    <div class="alert alert-danger" role="alert">
    {{session()->pull('checkout_error')}}
    </div>
@endif

<script src="{{asset('js/checkout.js')}}" defer></script>

<div class="p-0" style="background-color:#f2f2f2;">
    <div id="checkoutPage" class="container col-lg-7 col-md-11 p-lg-4 p-3 shadow-sm h-100" style="background-color:white">
        <h2 class="ps-lg-5 mb-4">Checkout</h2>
        <ul class="nav nav-tabs mb-3 nav-fill text-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{$step == null ? "active" : "disabled"}} w-100" id="pills-overview-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab" aria-selected="false">
                    <span class="badge bg-{{$step == null ? "success" : "secondary"}} rounded-circle me-3">1</span>Overview
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{$step == 1 ? "active" : "disabled"}} w-100" id="pills-addresses-tab" data-bs-toggle="pill" data-bs-target="#pills-addresses" type="button" role="tab" aria-selected="true">
                    <span class="badge bg-{{$step == 1 ? "success" : "secondary"}} rounded-circle me-3">2</span>Addresses
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{$step == 2 ? "active" : "disabled"}} w-100" id="pills-shipping-tab" data-bs-toggle="pill" data-bs-target="#pills-shipping" type="button" role="tab" aria-selected="false">
                    <span class="badge bg-{{$step == 2 ? "success" : "secondary"}} rounded-circle me-3">3</span>Shipping
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{$step == 3 ? "active" : "disabled"}} w-100" id="pills-payment-tab" data-bs-toggle="pill" data-bs-target="#pills-payment" type="button" role="tab" aria-selected="false">
                    <span class="badge bg-{{$step == 3 ? "success" : "secondary"}} rounded-circle me-3">4</span>Payment
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @if ($step == null)
                @include('partials.checkoutOverview')        
            @endif

            @if ($step == 1)
                @include('partials.checkoutAddresses', array($countries))        
            @endif

            @if ($step == 2)
                @include('partials.checkoutShipping')        
            @endif

            @if ($step == 3)
                @include('partials.checkoutPayment')        
            @endif
        </div>
    </div>
</div>

@endsection