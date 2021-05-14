@extends('layouts.app')


@section('title')
    <title>
        {{-- Change to user's name --}}
        {{$user["first_name"]}}'s Profile
    </title>
@endsection


@section("content")
@include('partials.sidebarItem',["categories" => $categories])

<script type="text/javascript" src="{{ asset('js/userPage.js') }}" defer></script>

<div class="p-0" style="background-color:#f2f2f2;">
    <div id="userProfile" class="container col-md-7 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-3 mb-1">
                <div id="profilePic" class="d-flex rounded-circle" style={{"height:0;width:100%;padding-bottom:100%;background-color:red;background-image:url(\"" . asset("/img/users/" . $user->image()->first()["path"]) . "\");background-position:center;background-size:cover;"}}>
                </div>
            </div>
            <div id="profileMainInfo" class="col-lg-5 col-md-9 col-9">
                <h2 class="px-2 pt-2">{{ $user["first_name"] }} {{ $user["last_name"]}} </h1>
                <p class="fs-5 px-2 fw-bold mt-lg-3 col-12 d-none d-md-block">Balance:<span class="fs-4 ms-2" style="color:green;">{{ $user["balance"] }}</span></p>
            </div>
            <p class="text-center d-block d-md-none px-2 fw-bold mt-lg-3 col-12">Balance:<span class="fs-4 ms-2" style="color:green;">{{ $user["balance"] }}</span></p>

            <div id="profileOptions" class="col-lg-4 col-md-12 col-sm-12">
                <a href={{$user["user_id"] . "/wishlist"}}>
                    <button type="button" class="btn btn-danger w-100 p-3 shadow rounded-0 rounded-top"><i class="bi bi-heart-fill me-2"></i>Wishlist</button></a>
                <br>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark w-100 p-3 shadow rounded-0" data-bs-toggle="modal" data-bs-target="#balanceModal">
                    Add balance
                </button>

                <!-- Modal -->
                <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="balanceModalLabel">Add balance to account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <label for="recipient-name" class="col-form-label"> How much would you like to add?</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">€</div>
                                        </div>
                                        <input type="number" class="form-control" id="recipient-name" placeholder="Amount, I.e: 20">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Procced to PayPal</button>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <a href={{$user["user_id"] . "/purchaseHistory"}}>
                    <button type="button" class="btn btn-light w-100 p-3 shadow-sm rounded-0 rounded-bottom">Purchase History</button></a>
            </div>
        
        </div>

        <section id="profileInfo" class="row mt-5">
            <div class="col-lg-8 col-12">
                <h2 class="mb-3">Account Info</h2>
                <div class="table-responsive">
                    <table id="accountInfo" class="table">
                        <tbody>
                            <tr id="username">
                                <th scope="row">Username</th>
                                <td>
                                    <section id="userNameContent">
                                        {{ $user["username"] }}
                                        <button type="class" class="btn" onclick="{{"editUsernameForm('" . $user["username"] . "'," . $user["user_id"] . ")" }}">
                                            <i class="bi bi-pencil-square" ></i>
                                        </button>
                                    </section>
                                </td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Password</th>
                                <td><button type="class" class="btn btn-dark">Change password</button></td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail</th>
                                <td>{{ $user["email"] }}<button type="class" class="btn"><i class="bi bi-pencil-square"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                @include('partials.userShippingInfo', array($user))
                
                <div class="d-flex mb-2">
                    <h2>Payment Information</h2><button type="class" class="btn btn-lg ms-3 p-0"><i class="bi bi-pencil-square"></i></button>
                </div>
                <table id="paymentInfo" class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Method</th>
                            <td>Paypal</td>
                        </tr>
                        <tr>
                            <th scope="row">Username</th>
                            <td>wafflepay</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-4 border-start" id="notifications">
                <h2 class="mb-3">Notifications</h2>
                <ul class="list-group list-group-flush">
                    @foreach ($user->unseenNotifications() as $notification)
                    @if ($notification->pivot["type"] == "Discount")
                        <li class="list-group-item d-flex">
                            <section class="col-10">
                                <a href={{"/item/" . $notification["item_id"]}}>{{ $notification["name"] }}</a> from your wish list is on sale! 
                            </section>
                            <section class="col d-flex align-items-center justify-content-center">

                                <form method="POST" action={{ "/notification/" . $notification->pivot["notification_id"] }}>
                                    {{ csrf_field() }}
                                    <button type="submit" data-id={{ $notification->pivot["notification_id"] }} class="deleteNotificationButton" style="background-color: white; border: none;">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>

                            </section>
                        </li>   
                    @else
                        <li class="list-group-item d-flex">
                            @if (Auth::user()["is_admin"] and $notification["stock"] == 0)
                                <section class="col-10">
                                    <a href={{"/item/" . $notification["item_id"]}}>{{ $notification["name"] }}</a> has ran out of stock!
                                </section>
                            @else
                                <section class="col-10">
                                    <a href={{"/item/" . $notification["item_id"]}}>{{ $notification["name"] }}</a> has stock again!
                                </section>
                            @endif
                            
                            <section class="col d-flex align-items-center justify-content-center">

                                <form method="POST" action={{ "/notification/" . $notification->pivot["notification_id"] }}>
                                    {{ csrf_field() }}
                                    <button type="submit" data-id={{ $notification->pivot["notification_id"] }} class="deleteNotificationButton" style="background-color: white; border: none;">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>

                            </section>
                        </li> 
                    @endif
                    @endforeach 
                </ul>
            </div>

        </section>

        <!-- Button trigger modal  -->
        <button type="button" class="btn btn-danger p-3 shadow mt-5" data-bs-toggle="modal" data-bs-target="#deleteAccount">
        <i class="bi bi-x-circle-fill"></i> Delete Account
             
        </button>

        <!-- Modal -->
        <div class="modal fade" id="deleteAccount" tabindex="-1" aria-labelledby="deleteAccountLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccountLabel">Are you sure you want to delete your account?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <label for="recipient-name" class="col-form-label"> This process cannot be reverted!</label>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <button id="deleteAccountButton" type="submit" class="btn btn-danger" onclick={{"deleteAccount(".$user["user_id"].")"}}>Yes, delete my account</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection