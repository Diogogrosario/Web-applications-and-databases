let quantities = [];

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

    let quantitiyInputs = document.querySelectorAll('input.product-quantity');
    for(let quantityInput of quantitiyInputs) {
        quantities[quantityInput.getAttribute("data-id")] = quantityInput.value;
        quantityInput.addEventListener("change", updateQuantity);
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
    let data = {"product_id": product_id, "quantity": quantity};
    let url = "/cart";
    sendAjaxRequest("POST", url, data, handler);
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

    let url = "/cart/" + product_id;
    sendAjaxRequest("DELETE", url, null, function() {
        console.log(this.responseText);

        if(this.status == 200) {
            let cartItem = document.querySelector('div.cart-item[data-id="'+product_id+'"]');
            if(cartItem != null)
                cartItem.remove();
            checkEmpty(JSON.parse(this.responseText)['total'])
        }
    });
}

function updateQuantity(event) {
    event.preventDefault();

    let product_index = this.getAttribute("data-id");
    let product_id = this.closest('div.cart-item').getAttribute("data-id");
    let url = "/cart/" + product_id;
    let quantity = this.value;
    let input = this;

    if(quantity == 0) {
        removeFromCart.call(this, event);
        return;
    }

    sendAjaxRequest("PATCH", url, {'quantity': quantity}, function() {
        console.log(this.responseText);

        if(this.status != 200) {
            console.log("error");
            input.value = quantities[product_index];
        } else {
            quantities[product_index] = quantity;
            // input.value = quantity;
            checkEmptyAndValue(JSON.parse(this.responseText)['total'])
        }
    });
}

function checkEmptyAndValue(total) {
    let list = document.querySelector('#cartList');
    let totalElement = document.querySelector('#cart_total')
    totalElement.innerHTML = total;
    if(list.children.length == 0) {
        let emptyCartP = document.createElement('p');
        emptyCartP.style = "background-color:#e8d0b0;"
        emptyCartP.classList.add("text-center");
        emptyCartP.classList.add("fs-3");
        emptyCartP.innerHTML = "Your cart is empty";
        list.appendChild(emptyCartP);
    }
}

addEventListeners();