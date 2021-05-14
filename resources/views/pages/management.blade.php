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

<div class="container" style="width: 95%; margin: auto; display: grid; grid-template-rows: 25vh 25vh 10vh">
    <div style="text-align: center; font-size: 2.5rem; grid-column: 1;">
        <b>Hello, {{ Auth::user()["username"] }}</b>
    </div>
    <div class="text-center fs-3">
        <a>In case you need some sort of help, here are some useful links:</a>
    </div>
    <div class="text-center fs-4">
        <a href="/management/manageUsers">Manage users</a>
    </div>
    <div class="text-center fs-4">
        <a href="management/addItem">Add an item</a>
    </div>
</div>

@endsection