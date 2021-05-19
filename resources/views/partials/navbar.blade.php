<nav class="navbar navbar-expand-lg navbar-dark sticky-top pb-lg-2 pb-0" style="background-color:#36312b">
      <div class="container-fluid">
          <?php
            $logged_in = false;


          if(Auth::check())
            $logged_in = true;
            
          if (!$pos) {
          ?>
              @if (isset($categories))
                    
              <button class="btn btn-lg ms-3 me-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapsableColumn" aria-controls="collapsableColumn" style="margin-right:2%;">
                  <i class="bi bi-list-task"  style="color:white !important"></i>
              </button>
              @endif


          <?php
          } else {
          ?>
              <button class="btn btn-lg ms-1 me-0 d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCategories" aria-controls="navbarCategories" style="margin-right:2%;">
                  <i class="bi bi-list-task" style="color:white !important"></i>
              </button>
          <?php
          }
          ?>

          <a class="navbar-brand ms-lg-4" href="/"><img class="img-fluid" width="150" height="30" src="{{ asset('img/logo_light.png') }}" alt="logo"></a>
          <button class="navbar-toggler btn btn-lg border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="bi bi-lg bi-person-circle"></i>
          </button>

          <div class="collapse navbar-collapse d-lg-flex justify-content-between text-center" id="navbarSupportedContent">
                    
                <form action="/searchResults" class="d-lg-inline d-none w-50 ms-5" method="get">
                    <div class="input-group">
                        @if (isset($categories))

                        <select class="form-select fs-lg-3" id="categories" name="categories">
                            <option selected value="-1">All</option>

                            @foreach ($categories as $cat)
                                    <option value={{$cat["category_id"]}}>{{$cat["name"]}}</option>
                            @endforeach
                        @endif
                        
                        </select>
                        <input type="text" id="search" name="search" class="form-control w-50" placeholder="Search For An Item" aria-label="Text input with dropdown button">
                        <button type="submit" class="btn btn-secondary" aria-label="Text input with dropdown button"><i class="bi bi-search"></i></button>
                    </div>
                </form>
              <ul class="navbar-nav mb-2 mb-lg-0">
                  <?php if($logged_in){ ?>
                      <li class="nav-item d-lg-flex align-items-lg-center py-2 py-lg-0 px-lg-2">
                          <a class="nav-link" href={{"/userProfile/" . Auth::id() . "/cart"}}>
                            <i class="bi bi-cart" style="font-size: 1.5em;"></i>
                          </a>
                      </li>
                  <?php } ?>
                  <li class="nav-item">
                      <?php if (!$logged_in) { ?>
                          <a class="nav-link" href="/login" style="color:white !important">Login</a>
                      <?php }  ?>
                  </li>
                  <li class="nav-item">
                      <?php if (!$logged_in) { ?>
                          <a class="nav-link" href="/register" style="color:white !important">Register</a>

                      <?php } else { ?>
                            <div class="d-flex align-items-center justify-content-center pt-1">
                                <a href={{ "/userProfile/" . Auth::id() }} class="d-block" style="width: 3vw;">
                                    @if (Auth::user()->image()->first())
                                        <div id="profilePic" class="d-flex rounded-circle" style={{"height:0;width:100%;padding-bottom:100%;background-color:red;background-image:url(\"" . asset("/img/users/" . Auth::user()->image()->first()["path"]) . "\");background-position:center;background-size:cover;"}}>
                                        </div>
                                    @else
                                        <div id="profilePic" class="d-flex rounded-circle" style={{"height:0;width:100%;padding-bottom:100%;background-color:red;background-image:url(\"" . asset("/img/users/default.png") . "\");background-position:center;background-size:cover;"}}>
                                        </div>
                                    @endif
                                    
                                </a>
                                <a id="navbarUsername" class="nav-link p-1 align-middle" href={{"/userProfile/" . Auth::id()}} style="color:white !important; border-right: 1px solid;">{{ Auth::user()["username"] }}</a>
                                @if (Auth::user()["is_admin"])
                                <a class="nav-link p-1 align-middle" href={{"/management"}} style="color:white !important; border-right: 1px solid;" >Manage</a>
                                @endif
                                <a class="nav-link p-1" href="/logout" style="color:white !important;">Logout</a>
                            </div>
                      <?php } ?>
                  </li>

              </ul>
          </div>
      </div>
      <div class="d-lg-none row w-100 h-100">
        @if(isset($categories))
            <form action="/searchResults" class="col-11 offset-1" method="get">
                <div class="input-group">
                    <select class="form-select fs-lg-3" id="search_category" name="categories">
                        <option selected value="-1">All</option>

                        @foreach ($categories as $cat)
                            <option value={{$cat["category_id"]}}>{{$cat["name"]}}</option>
                        @endforeach

                    </select>
                    <input type="text" id="searchSmall" name="search" class="form-control w-25" placeholder="Search For An Item" aria-label="Text input with dropdown button">
                    <button type="submit" class="btn btn-dark w-25" aria-label="Text input with dropdown button"><i class="bi bi-search"></i></button>
                </div>
            </form>
        @endif
      </div>
  </nav>