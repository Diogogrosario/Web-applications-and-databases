function addEventListeners() {
    let doc = document.getElementById("orderSelect");
    doc.addEventListener("change", reorderList);
}

function reorderList(event){
    let val = this.value;

    let filterBy;
    let order;

    if(val == 1)
    {
        filterBy = "date";
        order = "desc";
        console.log(1);
    }
    else if(val == 2)
    {
        filterBy = "date";
        order = "asc";
        console.log(2);

    }

    let id = document.getElementById("user_id").getAttribute("value");

    let url = "/userProfile/purchaseHistory/reorder";

    let data = { "filterBy": filterBy, "order": order, "id": id };

    sendAjaxRequest('POST', url, data, function () {
        if (this.status === 200) {       
            let doc = document.getElementById("purchaseHistoryList");     
            let parser = new DOMParser();
            let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            doc.replaceWith(add);
        }});
}

addEventListeners();