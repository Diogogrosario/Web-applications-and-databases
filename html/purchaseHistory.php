<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>

<div style="font-size: 2.5rem; grid-row: 1;">
    <a>Your purchase hustory: </a>
</div>

<div class="container pt-4 pb-4 overflow-auto rounded col-lg-10 col-12" style="background-color: lightgray; max-height:95vh">
    <div class="accordion" id="accordionExample" style="background-color: white">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">First Product<br>Second Product<br>Third Product</div>
                            <div class="col">22/02/2021<br><br>1999000.99€</div>
                        </div>
                    </div>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row border-bottom border-dark pb-3">
                        <div class="col-lg-1 align-self-center fs-3">
                            1x
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <img src="images/pc.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="col border-left border-dark">
                            <div class="row">
                                <div class="col-sm-8 col-12">
                                    <h2 class="title">Asus computer</h2>
                                    <p class="text">This asus computer is the best for it's price!</p>
                                </div>
                                <div class="col">
                                    <div class="flex-row">
                                        <span class="title fs-2">299.99€ </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col offset-lg-9 fs-3">Total: 299.99€</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">Davide<br>Henrique<br>João</div>
                            <div class="col">23/02/2021<br><br>76345678.99€</div>
                        </div>
                    </div>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">Shrek<br>Cyberpunk 2020<br>Minecraft Premium Edition</div>
                            <div class="col">24/02/2021<br><br>11111.11€</div>
                        </div>
                    </div>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.html'); ?>