<?php include_once('header.php'); ?>
<?php include_once('sidebarItem.html'); ?>

<div class="col">
    <div class="content">

        <div class="row">

            <div class="d-lg-flex flex-column justify-content-center col-2 text-center p-0 d-none" style="background-color:lightgrey; height:100%;" id="similarProducts">

                <h1 class="p-3 text-center fs-5 overflow-hidden">Similar Products</h1>

                <a class="item-card" href="./item.php">
                    <div class="card border-0 similarProductCard">
                        <div class="card-body ps-4 pe-3">
                            <img src="images/computers/alarcoGamingPc.jpg" class="card-img-top" alt="Alarco Gaming Pc">
                            <section id="itemInfo">
                                <h5 class="card-title">Alarco Gaming Pc</h5>
                                <p class="card-text">150€</p>
                            </section>
                        </div>
                    </div>
                </a>
                <a class="item-card" href="./item.php">
                    <div class="card border-0 similarProductCard">
                        <div class="card-body ps-4 pe-3">
                            <img src="images/computers/asusRog.jpg" class="card-img-top" alt="Asus Rog">
                            <section id="itemInfo">
                                <h5 class="card-title">Asus Rog</h5>
                                <p class="card-text">2000€.</p>
                            </section>
                        </div>
                    </div>
                </a>
                <a class="item-card" href="./item.php">
                    <div class="card border-0 similarProductCard">
                        <div class="card-body ps-4 pe-3">
                            <img src="images/phones/razerPhone.jpg" class="card-img-top" alt="Razer Phone">
                            <section id="itemInfo">
                                <h5 class="card-title">Razer Phone</h5>
                                <p class="card-text">700€</p>
                            </section>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col pt-4">
                <div class="row ps-lg-5 pb-5 pt-2">
                    <h1 id="productName" class="text-lg-start text-center">Cyberpunk 2077: Day One Edition</h1>
                    <!-- <h4 class="ps-5" id="productCategory">Videogame</h4> -->
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-6">
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
                    <div class="col-lg-5 col-md-6 col-8 offset-2 offset-md-0 mt-md-0 mt-3" id="ratingAndButtons">
                        <div class="row mb-3 text-md-start text-center">
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
                        <div class="row mb-3">
                            <div class="col-lg-8 col-12 ps-md-3 pe-md-5" id="buySection">
                                <div class="ps-lg-4 ps-md-0 text-lg-start text-center mb-3" id="productPrice" style="color:red; font-size:3em;">
                                    10.99 €
                                </div>
                                <div class="text-center fs-5 mb-1"><span style="color:green">22</span> in stock</div>


                                <button type="button" class="btn btn-success w-100 btn-lg rounded-top rounded-0" data-bs-toggle="modal" data-bs-target="#balanceModal">
                                    Add to cart!
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
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
                                <button class="btn btn-danger w-100 btn-lg rounded-bottom rounded-0"><i class="bi bi-heart"></i> Add to Wishlist</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row mt-5">
                    <nav>
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="false">Description</button>
                            <button class="nav-link" id="nav-details-tab" data-bs-toggle="tab" data-bs-target="#nav-details" type="button" role="tab" aria-controls="nav-details" aria-selected="false">Details</button>
                            <button class="nav-link active" id="nav-reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews" type="button" role="tab" aria-controls="nav-reviews" aria-selected="true">Reviews</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
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
                                <h3 class="text-center mt-3 mb-3">Product Details</h3>

                                <div class="col-md-6 col-sm-12" id="detailsTable_1">
                                    <table class="table">
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
                                    <table class="table" id="detailsTable2">
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
                        <div class="tab-pane fade show active" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                            <!-- <div class="col"> -->
                            <section class="ps-5 pe-5 col-lg-8 col-md-10 col-12 offset-lg-2 offset-md-1" id="reviewSection">
                                <h3 class="text-start mt-4">Reviews <span class="fs-5" id="n_reviews">(2)</span></h3>
                                <form class="mt-4 mb-5" id="newReviewForm">
                                    <textarea required class="form-control" id="productDescription" placeholder="Leave a review here" aria-label="Review textarea" maxlength="400" style="resize:none;"></textarea>
                                    <button type="submit" class="btn btn-dark btn-md col-md-6 col-lg-4 offset-md-3 offset-lg-4 col-12 mt-md-2">Submit your review</button>
                                </form>
                                <div class="mt-4" id="productReviews">
                                    <div class="user_review border-bottom">
                                        <div class="row">
                                            <div class="col-lg-1 col-md-1 col-2">
                                                <div id="profilePic" class="d-flex rounded-circle" style="height:0;width:100%;padding-bottom:100%;background-color:red;background-image:url(images/spidercat.png);background-position:center;background-size:cover;">
                                                </div>
                                            </div>
                                            <b class="col-lg-2 col-4 review_usermame">WaffleH</b>
                                            <div class="col review_starRating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                                <i class="bi bi-star"></i>
                                            </div>
                                        </div>
                                        <div class="review_text mt-2 ms-2">
                                            <p>The game is good and had some beautiful moments, but seriously lacks some polishing.</p>
                                        </div>
                                    </div>
                                    <div class="user_review border-bottom mt-4">
                                        <div class="row">
                                            <div class="col-lg-1 col-md-1 col-2">
                                                <div id="profilePic" class="d-flex rounded-circle" style="height:0;width:100%;padding-bottom:100%;background-color:red;background-image:url(images/spidercat.png);background-position:center;background-size:cover;">
                                                </div>
                                            </div>
                                            <b class="col-lg-2 col-4 review_usermame">WaffleH</b>
                                            <div class="col review_starRating">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                                <i class="bi bi-star"></i>
                                            </div>
                                        </div>
                                        <div class="review_text mt-2 ms-2">
                                            <p>The game is good and had some beautiful moments, but seriously lacks some polishing.</p>
                                        </div>
                                    </div>
                                </div>
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