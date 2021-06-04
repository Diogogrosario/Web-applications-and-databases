@extends('layouts.app')
@section('title')
    <title>FAQ</title>
@endsection

@section("content")
@include('partials.sidebarItem',["categories" => $categories])

<div class="p-0" style="background-color:#f2f2f2;">
    <div id="userProfile" class="container col-md-7 px-0 px-sm-2 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div style="text-align: center; font-size: 2.5rem; grid-row: 1; margin-bottom: 2rem;">
            <b>FAQ</b>
        </div>
        <div class="accordion mb-4" id="faq_list">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Q1 - How do I find a product?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                    <div class="accordion-body px-1 px-sm-3">
                        A - You can click in one of the sections on the left side of this page to view the different product categories of our website. There, you can search for a product you'd like, by name or by using a filter.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Q2 - How do I purchase a product?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                    <div class="accordion-body px-1 px-sm-3">
                        A - When you have found a product you like, click on it. You will be redirected to the item's page. There, if the item is in stock, you can add it to cart.
                        After that, you can click the cart icon on the top right (next to your user picture) to checkout your purchase.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Q3 - How do I cancel an order?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                    <div class="accordion-body px-1 px-sm-3">
                        A - If you added something to the cart that you do not wish to purchase, simply go to the cart page and remove it there.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Q4 - I've made an order. How can I check its status?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                    <div class="accordion-body px-1 px-sm-3">
                        A - You can see your <b>Purchase History</b> through your user profile. There you can check the details of your past orders and its current status.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Q5 - What payment options does the shop support?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive">
                    <div class="accordion-body px-1 px-sm-3">
                        A - At the moment, orders in the shop can be payed using <b>PayPal</b>. Users can also add balance to their account using PayPal at any time in the user page and perform purchases using the balance.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Q6 - Can I retrive money from my balance?
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix">
                    <div class="accordion-body px-1 px-sm-3">
                        A - When a user adds money to their balance, it cannot be reclaimed/refunded.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection