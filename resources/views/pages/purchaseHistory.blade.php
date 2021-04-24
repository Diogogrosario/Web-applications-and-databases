@extends('layouts.app')

@section('title')
    <title>
        Purchase History
    </title>
@endsection

@section("content")




@include('partials.sidebarItem',["categories" => $categories])

    <div class="p-0" style="background-color:#f2f2f2;">

        <div id="userProfile" class="col-lg-10 col-12 p-lg-5 pt-lg-2 p-3 m-lg-auto shadow-lg-sm h-100" style="background-color:white; margin:0">
            <header>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ms-4">
                        <li class="breadcrumb-item"> <a class="link-dark" href={{"/userProfile/" . $user["user_id"]}}>User Profile</a></li>
                        <li class="breadcrumb-item active">Purchase History</li>
                    </ol>
                </nav>
                <h1 class="text-lg-start text-center ms-lg-5 mb-4">Purchase History</h1>

                <div class="row mt-3 ms-lg-3 ms-md-1 me-lg-5 me-md-2 border-bottom">
                    <div class="col-md-4 col-5">
                        Showing <span id="nResultsCurrent">1-{{$user->purchases()->count()}}</span> of <span id="totalResults">{{$user->purchases()->count()}}</span> purchases
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
                            <option value="1">Date: Most recent first</option>
                            <option value="2">Date: Least recent first</option>
                            <option value="3">Price: Most expensive first</i></option>
                            <option value="4">Price: Least expensive first <i class="bi bi-arrow-down-short"></i></option>
                        </select>
                    </div>
                </div>
            </header>


            <div class="accordion accordion-flush" id="purchaseHistory" style="background-color: white">

                
                @foreach ($user->purchases()->get() as $purchase)
                    @include("partials.purchaseHistoryEntry", array("purchase" => $purchase))
                @endforeach

            </div>

            <footer class="row mt-3 pt-2 ms-lg-3 ms-md-1 me-lg-5 me-md-2 border-top" id="searchControlsBottom">
                <div class="col-md-4 col-5">
                    Showing <span id="nResultsCurrent">1-{{$user->purchases()->count()}}</span> of <span id="totalResults">{{$user->purchases()->count()}}</span> purchases
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
    </div>

@endsection