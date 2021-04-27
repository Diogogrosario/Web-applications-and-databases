@extends('layouts.app')


@section('title')
    <title>About Us</title>
@endsection

@section('content')
@include('partials.sidebarItem',["categories" => $categories])
    
<div class="p-0" style="background-color:#f2f2f2;">
    <div id="about" class="container col-md-7 px-0 px-sm-2 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="d-block">
            <div class="mb-5 text-center">
                <b class="fs-1">About us</b>
            </div>
            <div class="offset-md-1 col-md-10 fs-4">
                <a>Fneuc is a website created during the 2021's pandemic. <br> We created this website in order to help our customers during
                    those arduous times. Our aim is to provide our in shop service but in an online platform. This way our customers can still enjoy
                    the products we provided before the lockdown while staying at the comfort of their homes.</a>
            </div>
        </div>
    </div>
</div>
@endsection
