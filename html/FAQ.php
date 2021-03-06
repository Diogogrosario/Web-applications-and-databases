<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>

<div style="text-align: center; font-size: 2.5rem; grid-row: 1; margin-bottom: 2rem;">
    <b>FAQ</b>
</div>
<div class="offset-md-2 col-8">
    <div class="accordion mb-4" id="QnA">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Q1 - How do I find a product?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#QnA">
                <div class="accordion-body">
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
                <div class="accordion-body">
                    A - When you have found a product you like, click on it. You will be redirected to the item's page. There, if the item is in stock, you can add it to cart.
                    After that, you can click the cart icon on the top right (next to your user picture) to checkout your purchase.
                </div>
            </div>
        </div>
    </div>
    <div class="accordion mb-4" id="QnA">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Q3 - How do I cancel an order?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#QnA">
                <div class="accordion-body">
                    A - If you added something to the cart that you do not wish to purchase, simply go to the cart page and remove it there.
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.html'); ?>