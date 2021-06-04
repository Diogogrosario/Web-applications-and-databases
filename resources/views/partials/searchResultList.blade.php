<?php if((($step - 1) * 10) + 1 >= $searchResults->count()){
        $step = max(floor((($searchResults->count() - 1) / 10) + 1), 1);
    }
    $step = floor($step);
    if(!isset($filterNum)){
        $filterNum = 1;
    }
?>
<div id="searchPage" class="col d-flex flex-column">
    <header class="row mt-3 ms-lg-3 ms-md-1 me-lg-5 me-md-2 pe-lg-5 pe-md-1 border-bottom" id="searchControlsTop">
        <div class="col-md-4 col-5">
            <?php $firstnum = min((($step - 1) * 10) + 1, $searchResults->count()); ?>
            <?php $lastnum = min(($step * 10), $searchResults->count());?>
            Showing <span id="nResultsCurrentTop"><?php echo $firstnum; ?>-<?php echo $lastnum; ?></span> of <span id="totalResultsTop">{{$searchResults->count()}}</span> items
        </div>
        <nav class="col-md-4 col-7 d-flex text-center justify-content-md-center justify-content-end" aria-label="Search Results Pages">
            <div class="d-flex flex-column justify-content-center">
                <ul class="pagination pagination-sm mb-0">
                    <li id="prevButton" class="prevButton page-item"><a class="page-link link-secondary">Previous</a></li>
                    <li class="page-item"><a class="page-link link-dark"><?php echo $step; ?></a></li>
                    <li id="nextButton" class="nextButton page-item"><a class="page-link link-secondary">Next</a></li>
                </ul>
            </div>
        </nav>
        <div class="col-md-4 col-12 d-flex justify-md-content-end justify-content-center">
            <label for="orderSelectSearch" class="align-middle me-2">Order by </label>
            <select id="orderSelectSearch" class="form-select form-select-sm w-50 border-bottom-0 rounded-0 rounded-top">
                <option <?php if($filterNum == 1) echo 'selected'?> value="1">Name A-Z</option>
                <option <?php if($filterNum == 2) echo 'selected'?> value="2">Name Z-A</option>
                <option <?php if($filterNum == 3) echo 'selected'?> value="3">Price: Most expensive first</option>
                <option <?php if($filterNum == 4) echo 'selected'?> value="4">Price: Least expensive first</option>
            </select>
        </div>
    </header>
    <ul class="list-group list-group-flush px-md-5 px-1 flex-grow-1" id="searchItemsList">
        <?php $user = Auth::user(); ?>
        @foreach ($searchResults as $itemkey => $item)
            @if($itemkey > (($step - 1) * 10) - 1 && $itemkey < $step * 10)
                @include('partials.searchResultItemCard',array($item))
            @endif
        @endforeach
    </ul>
    <footer class="row mt-3 pt-2 ms-lg-3 ms-md-1 me-lg-5 me-md-2 pe-lg-5 pe-md-1 px-2 border-top" id="searchControlsBottom">
        <div class="col-md-4 col-5">
            <?php $firstnum = min((($step - 1) * 10) + 1, $searchResults->count()); ?>
            <?php $lastnum = min(($step * 10), $searchResults->count());?>
            Showing <span id="nResultsCurrentBot"><?php echo $firstnum; ?>-<?php echo $lastnum; ?></span> of <span id="totalResultsBot">{{$searchResults->count()}}</span> items
        </div>
        <nav class="col-md-4 col-7 d-flex text-center justify-content-md-center justify-content-end mb-1" aria-label="Search Results Pages">
            <ul class="pagination pagination-sm mb-0">
                <li class="prevButton page-item"><a class="page-link link-secondary">Previous</a></li>
                <li class="page-item"><a class="page-link link-dark"><?php echo $step; ?></a></li>
                <li class="nextButton page-item"><a class="page-link link-secondary">Next</a></li>
            </ul>
        </nav>
    </footer>
</div>