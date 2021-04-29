<div class="col-lg-2 col-0 p-0" id="sideMenuHomePage">
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
        <div class="container-fluid p-0 m-0">
            <div class="collapse navbar-collapse w-100" id="navbarCategories">
                <div class="list-group rounded-0 w-100">
                    @foreach ($categories as $cat)
                        <form action="/searchResults" method="GET" name="Login">
                            <input type="hidden" name="category" value={{$cat["category_id"]}}>
                            <button class="list-group-item list-group-item-action text-center">{{$cat["name"]}}</button>      
                        </form>                 
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
</div>