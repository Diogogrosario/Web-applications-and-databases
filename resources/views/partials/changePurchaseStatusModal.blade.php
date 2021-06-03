<div class="modal fade" id="changeStatusModal_{{$purchase['purchase_id']}}"  tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-content modal-body">
        <form>
            <legend class="d-flex justify-content-between">
                <span>Purchase (ID = {{$purchase['purchase_id']}})</span>
                <span class="badge bg-{{$status}} d-flex flex-column justify-content-center" id="status-modal-{{$purchase['purchase_id']}}">
                    {{$purchase['state']}}
                </span>
            </legend>
            Please select the new status for this purchase
            <div class="row mt-3">
                <div class="col-4 text-center d-flex flex-column justify-content-center fs-5">
                    <label for="status_{{$purchase['purchase_id']}}" class="form-label">Status</label>
                </div>
                <div class="col-8">
                    <select id="status_{{$purchase['purchase_id']}}" class="form-select">
                    <option value="Processing" 
                        @if ($purchase_status == 'Processing')
                            selected
                        @endif>
                        Processing
                    </option>
                    <option value="Sent"
                        @if ($purchase_status == 'Sent')
                            selected
                        @endif>
                        Sent
                    </option>
                    <option value="Arrived"
                        @if ($purchase_status == 'Arrived')
                            selected
                        @endif>
                        Arrived
                    </option>
                    </select>
                </div>
            </div>
            <footer class="text-end mt-2">
                <input class="btn btn-success change-status-submit" type="button" data-id="{{$purchase['purchase_id']}}" value="Submit" data-bs-dismiss="modal">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </footer>
        </form>
    </div>
</div>
