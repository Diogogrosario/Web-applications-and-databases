
let useBilling = document.querySelector('input#useDefinedBilling');
let useShipping = document.querySelector('input#useDefinedShipping');
let billingShipping = document.querySelector('input#shippingEqualBilling');
let shippingOther = document.querySelector('input#otherShipping');

function addEventListeners() {
    if(useBilling != null)
        useBilling.addEventListener('change', updateBilling);
}


function updateBilling() {
    if(this.checked) {

    }
}

function updateShipping() {

}

function getAddressEditForm(type)
{
    if(type != "billing" && type != "shipping")
        return;
        
    let url = "/checkout/address/" + type;

    sendAjaxRequest('GET', url, null, function () {
        if (this.status === 200) {
            let parser = new DOMParser();
            let form = parser.parseFromString(this.response, 'text/html').body;

            if(type == "billing") {
                let formPlace = document.querySelector()
            } else {

            }
            let doc = document.getElementById("userShipping");
            .firstChild;

            doc.replaceWith(add);

        }});
}

function getAddress(type)
{
    let url = "/userProfile/edit/getShippingInfo";

    if(type == "billing") {

    } else if(type != "shipping") {

    } else 
        return;

    sendAjaxRequest('GET', url, null, function () {
        if (this.status === 200) {
            let doc = document.getElementById("userShipping");
            let parser = new DOMParser();
            let add = parser.parseFromString(this.response, 'text/html').body.firstChild;

            doc.replaceWith(add);
        }});    
}

addEventListeners();