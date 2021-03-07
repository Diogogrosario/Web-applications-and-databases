<?php include_once('header.php'); ?>
<?php include_once('sidebarItem.html'); ?>


<!-- Form -->
<div class="p-0" style="background-color:#f2f2f2;">
    <div class="container col-md-7 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="col-md-7 mx-auto">
            <div class="myform form ">
                <div class="logo mb-3">
                    <div class="col-md-12 text-center">
                        <h1>Sign in</h1>
                    </div>
                </div>
                <form action="" method="post" name="Sign in">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" id="password" class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                    </div>
                    <div class="col-md-12 text-center pt-3">
                        <button type="submit" class="btn btn-block btn-dark">Sign in</button>
                    </div>
                    <div class="col-md-12 ">
                        <div class="signin-or">
                            <hr class="hr-or">
                            <span class="span-or">or</span>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p class="text-center pt-3">
                            <a class="google btn"><i class="fa fa-google-plus">
                                </i> Signup using Google
                            </a>
                        </p>
                    </div>
                    <div class="form-group">
                        <p class="text-center">Don't have account? <a href="./signup.php" id="signup">Sign up here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.html'); ?>