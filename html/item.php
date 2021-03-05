<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>

<div class="col">
    <div class="content">

        <div class="row">

            <div class="d-lg-flex flex-column justify-content-center col-2 text-center p-0 d-none" style="background-color:beige; height:100%;" id="similarProducts">

                <h1 class="p-3 text-center fs-5 overflow-hidden">Similar Products</h1>

                <a class="item-card" href="./item.php">
                <div class="card border-0 similarProductCard">
                    <div class="card-body ps-4 pe-3">
                        <img src="images/phone.jpg" class="card-img-top" alt="images/phone.jpg">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Price.</p>
                    </div>
                </div>
                </a>
                <a class="item-card" href="./item.php">
                <div class="card border-0 similarProductCard">
                    <div class="card-body ps-4 pe-3">
                        <img src="images/phone.jpg" class="card-img-top" alt="images/phone.jpg">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Price.</p>
                    </div>
                </div>
                </a>
                <a class="item-card" href="./item.php">
                <div class="card border-0 similarProductCard">
                    <div class="card-body ps-4 pe-3">
                        <img src="images/phone.jpg" class="card-img-top" alt="images/phone.jpg">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Price.</p>
                    </div>
                </div>
                </a>
            </div>

            <div class="col pt-4">
                <div class="row ps-5 pb-5 pt-2">
                    <h1 id="productName">Cyberpunk 2077: Day One Edition</h1>
                    <!-- <h4 class="ps-5" id="productCategory">Videogame</h4> -->
                </div>
                <div class="row">
                    <div class="col-lg-7 col-sm-12">
                        <div id="carouselProductImages" class="carousel carousel-dark slide" data-bs-interval="false" data-bs-touch="true">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner" style="width:100%; height:40vh">
                                <div class="carousel-item active">
                                    <img src="images/cyberpunk_1.jpg" class="d-block img-fluid mx-auto" alt="Cyberpunk1" style="max-height:40vh;">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/cyberpunk_2.jpg" class="d-block img-fluid mx-auto" alt="Cyberpunk2" style="max-height:40vh;">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/cyberpunk_3.jpg" class="d-block img-fluid mx-auto" alt="Cyberpunk3" style="max-height:40vh;">
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
                    <div class="col" id="ratingAndButtons">
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
                            <div class="col ps-3" id="buySection">
                                <div class="ps-4" id="productPrice" style="color:red; font-size:3em;">
                                    10.99 €
                                </div>
                                <button class="btn btn-success mt-4 w-50 rounded-0"><i class="bi bi-cart4"></i> Add to Cart</button>
                                <br>
                                <button class="btn btn-success mt-4 w-50 rounded-0"><i class="bi bi-heart"></i> Add to Wishlist</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row mt-5">
                    <nav>
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">Description</button>
                            <button class="nav-link" id="nav-details-tab" data-bs-toggle="tab" data-bs-target="#nav-details" type="button" role="tab" aria-controls="nav-details" aria-selected="false">Details</button>
                            <button class="nav-link" id="nav-reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews" type="button" role="tab" aria-controls="nav-reviews" aria-selected="false">Reviews</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                            <section class="ps-5 pe-5" id="productDescription">
                                <h3 class="text-start mt-4">Description</h3>
                                <div class="mt-4 text-justify" id="descriptionText">
                                    <p>Cyberpunk 2077 é uma história de ação/aventura no mundo aberto de Night City, uma megalópole obcecada com poder, glamour e alterações de corpos. Aqui serás V, um mercenário exilado que persegue um implante essencial para obter a imortalidade. Poderás personalizar o cyberware, habilidades e estilo da tua personagem e explorar uma vasta cidade onde as escolhas que tomares irão moldar a história e o mundo que te rodeia. </P>
                                    <P>JOGA COMO UM MERCENÁRIO EXILADO
                                        <P>Transforma-te num cyberpunk, um mercenário urbano equipado com acessório cibernéticos, e cria a tua lenda nas ruas de Night City.
                                            <P>VIVE NA CIDADE DO FUTURO
                                                <P>Entra num enorme mundo aberto de Night City, um local com visuais, complexidades e profundidades inéditas.
                                                    <P>ROUBA O IMPLANTE E OBTÉM A VIDA ETERNA
                                                        <P>Aceita a missão mais arriscada da tua vida e procura o implante essencial para obter a imortalidade.
                                                            <P>O jogo inclui os seguintes itens físicos:
                                                                <P>- Caixa com CD de jogos <BR>- Capa reversível <BR>- Compêndio do Mundo com informações sobre o cenário e os ritos do jogo <BR>- Postais de Night City <BR>- Mapa de Night City <BR>- Autocolantes </P>
                                                                <P>Brindes digitais incluídos:
                                                                    <P>- Banda sonora do jogo <BR>- Minilivro de arte com uma seleção de arte do jogo <BR>- Banda desenhada Digital “Cyberpunk 2077:Your voice" <BR>- Sourcebook Cyberpunk de 2020 <BR>- Papeis de parede para computador e telemóvel </P>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                            <!-- <div class="col-7 text-center ps-5 pe-5"> -->
                            <section id="productDetails" class="row ps-5 pe-5 pt-3">
                                <h3 class="text-center mt-3">Product Details</h3>

                                <div class="col-6" id="detailsTable_1">
                                    <table class="table mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Release Date</th>
                                                <td>10-12-2020</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Platform</th>
                                                <td>PlayStation 4</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col" id="detailsTable_2">
                                    <table class="table mt-3" id="detailsTable2">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Age Restriction</th>
                                                <td>18+</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Others</th>
                                                <td>This game is extremely buggy, has terrible performance on consoles and low/medium end PC's and is lacking comparing to what was presented before release</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </section>
                            <!-- </div> -->
                        </div>
                        <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                            <!-- <div class="col"> -->
                            <section class="ps-5 pe-5" id="productReviews">
                                <h3 class="text-start mt-4">Reviews</h3>
                            </section>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once('footer.html'); ?>