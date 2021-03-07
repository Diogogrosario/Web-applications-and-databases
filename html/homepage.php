<?php include_once('mainPageHeader.php'); ?>
<?php include_once('sidebarIndex.html'); ?>

<div class="col-lg-10 col pe-0">
    <div class="content" style="padding:2%">
        <div class="row">
            <div class="container pe-0">
                <div id="carouselProductImages" class="carousel carousel-dark slide" data-bs-interval="false" data-bs-touch="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner" style="width:100%; height:20vh">
                        <div class="carousel-item active">
                            <img src="images/wantMoreSales.jpg" class="img-fluid" alt="More Sales" style='height:20vh; width: 100%; object-fit: contain'>
                        </div>
                        <div class="carousel-item">
                            <img src="images/wantMoreSales2.jpg" class="d-block img-fluid mx-auto" style='height:20vh; width: 100%; object-fit: contain' alt="Shrek" style="max-height:40vh;">
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
                <a class="category-text" href="searchResults.php">
                    <p class="fs-1">PC</p>
                </a>
                <div class="d-flex flex-row" id="itemsListMainPage">

                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/computers/pc.jpg" class="card-img-top" alt="Asus Computer">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">Asus Computer</h5>
                                        <p class="card-text">300€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/computers/iMac.jpg" class="card-img-top" alt="iMac">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">iMac 27-Inch</h5>
                                        <p class="card-text">1000€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/computers/lenovoPc.jpg" class="card-img-top" alt="Lenovo Pc">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">Lenovo Chromebook</h5>
                                        <p class="card-text">250€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/computers/alarcoGamingPc.jpg" class="card-img-top" alt="Alarco Gaming Pc">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">Alarco Gaming Pc</h5>
                                        <p class="card-text">1500€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/computers/avantGardePc.jpg" class="card-img-top" alt="Avant Garde Gaming Pc">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">Avant Garde Gaming Pc</h5>
                                        <p class="card-text">999€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/computers/asusRog.jpg" class="card-img-top" alt="Asus Rog">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">Asus Republic Of Gaming Laptop</h5>
                                        <p class="card-text">2000€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <hr class="my-5" style="width:90%;margin-left:5%;">
                <a class="category-text" href="searchResults.php">
                    <p class="fs-1">Phones</p>
                </a>
                <div class="d-flex flex-row flex-nowrap" id="itemsListMainPage">
                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/phones/phone.jpg" class="card-img-top" alt="iPhone4">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">iPhone4</h5>
                                        <p class="card-text">250€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/phones/rogPhone.jpg" class="card-img-top" alt="Rog Phone 2">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">Rog Phone 2</h5>
                                        <p class="card-text">1000€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/phones/iPhone10.jpg" class="card-img-top" alt="iPhone10">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">iPhone10</h5>
                                        <p class="card-text">1200€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/phones/poco3.jpg" class="card-img-top" alt="Poco 3">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">Poco 3</h5>
                                        <p class="card-text">449€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/phones/redmi6A.jpg" class="card-img-top" alt="Redmi6A">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">Redmi6A</h5>
                                        <p class="card-text">600€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a class="item-card" href="./item.php">
                            <div class="card border-0 border-right-1 h-100">
                                <div class="card-body d-flex flex-column zoom">
                                    <img src="images/phones/razerPhone.jpg" class="card-img-top" alt="Razer Phone">
                                    <section id="itemInfo">
                                        <h5 class="card-title text-truncate">Razer Phone</h5>
                                        <p class="card-text">700€</p>
                                    </section>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.html'); ?>