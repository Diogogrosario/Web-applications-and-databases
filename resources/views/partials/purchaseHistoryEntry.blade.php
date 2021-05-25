<div class="accordion-item purchaseFromHistory">
    <h2 class="accordion-header" id={{"heading" . $purchase["purchase_id"]}}>
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target={{"#collapse" . $purchase["purchase_id"]}} aria-expanded="false" aria-controls={{"collapse" . $purchase["purchase_id"]}}>
            <div class="container-fluid">
                <div class="row ps-2">
                    <div class="col-lg-6 col-md-6 col-sm-6 pb-1 pt-1">
                        <!-- TODO: MUDAR DE LISTA PARA OUTRA COISA POR CAUSA DE BACKGROUND QUANDO SELECIONADO-->
                        @foreach ($purchase->purchasedItems()->get() as $key => $item)
                            @if ($key >3)
                                @break
                            @endif
                            <p id={{"purchaseHistoryText" . $purchase["purchase_id"]}} class="border-0 pt-0 pb-0 mb-1">{{$item->getItem()["name"]}}</p>
                        @endforeach
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 pb-1 pt-1 d-flex flex-column justify-content-center">
                        <b class="text-center fs-5" style="color: red"><span class="historyPrice">{{ $purchase->purchaseTotal() }}</span> €</b>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 pb-1 pt-1 d-flex flex-column justify-content-center historyDate text-center fs-5">
                         {{$purchase->getDate()}}
                    </div>
                </div>
            </div>
        </button>
    </h2>
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
</div>