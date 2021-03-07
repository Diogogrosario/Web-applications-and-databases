<?php include_once('header.php'); ?>
<?php include_once('sidebarItem.html'); ?>

<!-- <div class="col">
</div> -->
<div class="p-0" style="background-color:#f2f2f2;">
    <div id="userProfile" class="container col-md-7 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-3 mb-1">
                <div id="profilePic" class="d-flex rounded-circle" style="height:0;width:100%;padding-bottom:100%;background-color:red;background-image:url(images/spidercat.png);background-position:center;background-size:cover;">
                </div>
            </div>
            <div id="profileMainInfo" class="col-lg-5 col-md-9 col-9">
                <h1 class="p-2">WaffleH</h1>
                <p class="fs-5">Account Balance:<span class="fs-4 ms-2" style="color:green;">20.00 €</span></p>
            </div>
            <div id="profileOptions" class="col-lg-4 col-md-12 col-sm-12">
                <a href="./wishlist.php">
                    <button type="button" class="btn btn-danger w-100 p-3 shadow rounded-0 rounded-top"><i class="bi bi-heart-fill me-2"></i>Wishlist</button></a>
                <br>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark w-100 p-3 shadow rounded-0" data-bs-toggle="modal" data-bs-target="#balanceModal">
                    Add balance
                </button>

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
                                    <label for="recipient-name" class="col-form-label"> How much would you like to add?</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">€</div>
                                        </div>
                                        <input type="number" class="form-control" id="recipient-name" placeholder="Amount">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>



                <br>
                <a href="./purchaseHistory.php">
                    <button type="button" class="btn btn-light w-100 p-3 shadow-sm rounded-0 rounded-bottom">Purchase History</button></a>
            </div>
        </div>

        <section id="profileInfo" class="row mt-5">
            <div class="col-lg-8 col-12">
                <h2 class="mb-3">Account Info</h2>
                <div class="table-responsive">
                    <table id="accountInfo" class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Username</th>
                                <td>WaffleH<button type="class" class="btn"><i class="bi bi-pencil-square"></i></button></td>
                            </tr>
                            <tr>
                                <th scope="row">Password</th>
                                <td><button type="class" class="btn btn-dark">Change password</button></td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail</th>
                                <td>chingchonghanji@gmail.com<button type="class" class="btn"><i class="bi bi-pencil-square"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex mb-2">
                    <h2>Shipping Information</h2><button type="class" class="btn btn-lg ms-3 p-0"><i class="bi bi-pencil-square"></i></button>
                </div>
                <table id="paymentInfo" class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Address</th>
                            <td>Rua Yay nº20 Areias</td>
                        </tr>
                        <tr>
                            <th scope="row">City</th>
                            <td>Santo Tirso</td>
                        </tr>
                        <tr>
                            <th scope="row">Country</th>
                            <td>Portugal</td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex mb-2">
                    <h2>Payment Information</h2><button type="class" class="btn btn-lg ms-3 p-0"><i class="bi bi-pencil-square"></i></button>
                </div>
                <table id="paymentInfo" class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Method</th>
                            <td>Paypal</td>
                        </tr>
                        <tr>
                            <th scope="row">Username</th>
                            <td>wafflepay</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-4 border-start" id="notifications">
                <h2 class="mb-3">Notifications</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="./item.php">Asus ROG</a> from your wish list is on sale! </li>
                    <li class="list-group-item"><a href="./item.php">iPhone10</a> from your wish list has stock again!</li>
                </ul>
            </div>
    </div>


    </section>
</div>
</div>

<?php include_once('footer.html'); ?>