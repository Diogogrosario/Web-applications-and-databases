@extends("layouts.app")

@section('title')
    <title>User Cart</title>
@endsection

@section("content")

@include('partials.sidebarItem',["categories" => $categories])

<script src="{{asset('js/cart.js')}}" defer></script>

@php
    if(Auth::user() == NULL) {
        $cart_quantity = CartController::anonCartQuantity();
    }
@endphp

<section class="row" id="shopping_cart">


    <section class="col-lg-9 ps-md-5 d-flex flex-column flex-grow-1">
    <h2 class="d-none d-sm-block ms-5 mt-4">Your cart</h2>

        <div class="list-group list-group-flush" id="cartList">      
            @if (Auth::user())
                @if ($user->cart()->count() == 0)
                    <p> Your cart is currently empty</p>
                @else
                    @foreach ($user->cart() as $item)
                        @include('partials.cartItemCard', array("item" => $item, "index" => $loop->index))
                    @endforeach
                @endif     
            @else
                
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
                {{-- <p class="fs-4 text-center mx-auto" id="cart_total">{{$user->cartTotal()}}</p> --}}
            </section>
        @endif
        </div>
</section>
@endsection