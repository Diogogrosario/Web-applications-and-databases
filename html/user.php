<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>

<!-- <div class="col">
</div> -->
<div class="p-0" style="background-color:#f2f2f2;">
    <div id="userProfile" class="container col-md-7 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="row">
            <div class="col-3">
                <div id="profilePic" class="d-flex rounded-circle" style="height:0;width:100%;padding-bottom:100%;background-color:red;background-image:url(images/spidercat.png);background-position:center;background-size:cover;">
                </div>
            </div>
            <div id="profileMainInfo" class="col">
                <h1 class="p-2">WaffleH</h1>
                <p class="fs-5">Account Balance: <span class="fs-4" style="color:green;">20.00 €</span></p>
            </div>
            <div id="profileOptions" class="col">
                <button type="button" class="btn btn-danger w-100 p-3 shadow rounded-0 rounded-top"><i class="bi bi-heart-fill"></i> Wishlist</button>
                <br>
                <button type="class" class="btn btn-dark w-100 p-3 shadow rounded-0">Add balance</button>
                <br>
                <button type="button" class="btn btn-light w-100 p-3 shadow-sm rounded-0 rounded-bottom">Purchase History</button>
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
            </div>
            <div class="col-lg-8 col-12 mt-4">
                <h2 class="mb-3">Shipping Information</h2>
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
            </div>
            <div class="col-lg-8 col-12 mt-4">
                <h2 class="mb-3">Payment Information</h2>
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


        </section>
    </div>
</div>

<?php include_once('footer.html'); ?>