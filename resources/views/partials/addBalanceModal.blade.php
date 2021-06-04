<div class="modal fade show" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="balanceModalLabel">Add balance to account</h5>
                <button type="button" class="btn btn-light ms-2" style="border: solid 1px lightgrey;" data-bs-container="body" data-bs-trigger="focus" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-html="true" data-bs-content="You can add money to your account via <b>PayPal</b>.<br>Your balance can then be used to <b>buy produts</b> in the store. <b>Cannot be refunded</b>.">
                    <i class="bi bi-info-circle"></i> What's this?
                </button>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (Auth::user()->hasVerifiedEmail())
                <div class="modal-body">
                    <form method="post" action="{{action('UserController@addBalance')}}" id="addBalance">
                        @csrf
                        <label for="recipient-name" class="col-form-label"> How much would you like to add?</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="number" class="form-control" name="balance_amount" required id="balance_amount-name" placeholder="Amount, I.e: 20">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addBalance">Procced to PayPal</button>
                </div>
            @else
                <div class="modal-body">
                    <form method="post" action="{{action('UserController@addBalance')}}" id="addBalance">
                        @csrf
                        <p> Account has yet to be verified, please verify your account.</p>
                    </form>
                </div>
                <div class="modal-footer">
                    <form action={{route("verification.send")}} method="post">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Re-Send Email</button>
                    </form>
                </div>
            @endif
            
        </div>
    </div>
</div>