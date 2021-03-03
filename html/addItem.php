<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>

<div class="p-0" style="background-color:#f2f2f2">
    <div id="addItem" class="container col-lg-6 col-md-8 p-5 shadow-sm h-100" style="background-color:white">
        <h1 class="ps-2">Add Product</h1>
        <form class="ps-4 pe-4">
            <div class="row mt-4">
                <div class="col-8" id="nameForm">
                    <label for="productName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="productName">
                </div>
                <div class="col" id="priceForm">
                    <label for="inputPrice" class="form-label">Price</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputPrice" aria-label="Euro amount (with dot and two decimal places)">
                        <span class="input-group-text">€</span>
                    </div>
                </div>
            </div>
            
            <div class="mt-3 col-lg-3 col-md-5 col-sm-6 col-12" id="categoryForm">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" aria-label="Category" id="category">
                    <option >...</option>
                    <option value="1">Book</option>
                    <option value="2">Videogame</option>
                    <option value="3">Electrodomestic</option>
                    <option value="4" selected>Computer</option>
                    <option value="5">Smartphone</option>
                </select>
            </div>

            <div class="mt-3" id="descriptionForm">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" id="productDescription" aria-label="With textarea" maxlength="400"></textarea>
            </div>
            
            <div class="mt-4" id="productDetails">
                <h5>Details</h5>
                
                <div class="ps-lg-3 ps-md-2 ps-sm-0 pe-lg-3 pe-md-2 pe-sm-0" id="productDetailsForms">
                    <div id="detailForm1">
                        <label for="detail1" class="form-label">Processor</label>
                        <div class="input-group">
                            <select class="form-select" aria-label="Category" id="detail1">
                                <option selected>...</option>
                                <option value="1">Intel i3</option>
                                <option value="2">Intel i5</option>
                                <option value="3">Intel i7</option>
                                <option value="4">Intel i9</option>
                            </select>
                            <input type="text" class="form-control w-50" id="detail1Full">
                        </div>
                    </div>
                    <div id="detailForm2">
                        <label for="detail2" class="form-label">RAM</label>
                        <div class="input-group">
                            <select class="form-select" aria-label="Category" id="detail2">
                                <option selected>...</option>
                                <option value="1">4 GB DDR4</option>
                                <option value="2">8 GB DDR4</option>
                                <option value="3">16 GB DDR4</option>
                                <option value="4">32 GB DDR4</option>
                            </select>
                            <input type="text" class="form-control w-50" id="detail2Full">
                        </div>
                    </div>
                    <div id="detailForm3">
                        <label for="detail2" class="form-label">Storage</label>
                        <div class="input-group">
                            <select class="form-select" aria-label="Category" id="detail3">
                                <option selected>...</option>
                                <option value="1">250GB SSD</option>
                                <option value="2">500GB SSD</option>
                                <option value="3">1TB SSD</option>
                                <option value="4">500GB SSD</option>
                                <option value="5">1TB HDD</option>
                            </select>
                            <input type="text" class="form-control w-50" id="detail3Full">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once('footer.html'); ?>