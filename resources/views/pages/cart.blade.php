@extends("layouts.app")

@section('title')
    <title>User Cart</title>
@endsection

@section("content")

@include('partials.sidebarItem',["categories" => $categories])

<script src="{{asset('js/cart.js')}}" defer></script>

@php
    if(Auth::user() == NULL) {
        $cart_items = CartController::anonCartEntries();
    }
@endphp

<section class="row" id="shopping_cart">


    <section class="col-lg-9 ps-md-5 d-flex flex-column flex-grow-1">
    <h2 class="d-none d-sm-block ms-5 mt-4">
        Your cart
        <button class="btn ms-1"  data-bs-container="body" data-bs-trigger="focus" data-bs-toggle="popover" title="Shopping Cart" data-bs-placement="right" data-bs-html="true" 
            data-bs-content="Here you can see the products you want to <b>order</b>, edit the desired <b>quantity</b> or <b>remove</b> them from the list.<br>
                            When you are ready to complete the purchase click <b>'Checkout'</b>">
            <i class="bi bi-question-circle-fill"></i>
        </button>
    </h2>

        <div class="list-group list-group-flush" id="cartList">      
            @if (Auth::user())
                @if ($user->cart()->count() == 0)
                    <p class="text-center fs-3 mt-5" style="background-color: #e8d0b0;"> Your cart is currently empty</p>
                @else
                    @foreach ($user->cart() as $item)
                        @include('partials.cartItemCard', array("item" => $item, "index" => $loop->index))
                    @endforeach
                @endif     
            @else
                @if (count($cart_items) == 0)
                    <p class="text-center fs-3 mt-5" style="background-color: #e8d0b0;"> Your cart is currently empty</p>
                @else
                    @foreach ($cart_items as $cart_item)
                        @include('partials.cartItemCard', array("item" => $cart_item, "index" => $loop->index))
                    @endforeach
                @endif 
            @endif           
        </div>
    </section>

    <div class="col-lg-3 flex-column d-flex border-start justify-content-center pb-3 mt-sm-5" id="totalInfo">
        @if (Auth::user())
            <section class="pb-4">
                <div class="text-center mx-auto fs-5">Total (w/ IVA):</div>
                <p class="fs-4 text-center mx-auto" id="cart_total">{{$user->cartTotal()}}</p>
            </section>
            @if ($user["user_id"] == Auth::user()["user_id"])  
                <div class="text-center ">
                    <form action="/checkout">
                        <button  type="submit" class="btn btn-success btn-lg w-50 mx-auto">Checkout</button>

                    </form>
                </div>
            @endif
        @else
            <section class="pb-4">
                <div class="text-center mx-auto fs-5">Total (w/ IVA):</div>
                <p class="fs-4 text-center mx-auto" id="cart_total">{{CartController::anonCartTotal($cart_items)}}</p>
            </section>
        @endif
        </div>
</section>
@endsection