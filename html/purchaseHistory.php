<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>


<div class="p-0" style="background-color:#f2f2f2;">
    <div id="userProfile" class="col-lg-10 col-12 p-lg-5 p-3 m-lg-auto shadow-lg-sm h-100" style="background-color:white; margin:0">
        <h1 class="text-lg-start text-center ms-lg-5 mb-4">Purchase History</h1>

        <div class="accordion accordion-flush" id="purchaseHistory" style="background-color: white">
            <div class="accordion-item purchaseFromHistory">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <div class="container-fluid">
                            <div class="row ps-2">
                                <div class="col-lg-5 col-sm-2">
                                    <!-- TODO: MUDAR DE LISTA PARA OUTRA COISA POR CAUSA DE BACKGROUND QUANDO SELECIONADO-->
                                        <p class="border-0 pt-0 pb-0 mb-1">Asus Computer</p>
                                        <p class="border-0 pt-0 pb-0 mb-1">Second Product</p>
                                        <p class="border-0 pt-0 pb-0 mb-1">Third Product</p>
                                </div>
                                <div class="col-lg-3 col-sm-1 d-flex flex-column justify-content-center">
                                    <b class="text-center fs-5" style="color: red"><span class="historyPrice">230.99</span> €</b>
                                </div>
                                <div class="col-lg-3 col-sm-1 d-flex flex-column justify-content-center historyDate text-center fs-5">
                                    21/02/2021
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
                                <img src="images/pc.jpg" class="card-img-top img-fluid" alt="...">
                            </div>
                            <div class="col-7 border-left border-dark">
                                <div class="row">
                                    <div class="col-sm-8 col-12">
                                        <h3 class="title">Asus computer</h3>
                                        <p class="text">This asus computer is the best for it's price!</p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col d-flex flex-column justify-content-center text-center">
                                <p><span class="title fs-5">299.99</span> €</p>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-lg-10 col-3 d-flex flex-column justify-content-center text-lg-end text-center pe-lg-5 fs-5">Total:</div> 
                            <div class="col-lg-2 col-9 fs-4 text-center">299.99€</div>
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

        <nav aria-label="Purchase history navigation" class="sticky-bottom">
            <ul class="pagination">
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php include_once('footer.html'); ?>