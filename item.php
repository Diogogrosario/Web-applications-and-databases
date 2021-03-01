<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>

<div class="col">
    <div class="content">

        <div class="row">

            <div class="col-lg-2 col-sm-2 text-center overflow-auto" style="background-color:beige; height:100%;" id="similarProducts">

                <h1 class="p-3 text-center fs-5">Similar Products</h1>

                <div class="row-sm-2">
                    <div class="card" style="background:transparent;">
                        <img src="images/shrek2PS2.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="row-sm-2">
                    <div class="card" style="background:transparent;">
                        <img src="images/shrek2PS2.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="row-sm-2">
                    <div class="card" style="background:transparent;">
                        <img src="images/shrek2PS2.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="row-sm-2">
                    <div class="card" style="background:transparent;">
                        <img src="images/shrek2PS2.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="row-sm-2">
                    <div class="card" style="background:transparent;">
                        <img src="images/shrek2PS2.png" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col pt-4">
                <div class="row ps-5 pb-5">
                    <h1>Aquele jogo 2: A Sequela</h1>
                    <h3 class="ps-5">Videogame</h3>
                </div>
                <div class="row">
                    <div class="col-7">
                        <div id="carouselProductImages" class="carousel carousel-dark slide" data-bs-interval="false" data-bs-touch="true">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner" style="width:100%; height:40vh">
                                <div class="carousel-item active">
                                    <img src="images/shrek2PS2.png" class="d-block img-fluid mx-auto" alt="Shrek" style="max-height:40vh;">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/shrek2PS2_1.png" class="d-block img-fluid mx-auto" alt="Shrek" style="max-height:40vh;">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/shrek2PS2_2.png" class="d-block img-fluid mx-auto" alt="Shrek" style="max-height:40vh;">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductImages" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProductImages" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row" style="height:20%;">
                            <div class="col" id="productRating">
                                <span id="starRating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                    <i class="bi bi-star"></i>
                                </span>
                                <span id="numReviews">102 Reviews</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" id="buySection">
                                <div class="fs-1" id="productPrice" style="color:red;">
                                    10.99 €
                                </div>
                                <button class="btn btn-success">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-7 text-center">
                        <section id="productDetails">
                            <h2>Product Details</h2>
                        </section>
                    </div>
                    <div class="col">
                        <section id="productReviews">
                            <h2>Reviews</h2>
                        </section>
                    </div>
                </div>
            </div>



            <?php include_once('footer.html'); ?>