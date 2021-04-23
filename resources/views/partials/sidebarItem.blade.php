<div class="col-lg-2 col-md-4 col-6 text-center collapse p-0" id="collapsableColumn" style="position:fixed;">
    <div class="list-group h-100 rounded-0">
        @foreach ($categories as $cat)
            <a href="./searchResults.php" class="list-group-item list-group-item-action text-center">{{$cat["name"]}}</a>                       
        @endforeach

    </div>
</div>