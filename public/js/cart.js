
function addEventListeners() {
    let addButtons = document.querySelectorAll('button.add_cart');
    for(let addButton of addButtons) {
        addButton.addEventListener("click", addProductToCart);
    }

    let addButtonsCheckout = document.querySelectorAll('button.add_cart_checkout');
    for(let addButtonCheckout of addButtonsCheckout) {
        addButtonCheckout.addEventListener("click", addProductToCartCheckout);
    }

    let removeButtons = document.querySelectorAll('button.remove_cart');
    for(let removeButton of removeButtons) {
        removeButton.addEventListener("click", removeFromCart);
    }
}

function addProductToCart(event, checkout) {
    event.preventDefault();
    console.log("Add to cart");

    let handler = checkAddCart;

    if(checkout === true) {
        handler = checkAddCartCheckout;
    }

    let product_id = this.closest('div.modal').getAttribute('data-id');
    let quantity = document.querySelector('input#quantity_' + product_id).value;
    let url = "/api/cart/" + product_id + "/" + quantity;
    sendAjaxRequest("POST", url, null, handler);
}

function addProductToCartCheckout(event) {
    addProductToCart.call(this, event, true);
}

function checkAddCart() {
    console.log(this);
    console.log(this.responseText);
}

function checkAddCartCheckout() {
    console.log(this);
    console.log(this.responseText);

    window.location.replace('/checkout'); // MAYBE CHANGE THIS
}


function removeFromCart(event) {
    event.preventDefault();

    console.log("removing");

    let product_id = this.closest('div.cart-item').getAttribute("data-id");

    let url = "/api/cart/" + product_id;
    sendAjaxRequest("DELETE", url, null, function() {
        console.log(this.responseText);

        if(this.status == 200) {
            let cartItem = document.querySelector('div.cart-item[data-id="'+product_id+'"]');
            if(cartItem != null)
                cartItem.remove();
        }
    });
}


addEventListeners();