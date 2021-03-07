<?php include_once('header.php'); ?>
<?php include_once('sidebarItem.html'); ?>

<div class="d-none d-sm-block" style="font-size: 2.5rem; grid-row: 1; padding-left: 4%;">
    <a>Your cart: </a>
</div>
<div class="row">
    <section class="col-lg-9">
        <div class="list-group list-group-flush" id="cartList">
            <div class="list-group-item p-0 row py-3">
                <div class="row">
                    <div class="col-lg-1 col-3 ps-3 align-self-center text-center fs-5">
                        1 x
                    </div>
                    <div class="col-lg-2 col-9 d-flex justify-content-center">
                        <a class="link-dark" href="#"><img src="images/computers/lenovoPc.jpg" class="img-fluid" alt="..."></a>
                    </div>
                    <div class="col-lg-7 col-12 border-left border-dark">
                        <div class="row mt-lg-0 mt-3">
                            <div class="col-12 ps-lg-0 ps-4">
                                <h5 class="title ps-4"><a class="link-dark" href="#">Lenovo Laptop Y-5634</a></h5>
                                <p class="text ps-4">This Lenovo laptop is the best for it's price, and it won't even heat up on your lap!</p>
                            </div>

                        </div>
                    </div>
                    <div class="col d-flex flex-column justify-content-center text-center">
                        <p><span class="title fs-5">299.99</span> €</p>
                    </div>
                </div>
            </div>
            <div class="list-group-item p-0 row py-3">
                <div class="row">
                    <div class="col-lg-1 col-3 ps-3 align-self-center text-center fs-5">
                        5 x
                    </div>
                    <div class="col-lg-2 col-9 d-flex justify-content-center">
                        <a class="link-dark" href="#"><img src="images/movies/beeMovie.png" class="img-fluid" alt="..."></a>
                    </div>
                    <div class="col-lg-7 col-12 border-left border-dark">
                        <div class="row mt-lg-0 mt-3">
                            <div class="col-12 ps-lg-0 ps-4">
                                <h5 class="title ps-4"><a class="link-dark" href="#">Bee Movie (2007)</a></h5>
                                <p class="text ps-4">Barry B. Benson, a bee just graduated from college, is disillusioned at his lone career choice: making honey.</p>
                            </div>

                        </div>
                    </div>
                    <div class="col d-flex flex-column justify-content-center text-center">
                        <p><span class="title fs-5">19.99</span> €</p>
                    </div>
                </div>
            </div>
            <div class="list-group-item p-0 row py-3">
                <div class="row">
                    <div class="col-lg-1 col-3 ps-3 align-self-center text-center fs-5">
                        1 x
                    </div>
                    <div class="col-lg-2 col-9 d-flex justify-content-center">
                        <a class="link-dark" href="#"><img src="images/computers/lenovoPc.jpg" class="img-fluid" alt="..."></a>
                    </div>
                    <div class="col-lg-7 col-12 border-left border-dark">
                        <div class="row mt-lg-0 mt-3">
                            <div class="col-12 ps-lg-0 ps-4">
                                <h5 class="title ps-4"><a class="link-dark" href="#">Alarco Gaming Pc</a></h5>
                                <p class="text ps-4">This gaming computer has everything that is needed for the best gaming experience!</p>
                            </div>

                        </div>
                    </div>
                    <div class="col d-flex flex-column justify-content-center text-center">
                        <p><span class="title fs-5">1500.00</span> €</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="col-lg-3 flex-column d-flex border-start justify-content-center pb-3" id="totalInfo">
        <section class="pb-4">
            <div class="text-center mx-auto fs-5">Total (w/ IVA):</div>
            <div class="fs-4 text-center mx-auto">1898.95€</div>
        </section>
        <div class="text-center ">
            <button type="button" class="btn btn-success btn-lg w-50 mx-auto">Checkout</button>
        </div>
    </section>
</div>

<?php include_once('footer.html'); ?>