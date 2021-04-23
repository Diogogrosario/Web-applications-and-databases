<div class="col-lg-2 col-md-3 col-12 collapse p-0 show" id="searchFiltersBar" style="background-color: #f2f2f2;">
    <div class="accordion" id="filterSideBar" style="background-color: white;">
        <div class="accordion-item" >
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Price Range
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#filterSideBar">
                <div class="accordion-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            0-50€
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            50-100€
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            100-200€
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            200-500€
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            500-1000€
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            1000-2000€
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            < 2000€
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Categories
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#filterSideBar">
                <div class="accordion-body p-0">
                    <div class="list-group h-100">
                        @foreach ($categories as $cat)
                            <a href="./searchResults.php" class="list-group-item list-group-item-action text-center">{{$cat["name"]}}</a>                       
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Reviews
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#filterSideBar">
                <div class="accordion-body">
                    <div class="list-group h-100">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" id="5starFilter">
                                <label for="5starFilter"> 5 star</label><br>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" id="4starFilter">
                                <label for="4starFilter"> 4 star</label><br>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" id="3starFilter">
                                <label for="3starFilter"> 3 star</label><br>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" id="2starFilter">
                                <label for="2starFilter"> 2 star</label><br>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" id="1starFilter">
                                <label for="1starFilter"> 1 star</label><br>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>