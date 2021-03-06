<?php include_once('header.html'); ?>
<?php include_once('sidebarFilter.html'); ?>


<div class="col">
    <div class="content" style="padding:2%">
        <div class="row">
            <div class="container">
                <ul class="list-group">
                    <li class="row border-bottom border-dark pb-3 mt-3">
                        <div class="col-lg-3 zoom">
                            <a class="item-card z" href="./item.php">
                                <img src="images/computers/pc.jpg" class="card-img-top" alt="Asus Computer" style="height:100%;">
                            </a>
                        </div>
                        <div class="col-lg-9 border-left border-dark">
                            <div class="row">
                                <div class="col-sm-6 col-8 ps-5">
                                    <a class="item-card" href="./item.php">
                                        <h2 class="title">Asus computer</h2>
                                        <section class="itemInfo">
                                            <p class="text">This asus computer is the best for it's price!</p>
                                            <p class="text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </section>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-4">
                                    <div class="d-flex justify-content-center">
                                        <span class="title fs-2">300€ </span>
                                        <small>
                                            <span class="title text-decoration-line-through">360€</span>
                                            <span class="title">20% off!</span>
                                        </small>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#balanceModal">
                                            Add to cart!
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
                    </li>
                    <li class="row border-bottom border-dark pb-3 mt-3">
                        <div class="col-lg-3 zoom">
                            <a class="item-card z" href="./item.php">
                                <img src="images/computers/asusRog.jpg" class="card-img-top" alt="Asus ROG" style="height:100%;">
                            </a>
                        </div>
                        <div class="col-lg-9 border-left border-dark">
                            <div class="row">
                                <div class="col-sm-6 col-8 ps-5">
                                    <a class="item-card" href="./item.php">
                                        <h2 class="title">Asus Rog</h2>
                                        <section class="itemInfo">
                                            <p class="text">This asus rog is going to make you better at any game!</p>
                                            <p class="text"><small class="text-muted">Last updated 10 mins ago</small></p>
                                        </section>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-4 h-100">
                                    <div class="d-flex justify-content-center">
                                        <span class="title fs-2">2000€ </span>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#balanceModal">
                                            Add to cart!
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
                    <li class="row border-bottom border-dark pb-3 mt-3">
                        <div class="col-lg-3 zoom ">
                            <a class="item-card z" href="./item.php">
                                <img src="images/cyberpunk_1.jpg" class="card-img-top " alt="Cuber Punk" style="height:100%;">
                            </a>
                        </div>
                        <div class="col-lg-9 border-left border-dark">
                            <div class="row">
                                <div class="col-sm-6 col-8 ps-5">
                                    <a class="item-card" href="./item.php">
                                        <h2 class="title">Cyber Punk</h2>
                                        <section class="itemInfo">
                                            <p class="text">Cyber punk is a futuristic RPG that will blow you away with stuning graphics!</p>
                                            <p class="text"><small class="text-muted">Last updated 2 days ago</small></p>
                                        </section>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-4 h-100">
                                    <div class="d-flex justify-content-center">
                                        <span class="title fs-2">59€ </span>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#balanceModal">
                                            Add to cart!
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
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.html'); ?>