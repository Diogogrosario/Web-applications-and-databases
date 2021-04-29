@extends("layouts.app")

@section('title')
    <title>User Cart</title>
@endsection

@section("content")

@include('partials.sidebarItem',["categories" => $categories])

<script type="text/javascript" src="{{asset('js/cart.js')}}" defer></script>

<div class="d-none d-sm-block" style="font-size: 2.5rem; grid-row: 1; padding-left: 4%;">
    <a>Your cart: </a>
</div>
<div class="row">
    <section class="col-lg-9 ps-md-5">
        <div class="list-group list-group-flush" id="cartList">      
            @if ($user->cart()->count() == 0)
                <p> Your cart is currently empty</p>
            @else
                @foreach ($user->cart() as $item)
                    @include('partials.cartItemCard', array("item" => $item))
                @endforeach
            @endif                 
        </div>
    </section>

    <section class="col-lg-3 flex-column d-flex border-start justify-content-center pb-3" id="totalInfo">
        <section class="pb-4">
            <div class="text-center mx-auto fs-5">Total (w/ IVA):</div>
            <div class="fs-4 text-center mx-auto">{{$user->cartTotal()}}</div>
        </section>
        <div class="text-center ">
            <form action="/checkout">
                <button  type="submit" class="btn btn-success btn-lg w-50 mx-auto">Checkout</button>

            </form>
        </div>
    </section>
</div>
@endsection