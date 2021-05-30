<li class="accordion-item purchaseFromHistory" id="purchaseEntry_{{$purchase["purchase_id"]}}">
    <header class="accordion-header" id={{"heading" . $purchase["purchase_id"]}}>
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target={{"#collapse" . $purchase["purchase_id"]}} aria-expanded="false" aria-controls={{"collapse" . $purchase["purchase_id"]}}>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-6 d-flex flex-column justify-content-center text-center px-0">
                        <span class="d-md-none d-block">ID: {{$purchase['purchase_id']}}</span>
                        <span class="d-md-block d-none">{{$purchase['purchase_id']}}</span>
                    </div>
                    @php
                        $purchase_status = $purchase['state'];
                        if($purchase_status == 'Arrived') {
                            $status = "success";
                        } else if($purchase_status == 'Processing') {
                            $status = "info text-dark";
                        } else {
                            $status = "primary";
                        }
                    @endphp 
                    <div class="col-lg-2 col-6 pb-1 pt-1 text-center fs-5">
                        <span class="badge bg-{{$status}} purchase-status-badge" id="status-purchase-{{$purchase['purchase_id']}}">
                        {{$purchase['state']}}
                        </span>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-1 pt-1 d-flex flex-column justify-content-center">
                        <b class="text-center" style="color: red"><span class="historyPrice">{{ $purchase->purchaseTotal() }}</span> €</b>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-1 pt-1 d-flex flex-column justify-content-center historyDate text-center">
                         {{$purchase->getDate()}}
                    </div>
                    <div class="col-lg-2 col-md-6 col-12 text-center">
                        <input class="btn btn-secondary changeStatus" type="button" value="Change Status" data-id="{{$purchase['purchase_id']}}" data-bs-toggle="modal" data-bs-target="#changeStatusModal_{{$purchase['purchase_id']}}">
                    </div>
                </div>
            </div>
        </button>
    </header>
    <div id={{"collapse" . $purchase["purchase_id"]}} class="accordion-collapse collapse border-1" aria-labelledby="headingOne">
        <div class="accordion-body p-5 pt-4">
            <div class="row purchase_addresses">
                @include('partials.purchaseHistoryAddress', array("addressType" => "Billing", "address" => $purchase->billingAddress()))
                @include('partials.purchaseHistoryAddress', array("addressType" => "Shipping", "address" => $purchase->shippingAddress()))
            </div>

            @php
                $shipping_option = $purchase->shippingOption();
            @endphp
            
            @foreach ($purchase->purchasedItems()->get() as $item)
                @include("partials.purchaseItemCard",array("item" => $item))
            @endforeach

            <div class="purchase-shipping-method row pt-3">
                <div class="col-lg-10 col-3 d-flex flex-column justify-content-center text-lg-end text-center pe-lg-5 fs-5">Shipping:</div>
                <div class="col-lg-2 col-9 fs-4 text-center">{{$shipping_option['name'] . ' - ' . $shipping_option['price']}}</div>
            </div>
            
            <div class="row pt-3 purchase-total">
                <div class="col-lg-10 col-3 d-flex flex-column justify-content-center text-lg-end text-center pe-lg-5 fs-5">Total:</div>
                <div class="col-lg-2 col-9 fs-4 text-center">{{ $purchase->purchaseTotal() }}</div>
            </div>
        </div>
    </div>
    @include('partials.changePurchaseStatusModal', array($purchase))
</li>