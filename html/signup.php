<?php include_once('header.php'); ?>
<?php include_once('sidebarItem.html'); ?>

<!-- Form -->
<div>
    <div style="text-align: center; padding-top: 7%; font-size: 2.2em">
        <b>Account info</b>
    </div>
    <div style="margin: auto; width: 80%; padding-top: 3%; font-size: 1.2rem;">
        <label style="padding-bottom: 1%;" for="formGroupExampleInput" class="form-label"><b>E-mail</b></label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="e-mail">
    </div>
    <div style="margin: auto; width: 80%; padding-top: 3%; font-size: 1.2rem;">
        <label style="padding-bottom: 1%;" for="formGroupExampleInput" class="form-label"><b>Username</b></label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="username">
    </div>
    <div style="margin: auto; width: 80%; padding-top: 2%; font-size: 1.2rem;">
        <label style="padding-bottom: 1%;" for="formGroupExampleInput2" class="form-label"><b>Password</b></label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="password">
    </div>
    <div style="text-align: center; padding-top: 7%; font-size: 2.2em">
        <b>Personal info</b>
    </div>
    <div style="margin: auto; width: 80%; padding-top: 3%; font-size: 1.2rem;">
        <label style="padding-bottom: 1%;" for="formGroupExampleInput" class="form-label"><b>Adress, door number</b></label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Eg: Cool Street, 320">
    </div>
    <div style="margin: auto; width: 80%; padding-top: 3%; font-size: 1.2rem;">
        <label style="padding-bottom: 1%;" for="formGroupExampleInput" class="form-label"><b>Postal code</b></label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Eg: 1234-567">
    </div>
    <div style="text-align: center; padding-bottom: 8vh">
        <button type="button" class="btn btn-primary" style="margin-top: 5%; font-size: 2em;">Sign up</button>
    </div>
</div>
<?php include_once('footer.html'); ?>