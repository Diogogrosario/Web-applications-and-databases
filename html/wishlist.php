<?php include_once('header.php'); ?>
<?php include_once('sidebarItem.html'); ?>

<nav class="mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb ms-4">
        <li class="breadcrumb-item"> <a class="link-dark" href="./user.php">User Profile</a></li>
        <li class="breadcrumb-item active">Wishlist</li>
    </ol>
</nav>

<div class="col d-flex flex-column">
    <header class="row mt-3 ms-lg-3 ms-md-1 me-lg-5 me-md-2 pe-lg-5 pe-md-1 border-bottom" id="searchControlsTop">
        <div class="col-md-4 col-5">
            Showing <span id="nResultsCurrent">1-3</span> of <span id="totalResults">3</span> items
        </div>
        <nav class="col-md-4 col-7 d-flex text-center justify-content-md-center justify-content-end" aria-label="Search Results Pages">
            <div class="d-flex flex-column justify-content-center">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item"><a class="page-link link-secondary">Previous</a></li>
                    <li class="page-item"><a class="page-link link-dark" href="#">1</a></li>
                    <li class="page-item"><a class="page-link link-secondary">Next</a></li>
                </ul>
            </div>
        </nav>
        <div class="col-md-4 col-12 d-flex justify-md-content-end justify-content-center">
            <label for="orderSelect" class="align-middle me-2">Order by </label>
            <select id="orderSelect" class="form-select form-select-sm w-50 border-bottom-0 rounded-0 rounded-top">
                <option value="1">Name A-Z</option>
                <option value="2">Name Z-A</option>
                <option value="3">Price: Most expensive first</i></option>
                <option value="4">Price: Least expensive first <i class="bi bi-arrow-down-short"></i></option>
            </select>
        </div>
    </header>
    <ul class="list-group list-group-flush px-md-5 px-1" id="searchItemsList">
        <li class="searchItem list-group-item pb-3 mt-3">
            <div class="row">
                <div class="col-lg-3 zoom">
                    <a class="item-card z" href="./item.php">
                        <img src="images/computers/pc.jpg" class="card-img-top mx-auto d-flex" id="searchResultItemImage" alt="Asus Computer">
                    </a>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12 ps-lg-3 ps-3">
                            <div class="itemTitle row text-sm-start text-center">
                                <h4 class="title col-sm-10 col-12  d-flex flex-column">
                                    <a class="link-dark" href="./item.php">
                                        Asus computer
                                    </a>
                                </h4>
                                <div class="wishlistButton col">
                                    <button type="button" class="btn btn-lg p-0 px-1">
                                        <i class="bi bi-x-circle" style="color:red"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="itemInfo mt-3 ps-2">
                                <p class="text">This asus computer is the best for it's price!</p>
                            </div>
                            <div class="itemAvailability ps-2 text-lg-start text-center">
                                <span class="badge bg-success" style="font-size:0.9em">In Stock</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="d-flex flex-column justify-content-center h-50 align-items-center mt-lg-0 mt-2">
                                <span>
                                    <span class="title fs-3 itemPrice" style="color:#e3203e">300€</span>
                                    <small class="align-top itemPreviousPriceDiscount">
                                        <span class="title text-decoration-line-through">360€</span>
                                        <!-- <span class="title">20% off!</span> -->
                                    </small>
                                </span>
                            </div>

                            <div class="addToCartItem d-flex mt-lg-0 mt-2 flex-column justify-content-center pb-2 h-50 align-items-center">
                                <button type="button" class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#balanceModal">
                                    <i class="bi bi-cart-plus"></i> Add to cart
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form>
                                                <label for="recipient-name" class="col-form-label"> Quantity of items?</label>
                                                <input type="number" class="form-control" id="recipient-name" placeholder="Amount, I.e: 20">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Add to cart</button>
                                            <button type="button" class="btn btn-primary">Add to cart and checkout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="searchItem list-group-item pb-3 mt-3">
            <div class="row">
                <div class="col-lg-3 zoom">
                    <a class="item-card z" href="./item.php">
                        <img src="images/computers/asusRog.jpg" class="card-img-top mx-auto d-flex" id="searchResultItemImage" alt="Asus Rog">
                    </a>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12 ps-lg-3 ps-3">
                            <div class="itemTitle row text-sm-start text-center">
                                <h4 class="title col-sm-10 col-12  d-flex flex-column">
                                    <a class="link-dark" href="./item.php">
                                    Asus Rog
                                    </a>
                                </h4>
                                <div class="wishlistButton col">
                                    <button type="button" class="btn btn-lg p-0 px-1">
                                        <i class="bi bi-x-circle" style="color:red"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="itemInfo mt-3 ps-2">
                                <p class="text">This asus rog is going to make you better at any game!</p>
                            </div>
                            <div class="itemAvailability ps-2 text-lg-start text-center">
                                <span class="badge bg-success" style="font-size:0.9em">In Stock</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="d-flex flex-column justify-content-center h-50 align-items-center mt-lg-0 mt-2">
                                <span>
                                    <span class="title fs-3" style="color:#e3203e">2000€</span>
                                </span>
                            </div>

                            <div class="addToCartItem d-flex mt-lg-0 mt-2 flex-column justify-content-center pb-2 h-50 align-items-center">
                                <button type="button" class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#balanceModal">
                                    <i class="bi bi-cart-plus"></i> Add to cart
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form>
                                                <label for="recipient-name" class="col-form-label"> Quantity of items?</label>
                                                <input type="number" class="form-control" id="recipient-name" placeholder="Amount, I.e: 20">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Add to cart</button>
                                            <button type="button" class="btn btn-primary">Add to cart and checkout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="searchItem list-group-item pb-3 mt-3">
            <div class="row">
                <div class="col-lg-3 zoom">
                    <a class="item-card z" href="./item.php">
                        <img src="images/cyberpunk_1.jpg" class="card-img-top mx-auto d-flex" id="searchResultItemImage" alt="CyberPunk2077">
                    </a>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12 ps-lg-3 ps-3">
                            <div class="itemTitle row text-sm-start text-center">
                                <h4 class="title col-sm-10 col-12  d-flex flex-column">
                                    <a class="link-dark" href="./item.php">
                                    Cyber Punk
                                    </a>
                                </h4>
                                <div class="wishlistButton col">
                                    <button type="button" class="btn btn-lg p-0 px-1">
                                        <i class="bi bi-x-circle" style="color:red"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="itemInfo mt-3 ps-2">
                                <p class="text">Cyber punk is a futuristic RPG that will blow you away with stuning graphics!</p>
                            </div>
                            <div class="itemAvailability ps-2 text-lg-start text-center">
                                <span class="badge bg-danger" style="font-size:0.9em">Out of Stock</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="d-flex flex-column justify-content-center h-50 align-items-center mt-lg-0 mt-2">
                                <span>
                                    <span class="title fs-3" style="color:#e3203e">59€</span>
                                </span>
                            </div>

                            <div class="addToCartItem d-flex mt-lg-0 mt-2 flex-column justify-content-center pb-2 h-50 align-items-center">
                                <button type="button" disabled class="btn btn-secondary w-50" data-bs-toggle="modal" data-bs-target="#balanceModal">
                                    <i class="bi bi-cart-plus"></i> Add to cart
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form>
                                                <label for="recipient-name" class="col-form-label"> Quantity of items?</label>
                                                <input type="number" class="form-control" id="recipient-name" placeholder="Amount, I.e: 20">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Add to cart</button>
                                            <button type="button" class="btn btn-primary">Add to cart and checkout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <footer class="row mt-3 pt-2 ms-lg-3 ms-md-1 me-lg-5 me-md-2 pe-lg-5 pe-md-1 px-2 border-top" id="searchControlsBottom">
        <div class="col-md-4 col-5">
            Showing <span id="nResultsCurrent">1-3</span> of <span id="totalResults">3</span> items
        </div>
        <nav class="col-md-4 col-7 d-flex text-center justify-content-md-center justify-content-end" aria-label="Search Results Pages">
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item"><a class="page-link link-secondary">Previous</a></li>
                <li class="page-item"><a class="page-link link-dark" href="#">1</a></li>
                <li class="page-item"><a class="page-link link-secondary">Next</a></li>
            </ul>
        </nav>
    </footer>
</div>

<?php include_once('footer.html'); ?>