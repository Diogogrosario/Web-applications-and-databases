@extends('layouts.app')

@section('title')
    <title>
        Purchase History
    </title>
@endsection

@section("content")

@include('partials.sidebarItem',["categories" => $categories])

<script src="{{asset('js/purchaseHistory.js')}}" defer></script>

<div class="p-0" style="background-color:#f2f2f2;">
    <div id="purchaseHistory" class=" d-flex flex-column col-lg-10 col-12 p-lg-5 pt-lg-2 p-3 m-lg-auto shadow-lg-sm h-100" style="background-color:white; margin:0">
        <header>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-4">
                    <li class="breadcrumb-item"> <a class="link-dark" href={{"/userProfile/" . $user["user_id"]}}>User Profile</a></li>
                    <li class="breadcrumb-item active">Purchase History</li>
                </ol>
            </nav>
            <h1 class="text-lg-start text-center ms-lg-4 mb-4">Purchase History</h1>

            @if (session('checkout_success'))
                <div class="alert alert-success" role="alert">
                {{session()->pull('checkout_success')}}
                </div>
            @endif

            <meta id="user_id" value="{{$id}}">

            <div class="row mt-3 mb-2 border-bottom d-flex flex-row-reverse">
                <div class="col-md-4 col-12 d-flex justify-md-content-end justify-content-center">
                    <label for="orderSelect" class="align-middle me-2">Order by </label>
                    <select id="orderSelect" class="form-select form-select-sm w-50 border-bottom-0 rounded-0 rounded-top">
                        <option value="1">Date: Most recent first</option>
                        <option value="2">Date: Least recent first</option>
                    </select>
                </div>
            </div>
        </header>


        @include("partials.purchaseHistoryEntry", array("purchases" => $user->purchases()->orderBy("date", "desc")->get()))
        
    </div>
</div>

@endsection