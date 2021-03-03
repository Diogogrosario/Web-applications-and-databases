<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>

<div style="background-color:#f2f2f2">
    <div id="addItem" class="container col-md-7 p-5 shadow-sm" style="background-color:white">
        <h1>Add Product</h1>
        <form>
            <div>
                <label for="productName" class="form-label">Name</label>
                <input type="text" class="form-control" id="productName">
            </div>
            <div>
                <label for="category" class="form-label">Category</label>
                <select class="form-select" aria-label="Category" id="category">
                    <option selected>...</option>
                    <option value="1">Book</option>
                    <option value="2">Videogame</option>
                    <option value="3">Electrodomestic</option>
                    <option value="4">Computer</option>
                    <option value="5">Smartphone</option>
                </select>
            </div>

        </form>
    </div>
</div>

<?php include_once('footer.html'); ?>