<?php include_once('header.html'); ?>
<?php include_once('sidebarItem.html'); ?>

<div class="col">
    <div class="container">
        <div class="offset-lg-3 col-lg-6 offset-lg-3">
            <div class="input-group p-3 justify-content-center">
                <div class="input-group-prepend">
                    <div class="dropdown">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-filter"></i>
                                <div class="d-none d-lg-inline"> Select a filter
                                </div>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Name</a></li>
                                <li><a class="dropdown-item" href="#">User Name</a></li>
                            </ul>
                        </div>
                    </div>
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
                        <td>Otto</td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"> <i class="fas fa-user-graduate"></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline"> Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"> <i class="fas fa-user-graduate"></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button> </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"> <i class="fas fa-user-graduate"></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button> </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">4</th>
                        <td>Henrique</td>
                        <td>Padoru</td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"> <i class="fas fa-user-graduate"></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button> </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">5</th>
                        <td>Davide</td>
                        <td>WaffleH</td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"> <i class="fas fa-user-graduate"></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button> </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">6</th>
                        <td>Diogo</td>
                        <td>Ferno</td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"> <i class="fas fa-user-graduate"></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button> </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">7</th>
                        <td>João</td>
                        <td>Chalche</td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"> <i class="fas fa-user-graduate"></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button> </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">8</th>
                        <td>João</td>
                        <td>IraoDasForcas</td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"> <i class="fas fa-user-graduate"></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button> </td>
                    </tr>
                    <tr>
                        <th scope="row" class="d-none d-lg-table-cell">9</th>
                        <td>Eduardo</td>
                        <td>Chequelo</td>
                        <td class="d-none d-lg-table-cell">placeHolder@hotmail.com</td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
                                <div class="d-none d-lg-inline">Ban
                                </div>
                            </button>
                            <button type="button" class="btn btn-success"> <i class="fas fa-user-graduate"></i>
                                <div class="d-none d-lg-inline"> Promote to Admin
                                </div>
                            </button> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include_once('footer.html'); ?>