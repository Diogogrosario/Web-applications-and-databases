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
    <div class="container">
        <div class="offset-lg-3 col-lg-6 offset-lg-3">
            <div class="input-group p-3 justify-content-center">
                <div class="input-group-prepend">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select a filter </option>
                        <option value="1">Name</option>
                        <option value="2">User Name</option>
                    </select>
                </div>
                <input type="text" class="form-control" aria-label="Text input with dropdown button">
            </div>
        </div>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="d-none d-lg-table-cell">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col" class="d-none d-lg-table-cell">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $key => $user)
                        @include("partials.manageUsersCard",array("user" => $user, "key" => $key))
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection