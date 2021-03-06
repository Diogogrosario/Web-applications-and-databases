<?php include_once('header.html');?>
<?php include_once('sidebarItem.html'); ?>


<!-- Form -->
<div>
    <div style="margin: auto; width: 60%; padding-top: 3%; font-size: 1.2rem;">
        <label style="padding-bottom: 1%;" for="formGroupExampleInput" class="form-label"><b>Username</b></label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="username">
    </div>
    <div style="margin: auto; width: 60%; padding-top: 2%; font-size: 1.2rem;">
        <label style="padding-bottom: 1%;" for="formGroupExampleInput2" class="form-label"><b>Password</b></label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="password">
    </div>
    <div style="margin: auto; width: 60%; padding-top: 1%;">
        <a href="#Forgot-password">Forgot password?</a>
    </div>
    <div style="text-align: center;">
        <a href="./index.php">
            <button type="button" class="btn btn-primary" style="margin-top: 5%; font-size: 2em;">Sign in</button>
        </a>
    </div>
    <div style="text-align: center;">
        <p style="padding-top: 5%; margin-bottom: 0;">Don't have an account yet?</p>
    </div>
    <div style="text-align: center;  font-size: 1.3rem;">
        <a href="./signup.php">Sign up</p>
    </div>
</div>
<?php include_once('footer.html'); ?>