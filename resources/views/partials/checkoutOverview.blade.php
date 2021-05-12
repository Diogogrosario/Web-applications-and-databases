<div class="tab-pane fade show active p-lg-4 p-1" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
    <div class="list-group list-group-flush">
        @foreach (Auth::user()->cart() as $item)
                @include("partials.checkoutItemCard",array("item" => $item))
        @endforeach


        <div class="row pt-3">
            <div class="col-lg-10 col-12 d-flex flex-column justify-content-center text-lg-end text-center pe-lg-5 fs-5">Total (w/ IVA):</div>
            <div class="col-lg-2 col-12 fs-4 text-center">{{Auth::user()->cartTotal()}}</div>
        </div>
    </div>
    <footer class="text-end mt-5 row">
        <button type="button" class="btn btn-success offset-lg-9 col-lg-3 col-12">Proceed to Addresses <i class="bi bi-arrow-right-circle"></i></button>
    </footer>
</div>