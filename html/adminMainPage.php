<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>


<div class="container" style="width: 95%; margin: auto; display: grid; grid-template-rows: 25vh 25vh 10vh">
        <div style="text-align: center; font-size: 2.5rem; grid-column: 1;">
            <b>Hello, *user*</b>
        </div>
        <div class="text-center fs-3">
            <a>In case you need some sort of help, here are some useful links:</a>
        </div>
        <div class="text-center fs-4">
            <a href="./administration.php">Manage users</a>
        </div>
        <div class="text-center fs-4">
            <a href="#contacts">Add an item</a>
        </div>
    </div>


<?php include_once('footer.html'); ?>