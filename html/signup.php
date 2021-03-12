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
                <input type="text" class="form-control" id="EmailInput" placeholder="E-mail, I.e: email@hotmail.com" required>
            </div>
            <div class="row pt-3">
                <div class="col-md-6">
                    <label style="padding-bottom: 1%;" for="firstNameInput" class="form-label"><b>First Name</b></label>
                    <input type="text" class="form-control" id="firstNameInput" placeholder="First Name, I.e: John" required>
                </div>
                <div class="col-md-6">
                    <label style="padding-bottom: 1%;" for="lastNameInput" class="form-label"><b>Last Name</b></label>
                    <input type="text" class="form-control" id="lastNameInput" placeholder="Last Name, I.e: Doe" required>
                </div>
            </div>
            <div class="pt-3">
                <label style="padding-bottom: 1%;" for="usernameInput" class="form-label"><b>Username</b></label>
                <input type="text" class="form-control" id="usernameInput" placeholder="Username, I.e: JohnDoe123" required>
            </div>
            <div class="pt-3">
                <label style="padding-bottom: 1%;" for="passwordInput" class="form-label"><b>Password</b></label>
                <input type="text" class="form-control" id="passwordInput" placeholder="Password" required>
            </div>
            <div class="pt-3">
                <label style="padding-bottom: 1%;" for="confirmPasswordInput" class="form-label"><b>Confirm Password</b></label>
                <input type="text" class="form-control" id="confirmPasswordInput" placeholder="Confirm Password" required>
            </div>

            <div class="d-flex mt-3 flex-column justify-content-center h-50 align-items-center">
                <button type="button" class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#balanceModal">
                    Sign up
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                                <p for="recipient-name" class="col-form-label"> An email has been sent to your account. <br> Please verify before signing into your account</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Return to main page</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.html'); ?>