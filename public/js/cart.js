

function addEventListeners() {
    let addButtons = document.querySelectorAll('button.add_cart');
    for(let addButton of addButtons) {
        addButton.addEventListener("click", addProductToCart);
    }
}

function addProductToCart(event) {
    event.preventDefault();

    let product_id = this.closest('div.modal').getAttribute('data-id');
    let quantity = document.querySelector('input#quantity_' + product_id).value;
    let url = "/api/cart/" + product_id + "/" + quantity;
    sendAjaxRequest("POST", url, null, checkAddCart);
}

function addProductToCartCheckout(event) {
    addProductToCart.call(this, event);

    //redirect to checkout page
    var request = new XMLHttpRequest();
    request.open("GET", "checkout", false);
    request.send(null);
    // xmlHttp.responseText;
}

function checkAddCart() {
    console.log(this);

    
}