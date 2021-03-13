<?php include_once('header.php'); ?>
<?php include_once('sidebarItem.html'); ?>



<div class="p-0" style="background-color:#f2f2f2;">

    <div id="userProfile" class="col-lg-10 col-12 p-lg-5 pt-lg-2 p-3 m-lg-auto shadow-lg-sm h-100" style="background-color:white; margin:0">
        <header>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-4">
                    <li class="breadcrumb-item"> <a class="link-dark" href="./user.php">User Profile</a></li>
                    <li class="breadcrumb-item active">Purchase History</li>
                </ol>
            </nav>
            <h1 class="text-lg-start text-center ms-lg-5 mb-4">Purchase History</h1>

            <div class="row mt-3 ms-lg-3 ms-md-1 me-lg-5 me-md-2 border-bottom">
                <div class="col-md-4 col-5">
                    Showing <span id="nResultsCurrent">1-2</span> of <span id="totalResults">2</span> purchases
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
                        <option value="1">Date: Most recent first</option>
                        <option value="2">Date: Least recent first</option>
                        <option value="3">Price: Most expensive first</i></option>
                        <option value="4">Price: Least expensive first <i class="bi bi-arrow-down-short"></i></option>
                    </select>
                </div>
            </div>
        </header>


        <div class="accordion accordion-flush" id="purchaseHistory" style="background-color: white">

            <div class="accordion-item purchaseFromHistory">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <div class="container-fluid">
                            <div class="row ps-2">
                                <div class="col-lg-6 col-md-6 col-sm-6 pb-1 pt-1">
                                    <!-- TODO: MUDAR DE LISTA PARA OUTRA COISA POR CAUSA DE BACKGROUND QUANDO SELECIONADO-->
                                    <p id="purchaseHistoryText" class="border-0 pt-0 pb-0 mb-1">iMac 27-inch</p>
                                    <p id="purchaseHistoryText" class="border-0 pt-0 pb-0 mb-1 ">iPhone4</p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 pb-1 pt-1 d-flex flex-column justify-content-center">
                                    <b class="text-center fs-5" style="color: red"><span class="historyPrice">1250.00</span> €</b>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 pb-1 pt-1 d-flex flex-column justify-content-center historyDate text-center fs-5">
                                    22/02/2021
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse border-1" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-5 pt-4">
                        <div class="row border-bottom pb-3 vh-50">
                            <div class="col-lg-1 ps-5 align-self-center fs-4">
                                1 x
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <img src="images/computers/iMac.jpg" class="card-img-top img-fluid" alt="...">
                            </div>
                            <div class="col-7 border-left border-dark">
                                <div class="row">
                                    <div class="col-sm-8 col-12">
                                        <h3 class="title">iMac 27-inch</h3>
                                        <p class="text">This iMac computer is the best for it's price!</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col d-flex flex-column justify-content-center text-center">
                                <p><span class="title fs-5">1000.00</span> €</p>
                            </div>
                        </div>
                        <div class="row border-bottom pb-3 vh-50">
                            <div class="col-lg-1 ps-5 align-self-center fs-4">
                                1 x
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <img src="images/phones/phone.jpg" class="card-img-top img-fluid" alt="...">
                            </div>
                            <div class="col-7 border-left border-dark">
                                <div class="row">
                                    <div class="col-sm-8 col-12">
                                        <h3 class="title">iPhone4</h3>
                                        <p class="text">The best iPhone on the market!</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col d-flex flex-column justify-content-center text-center">
                                <p><span class="title fs-5">250.00</span> €</p>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-lg-10 col-3 d-flex flex-column justify-content-center text-lg-end text-center pe-lg-5 fs-5">Total:</div>
                            <div class="col-lg-2 col-9 fs-4 text-center">1250.00€</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <div class="container-fluid">
                            <div class="row ps-2">
                                <div class="col-lg-6 col-md-6 col-sm-6 pb-1 pt-1">
                                    <!-- TODO: MUDAR DE LISTA PARA OUTRA COISA POR CAUSA DE BACKGROUND QUANDO SELECIONADO-->
                                    <p id="purchaseHistoryText" class="border-0 pt-0 pb-0 mb-1">Asus Computer</p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 pb-1 pt-1 d-flex flex-column justify-content-center">
                                    <b class="text-center fs-5" style="color: red"><span class="historyPrice">300.00</span> €</b>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 pb-1 pt-1 d-flex flex-column justify-content-center historyDate text-center fs-5">
                                    25/02/2021
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-5 pt-4">
                        <div class="row border-bottom pb-3 vh-50">
                            <div class="col-lg-1 ps-5 align-self-center fs-4">
                                1 x
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <img src="images/computers/pc.jpg" class="card-img-top img-fluid" alt="...">
                            </div>
                            <div class="col-7 border-left border-dark">
                                <div class="row">
                                    <div class="col-sm-8 col-12">
                                        <h3 class="title">Asus Computer</h3>
                                        <p class="text">This Asus computer is the best for it's price!</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col d-flex flex-column justify-content-center text-center">
                                <p><span class="title fs-5">300.00</span> €</p>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-lg-10 col-3 d-flex flex-column justify-content-center text-lg-end text-center pe-lg-5 fs-5">Total:</div>
                            <div class="col-lg-2 col-9 fs-4 text-center">300.00€</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <footer class="row mt-3 pt-2 ms-lg-3 ms-md-1 me-lg-5 me-md-2 border-top" id="searchControlsBottom">
            <div class="col-md-4 col-5">
                Showing <span id="nResultsCurrent">1-2</span> of <span id="totalResults">2</span> purchases
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

</div>
<?php include_once('footer.html'); ?>