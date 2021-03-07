<?php include_once('header.php'); ?>
<?php include_once('sidebarItem.html'); ?>

<!-- Form -->

<div class="p-0" style="background-color:#f2f2f2;">
    <div class="container col-md-7 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="w-75 m-auto pt-3">
            <div class="text-center pt-3 fs-3">
                <b>Account info</b>
            </div>
            <div class="pt-3">
                <label style="padding-bottom: 1%;" for="formGroupExampleInput" class="form-label"><b>E-mail</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="E-mail">
            </div>
            <div class="row pt-3">
                <div class="col-md-6">
                    <label style="padding-bottom: 1%;" for="formGroupExampleInput" class="form-label"><b>First Name</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="First Name">
                </div>
                <div class="col-md-6">
                    <label style="padding-bottom: 1%;" for="formGroupExampleInput" class="form-label"><b>Last Name</b></label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Last Name">
                </div>
            </div>
            <div class="pt-3">
                <label style="padding-bottom: 1%;" for="formGroupExampleInput" class="form-label"><b>Username</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username">
            </div>
            <div class="pt-3">
                <label style="padding-bottom: 1%;" for="formGroupExampleInput2" class="form-label"><b>Password</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Password">
            </div>
            <div class="pt-3">
                <label style="padding-bottom: 1%;" for="formGroupExampleInput2" class="form-label"><b>Confirm Password</b></label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Confirm Password">
            </div>

            <div style="text-align: center; padding-bottom: 8vh">
                <button type="button" class="btn btn-dark" style="margin-top: 5%; font-size: 2em;">Sign up</button>
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.html'); ?>