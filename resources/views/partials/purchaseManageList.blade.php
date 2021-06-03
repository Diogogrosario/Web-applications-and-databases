<ul id="managePurchasesList" class="list-group list-unstyled">
    @foreach ($purchases as $purchase)
        @include('partials.purchaseManageEntry', array($purchase))
    @endforeach
</ul>