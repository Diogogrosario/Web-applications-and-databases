<?php include_once('header.php'); ?>
<?php include_once('sidebarFilter.html'); ?>
<?php include_once('sidebarItem.html'); ?>


<div class="col d-flex flex-column">
    <header class="row mt-3 ms-3 me-5 pe-5 border-bottom" id="searchControlsTop">
        <div class="col-lg-4">
            Showing <span id="nResultsCurrent">1-3</span> of <span id="totalResults">3</span> items
        </div>
        <nav class="col-lg-4 d-flex text-center justify-content-center" aria-label="Search Results Pages">
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item"><a class="page-link link-secondary border-bottom-0 rounded-0 rounded-top">Previous</a></li>
                <li class="page-item"><a class="page-link link-dark border-bottom-0 rounded-0 rounded-top" href="#">1</a></li>
                <li class="page-item"><a class="page-link link-secondary border-bottom-0 rounded-0 rounded-top">Next</a></li>
            </ul>
        </nav>
        <div class="col-lg-4 d-flex justify-content-end">
            <label for="orderSelect" class="align-middle me-2">Order by </label>
            <select id="orderSelect" class="form-select form-select-sm w-50">
                <option value="1">Name A-Z</option>
                <option value="2">Name Z-A</option>
                <option value="3">Price: Most expensive first</i></option>
                <option value="4">Price: Least expensive first <i class="bi bi-arrow-down-short"></i></option>
            </select>
        </div>
    </header>
    <ul class="list-group list-group-flush px-5" id="searchItemsList">
        <li class="searchItem list-group-item pb-3 mt-3">
            <div class="row">
                <div class="col-lg-3 zoom">
                    <a class="item-card z" href="./item.php">
                        <img src="images/computers/pc.jpg" class="card-img-top mx-auto d-flex" id="searchResultItemImage" alt="Asus Computer">
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-sm-6 col-8 ps-5">
                            <a class="item-card" href="./item.php">
                                <h3 class="title">Asus computer</h3>
                                <section class="itemInfo">
                                    <p class="text">This asus computer is the best for it's price!</p>
                                    <p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </section>
                            </a>
                        </div>
                        <div class="col-sm-6 col-4">
                            <div class="d-flex justify-content-center">
                                <span class="title fs-3">300€ </span>
                                <small>
                                    <span class="title text-decoration-line-through">360€</span>
                                    <span class="title">20% off!</span>
                                </small>
                            </div>

                            <div class="d-flex justify-content-center pb-2">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#balanceModal">
                                    <i class="bi bi-cart-plus"></i> Add to cart
                                </button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-danger">
                                    Add to wishlist
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="balanceModalLabel">Add balance to account</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <label for="recipient-name" class="col-form-label"> Quantity of items?</label>
                                                <input type="number" class="form-control" id="recipient-name" placeholder="Amount">
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
                        <img src="images/computers/asusRog.jpg" class="card-img-top mx-auto d-flex" id="searchResultItemImage" alt="Asus ROG">
                    </a>
                </div>
                <div class="col-lg-9 border-left border-dark">
                    <div class="row">
                        <div class="col-sm-6 col-8 ps-5">
                            <a class="item-card" href="./item.php">
                                <h3 class="title">Asus Rog</h3>
                                <section class="itemInfo">
                                    <p class="text">This asus rog is going to make you better at any game!</p>
                                    <p class="text"><small class="text-muted">Last updated 10 mins ago</small></p>
                                </section>
                            </a>
                        </div>
                        <div class="col-sm-6 col-4 h-100">
                            <div class="d-flex justify-content-center">
                                <span class="title fs-3">2000€ </span>
                            </div>

                            <div class="d-flex justify-content-center pb-2">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#balanceModal">
                                    Add to cart!
                                </button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-danger">
                                    Add to wishlist!
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="balanceModalLabel">Add balance to account</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <label for="recipient-name" class="col-form-label"> Quantity of items?</label>
                                                <input type="number" class="form-control" id="recipient-name" placeholder="Amount">
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
                        <img src="images/cyberpunk_1.jpg" class="card-img-top mx-auto d-flex" id="searchResultItemImage" alt="Cuber Punk">
                    </a>
                </div>
                <div class="col-lg-9 border-left border-dark">
                    <div class="row">
                        <div class="col-sm-6 col-8 ps-5">
                            <a class="item-card" href="./item.php">
                                <h3 class="title">Cyber Punk</h3>
                                <section class="itemInfo">
                                    <p class="text">Cyber punk is a futuristic RPG that will blow you away with stuning graphics!</p>
                                    <p class="text"><small class="text-muted">Last updated 2 days ago</small></p>
                                </section>
                            </a>
                        </div>
                        <div class="col-sm-6 col-4 h-100">
                            <div class="d-flex justify-content-center">
                                <span class="title fs-3">59€ </span>
                            </div>
                            <div class="d-flex justify-content-center pb-2">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#balanceModal">
                                    Add to cart!
                                </button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-danger">
                                    Add to wishlist!
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="balanceModalLabel">Add balance to account</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <label for="recipient-name" class="col-form-label"> Quantity of items?</label>
                                                <input type="number" class="form-control" id="recipient-name" placeholder="Amount">
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
    <footer class="row mt-3 ms-3 me-5 pe-5 border-top" id="searchControlsBottom">
        <div class="col-lg-4 mt-1">
            Showing <span id="nResultsCurrent">1-3</span> of <span id="totalResults">3</span> items
        </div>
        <nav class="col-4 d-flex text-center justify-content-center" aria-label="Search Results Pages">
            <ul class="pagination pagination-sm">
                <li class="page-item"><a class="page-link link-secondary border-top-0 rounded-0 rounded-bottom">Previous</a></li>
                <li class="page-item"><a class="page-link link-dark border-top-0 rounded-0 rounded-bottom" href="#">1</a></li>
                <li class="page-item"><a class="page-link link-secondary border-top-0 rounded-0 rounded-bottom">Next</a></li>
            </ul>
        </nav>
    </footer>
</div>

<?php include_once('footer.html'); ?>