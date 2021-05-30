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
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="/management">Administration Area</a></li>
        <li class="breadcrumb-item active">Manage Users</li>
    </ol>
</nav>

<div class="col">
    <div class="container flex-col">
        <div class="offset-lg-3 col-lg-6 offset-lg-3 d-block">
            <div class="input-group p-3 justify-content-center" id="userFilter">
                <div class="input-group-prepend">
                    <select class="form-select" id="filterType" aria-label="Default select example">
                        <option selected value="1">Username</option>
                        <option value="2">Name</option>
                    </select>
                </div>
                <input type="text" id="filterText" class="form-control" aria-label="Text input with dropdown button">
            </div>
        </div>

        <div class="row" id="table">
            @include("partials.manageUsersTable",array("users" => $users))
        </div>
    </div>
</div>
@endsection