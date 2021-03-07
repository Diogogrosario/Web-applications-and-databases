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
                <label style="padding-bottom: 1%;" for="EmailInput" class="form-label"><b>E-mail</b></label>
                <input type="text" class="form-control" id="EmailInput" placeholder="E-mail" required>
            </div>
            <div class="row pt-3">
                <div class="col-md-6">
                    <label style="padding-bottom: 1%;" for="firstNameInput" class="form-label"><b>First Name</b></label>
                    <input type="text" class="form-control" id="firstNameInput" placeholder="First Name" required>
                </div>
                <div class="col-md-6">
                    <label style="padding-bottom: 1%;" for="lastNameInput" class="form-label"><b>Last Name</b></label>
                    <input type="text" class="form-control" id="lastNameInput" placeholder="Last Name" required>
                </div>
            </div>
            <div class="pt-3">
                <label style="padding-bottom: 1%;" for="usernameInput" class="form-label"><b>Username</b></label>
                <input type="text" class="form-control" id="usernameInput" placeholder="Username" required>
            </div>
            <div class="pt-3">
                <label style="padding-bottom: 1%;" for="passwordInput" class="form-label"><b>Password</b></label>
                <input type="text" class="form-control" id="passwordInput" placeholder="Password" required>
            </div>
            <div class="pt-3">
                <label style="padding-bottom: 1%;" for="confirmPasswordInput" class="form-label"><b>Confirm Password</b></label>
                <input type="text" class="form-control" id="confirmPasswordInput" placeholder="Confirm Password" required>
            </div>

            <div style="text-align: center; padding-bottom: 8vh">
                <button type="button" class="btn btn-dark" style="margin-top: 5%; font-size: 2em;">Sign up</button>
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.html'); ?>