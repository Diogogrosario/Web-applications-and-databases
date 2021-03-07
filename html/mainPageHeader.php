<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="scrollBar.css">
        <link rel="stylesheet" href="test.css">
        <link rel="stylesheet" href="footer.css">
        <link rel="stylesheet" href="zoom.css">
        <link rel="stylesheet" href="user.css">
        <link rel="stylesheet" href="cards.css">
        <link rel="stylesheet" href="cart.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>
    
    <?php
        $logged_in = true;
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top pb-lg-2 pb-0">
        <div class="container-fluid">
        
            <button class="btn btn-lg ms-1 me-0 d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCategories" aria-controls="navbarCategories" style="margin-right:2%;">
                <i class="bi bi-list-task"></i>
            </button>

            <a class="navbar-brand ms-lg-5" href="index.php"><img class="img-fluid" width="150" height="30"
                    src="images/logo_2.png"></a>
            <button class="navbar-toggler btn btn-lg border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-lg bi-person-circle"></i>
            </button>
                
            <div class="collapse navbar-collapse d-lg-flex justify-content-between text-center" id="navbarSupportedContent">
                <form class="d-lg-inline d-none w-50 ms-5">
                    <div class="input-group">
                        <select class="form-select fs-lg-3" aria-placeholder="Category"
                            aria-label="Default select example">
                            <option selected>All</option>
                            <option value="1">Computers</option>
                            <option value="2">Televisions</option>
                            <option value="3">Smartphones</option>
                            <option value="4">Electrodomestics</option>
                        </select>
                        <input type="text" class="form-control w-50" aria-label="Text input with dropdown button">
                        <button type="submit" class="btn btn-dark" aria-label="Text input with dropdown button"><i
                                class="bi bi-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php if(!$logged_in){ ?>
                            <a class="nav-link" href="signin.php">Sign in</a>
                        <?php } else { ?>    
                            <img src="images/userIcon.png" href="user.php" class="card-img-top px-1" style="max-height: 3em; max-width: 3em;" alt="User Icon">
                        <?php } ?>
                    </li>
                    <li class="nav-item">
                        <?php if(!$logged_in){ ?>
                            <a class="nav-link" href="signup.php">Sign up</a>
                        <?php } else { ?>    
                            <a class="nav-link" href="user.php">User</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-lg-none row w-100 h-100">
            <form class="col-11 offset-1">
                <div class="input-group">
                    <select class="form-select fs-lg-3" aria-placeholder="Category"
                        aria-label="Default select example">
                        <option selected>Category</option>
                        <option value="1">Computers</option>
                        <option value="2">Televisions</option>
                        <option value="3">Smartphones</option>
                        <option value="4">Electrodomestics</option>
                    </select>
                    <input type="text" class="form-control w-25" aria-label="Text input with dropdown button">
                    <button type="submit" class="btn btn-dark w-25" aria-label="Text input with dropdown button"><i
                            class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </nav>

    <main role ="main" id="page">
        <div class="row no-gutters w-100">
                    