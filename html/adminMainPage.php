<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>

<nav aria-label="breadcrumb ">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">Administration Area</li>
  </ol>
</nav>

<div class="container" style="width: 95%; margin: auto; display: grid; grid-template-rows: 25vh 25vh 10vh">
    <div style="text-align: center; font-size: 2.5rem; grid-column: 1;">
        <b>Hello, *user*</b>
    </div>
    <div class="text-center fs-3">
        <a>In case you need some sort of help, here are some useful links:</a>
    </div>
    <div class="text-center fs-4">
        <a href="./userAdministration.php">Manage users</a>
    </div>
    <div class="text-center fs-4">
        <a href="./addItem.php">Add an item</a>
    </div>
</div>


<?php include_once('footer.html'); ?>