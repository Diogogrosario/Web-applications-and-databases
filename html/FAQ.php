<!-- Done -->

<?php include_once('header.php'); ?>
<?php include_once('sidebarItem.html'); ?>



<div class="p-0" style="background-color:#f2f2f2;">
    <div id="userProfile" class="container col-md-7 px-0 px-sm-2 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div style="text-align: center; font-size: 2.5rem; grid-row: 1; margin-bottom: 2rem;">
            <b>FAQ</b>
        </div>
        <div class="accordion mb-4" id="QnA">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Q1 - How do I find a product?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#QnA">
                    <div class="accordion-body px-1 px-sm-3">
                        A - You can click in one of the sections on the left side of this page to view the different product categories of our website. There, you can search for a product you'd like, by name or by using a filter.
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion mb-4" id="QnA">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Q2 - How do I purchase a product?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#QnA">
                    <div class="accordion-body px-1 px-sm-3">
                        A - When you have found a product you like, click on it. You will be redirected to the item's page. There, if the item is in stock, you can add it to cart.
                        After that, you can click the cart icon on the top right (next to your user picture) to checkout your purchase.
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion mb-4" id="QnA">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Q3 - How do I cancel an order?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#QnA">
                    <div class="accordion-body px-1 px-sm-3">
                        A - If you added something to the cart that you do not wish to purchase, simply go to the cart page and remove it there.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.html'); ?>