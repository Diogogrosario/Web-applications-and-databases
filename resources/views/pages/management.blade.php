@extends('layouts.app')

@section('title')
    <title>
        Management Main Page
    </title>
@endsection

@section("content")

@include('partials.sidebarItem',["categories" => $categories])

<nav aria-label="breadcrumb ">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Administration Area</li>
  </ol>
</nav>

<div class="container" style="width: 95%; margin: auto; display: grid; grid-template-rows: 20vh 15vh 10vh">
    <div style="text-align: center; font-size: 2.5rem; grid-column: 1;">
        <b>Hello, {{ Auth::user()["username"] }}</b>
    </div>
    <div class="text-center fs-3 ">
        <a>In case you need some sort of help, here are some useful links:</a>
    </div>

    <div class="text-center fs-4 btn btn-primary w-25 mx-auto mb-3">
        <a href="/management/manageUsers" class="text-white">Manage users</a>
    </div>
    <div class="text-center fs-4 btn btn-info w-25 mx-auto mb-3">
        <a href="/management/managePurchases" class="text-white">Manage purchases</a>
    </div>
    <div class="text-center fs-4 btn btn-primary w-25 mx-auto mb-3">
        <a href="management/addItem" class="text-white">Add an item</a>
    </div>

</div>

@endsection