<div class="modal fade show" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="balanceModalLabel">Add balance to account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{action('UserController@addBalance')}}" id="addBalance">
                    @csrf
                    <label for="recipient-name" class="col-form-label"> How much would you like to add?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">€</div>
                        </div>
                        <input type="number" class="form-control" id="recipient-name" placeholder="Amount, I.e: 20">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="addBalance">Procced to PayPal</button>
            </div>
        </div>
    </div>
</div>