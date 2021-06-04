let DEFINED = 0;
let OTHER = 1;
let EQUAL = 2;

let billingState;
let shippingState = DEFINED;

let useBilling = document.querySelector('input#useDefinedBilling');
if(useBilling != null) {
    if(useBilling.checked)
        billingState = DEFINED;
    else 
        billingState = OTHER;
}

let useShipping = document.querySelector('input#useDefinedShipping');
let billingShipping = document.querySelector('input#shippingEqualBilling');
let shippingOther = document.querySelector('input#otherShipping');

let goBackButtons = document.querySelectorAll('button.go_back_checkout');


function addEventListeners() {
    if(useBilling != null)
        useBilling.addEventListener('change', updateBilling);
    
    if(useShipping != null)
        useShipping.addEventListener('change', updateShipping);

    if(billingShipping != null)
        billingShipping.addEventListener('change', updateShipping);

    if(shippingOther != null)
        shippingOther.addEventListener('change', updateShipping);

    for(goBackButton of goBackButtons) {
        goBackButton.addEventListener('click', goBackCheckout);
    }
}


function updateBilling() {

    if(!this.checked && billingState == DEFINED) { // change to form
        getAddressEditForm("billing");

    } else if(this.checked && billingState == OTHER) {
        getAddress("billing");
    }
}

function updateShipping() {
    if(!this.checked) 
        return;

    if(this == useShipping) {
        getAddress("shipping");

    } else if(this == billingShipping) {
        equalAddress();

    } else {
        getAddressEditForm("shipping");
        
    }
}

function getAddressEditForm(type)
{
    if(type != "billing" && type != "shipping")
        return;
        
    let url = "/checkout/addressForm/" + type;

    sendAjaxRequest('GET', url, null, function () {
        if (this.status === 200) {
            let parser = new DOMParser();
            let form = parser.parseFromString(this.response, 'text/html').body;
            let formPlace;

            if(type == "shipping" && shippingState == EQUAL) 
                formPlace = document.querySelector("div#equalAddress");
            else 
                formPlace = document.querySelector("table#" + type + "Address_checkout");

            formPlace.replaceWith(form);

            if(type == "billing") 
                billingState = OTHER;
            else
                shippingState = OTHER;
        }});
}

function getAddress(type)
{
    let url = "/checkout/addressInfo/" + type;

    if(type != "billing" && type != "shipping")
        return;

    sendAjaxRequest('GET', url, null, function () {
        if (this.status === 200) {
            let parser = new DOMParser();
            let info = parser.parseFromString(this.response, 'text/html').body;
            let infoPlace;

            if(type == "shipping" && shippingState == EQUAL) 
                infoPlace = document.querySelector("div#equalAddress");
            else 
                infoPlace = document.querySelector("div#" + type + "AddressForm_checkout");

            infoPlace.replaceWith(info);

            if(type == "billing")
                billingState = DEFINED;
            else
                shippingState = DEFINED;

        }});    
}

function equalAddress()
{
    if(shippingState == EQUAL)
        return;

    let replacement = document.createElement("div");
    replacement.setAttribute("id", "equalAddress");
    let toReplace;

    if(shippingState == DEFINED) 
        toReplace = document.querySelector("table#shippingAddress_checkout");
    else 
        toReplace = document.querySelector("div#shippingAddressForm_checkout");

    toReplace.replaceWith(replacement);

    shippingState = EQUAL;
}

function goBackCheckout() {
    if(this.id == 'go_back_addresses') {
        window.location.href = "/checkout";
    } else if(this.id == 'go_back_shipping') {
        window.location.href = "/checkout?step=1";
    } else if(this.id == 'go_back_payment') {
        window.location.href = "/checkout?step=2";
    }
}

addEventListeners();