<div class="col-lg-2 col-0 p-0" id="sideMenuHomePage">
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
        <div class="container-fluid p-0 m-0">
            <div class="collapse navbar-collapse w-100" id="navbarCategories">
                <div class="list-group rounded-0 w-100">
                    @foreach ($categories as $cat)
                        <a href="./searchResults.php" class="list-group-item list-group-item-action text-center">{{$cat["name"]}}</a>                       
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
</div>