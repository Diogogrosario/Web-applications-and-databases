<!-- Done -->

<?php include_once('header.php'); ?>
<?php include_once('sidebarItem.html'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="./adminMainPage.php">Administration Area</a></li>
        <li class="breadcrumb-item active">Manage Users</li>
    </ol>
</nav>

<div class="col">
    <div class="container">
        <div class="offset-lg-3 col-lg-6 offset-lg-3">
            <div class="input-group p-3 justify-content-center">
                <div class="input-group-prepend">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select a filter </option>
                        <option value="1">Name</option>
                        <option value="2">User Name</option>
                    </select>
                </div>
                <input type="text" class="form-control" aria-label="Text input with dropdown button">
            </div>
        </div>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="d-none d-lg-table-cell">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col" class="d-none d-lg-table-cell">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">1</th>
                        <td>Mark</td>
                        <td>
                             <a id="username-anchor"href="./user.php">Otto </a>
                        </td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">2</th>
                        <td>Jacob</td>
                        <td>
                             <a id="username-anchor"href="./user.php">Thornton </a>
                        </td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline"> Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">3</th>
                        <td>Larry</td>
                        <td>
                             <a id="username-anchor"href="./user.php">the Bird </a>
                        </td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">4</th>
                        <td>Henrique</td>
                        <td>
                             <a id="username-anchor"href="./user.php">Padoru </a>
                        </td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">5</th>
                        <td>Davide</td>
                        <td>
                             <a id="username-anchor"href="./user.php">WaffleH </a>
                        </td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">6</th>
                        <td>Diogo</td>
                        <td>
                             <a id="username-anchor"href="./user.php">Ferno </a>
                        </td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">7</th>
                        <td>João</td>
                        <td>
                             <a id="username-anchor"href="./user.php">Chalche </a>
                        </td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">8</th>
                        <td>João</td>
                        <td>
                             <a id="username-anchor"href="./user.php">IraoDasForcas </a>
                        </td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">9</th>
                        <td>Eduardo</td>
                        <td>
                             <a id="username-anchor"href="./user.php">Chequelo </a>
                        </td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include_once('footer.html'); ?>