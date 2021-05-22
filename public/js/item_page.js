const reviewList = document.querySelector("section#productReviews");

function addEventListeners() {
    let reviewForm = document.querySelector('#newReviewForm button');
    if (reviewForm != null)
        reviewForm.addEventListener("click", submitNewReviewRequest);
    let editItemButton = document.getElementById("editItemButton");
    if (editItemButton != null)
        editItemButton.addEventListener("click", editItemRequest);
}

function editItemRequest(event) {
    event.preventDefault();
    let item_id = this.getAttribute("data-id");
    let url = "/management/item/" + item_id;

    let stock = document.getElementById("new_stock_" + item_id).value;
    let price = document.getElementById("new_price_" + item_id).value;
    let data = { "stock": stock, "price": price };

    sendAjaxRequest('POST', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            let stockDisplay = document.getElementById("stockDisplay");
            stockDisplay.innerHTML = stock;
            let priceDisplay = document.getElementById("productPrice");
            priceDisplay.innerHTML = "$" + price;
            let addCartModalPriceDisplay = document.getElementById("addCartModalPrice");
            addCartModalPriceDisplay.innerHTML = "$" + price;
            let editCartModalPriceDisplay = document.getElementById("editCartModalPrice");
            editCartModalPriceDisplay.innerHTML = "$" + price;
            let readdCartModalPriceDisplay = document.getElementById("readdCartModalPrice");
            if (readdCartModalPriceDisplay != null)
                readdCartModalPriceDisplay.innerHTML = "$" + price;
            let deleteCartModalPriceDisplay = document.getElementById("deleteCartModalPrice");
            if (deleteCartModalPriceDisplay != null)
                deleteCartModalPriceDisplay.innerHTML = "$" + price;
        }
    });
}

function editDetailForm(detail_value, item_id, detail_id) {

    let doc = document.getElementById("detailInfoContent_"+item_id+"_"+detail_id);


    let str = ` <section id = "detailInfoContent_`+item_id+`_`+detail_id+`">
                    <form method="post">
                        <textarea name="newDetailValue" class="w-100 h-50" required id="newDetailValue" rows=1 style="resize: none;" placeholder='` + detail_value + `'></textarea>
                    
                        <button id="submitNewDetailValue" data-id='`  + item_id + `_` + detail_id +`' type="button" class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Submit</button>
                        <button id="cancelNewDetailValue" data-id='`  + item_id + `_` + detail_id +`' type="button" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Cancel</button></td>

                </section>`;

    let parser = new DOMParser();
    let add = parser.parseFromString(str, 'text/html').body.firstChild;

    doc.replaceWith(add);

    //can't add in the beggining since these buttons do not exist
    let submitButton = document.getElementById("submitNewDetailValue");
    submitButton.addEventListener("click", submitNewDetailValue);

    let cancelButton = document.getElementById("cancelNewDetailValue");
    cancelButton.addEventListener("click", cancelNewDetailValue);
}


function submitNewDetailValue(event){
    event.preventDefault();
    
    let info = this.getAttribute('data-id');

    let item_id = info.split("_")[0];
    let detail_id = info.split("_")[1];

    let doc = document.getElementById("detailInfoContent_"+item_id+"_"+detail_id);

    console.log(item_id);
    console.log(detail_id);

    let newDetailValue = document.getElementById("newDetailValue").value;

    if(newDetailValue == null)
        return;

    let data = {'detail_value': newDetailValue};

    let url = "/item/"+item_id+"/editDetail/"+detail_id;

    sendAjaxRequest('PATCH', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {

            let str = `<section id = "detailInfoContent_`+item_id+`_`+detail_id+`">`
            +newDetailValue+`
        <button type="button" class="btn" onclick="editDetailForm('` + newDetailValue + `',` + item_id + `,` + detail_id + `)">
            <i class="bi bi-pencil-square" ></i>
        </button>
        </section>`

            let parser = new DOMParser();
            let add = parser.parseFromString(str, 'text/html').body.firstChild;

            doc.replaceWith(add);
        }});
}

function cancelNewDetailValue(event){
    event.preventDefault();

    let info = this.getAttribute('data-id');

    let item_id = info.split("_")[0];
    let detail_id = info.split("_")[1];

    let doc = document.getElementById("detailInfoContent_"+item_id+"_"+detail_id);

    let detail_value = document.getElementById("newDetailValue").getAttribute("placeholder");

    let str = `<section id = "detailInfoContent_`+item_id+`_`+detail_id+`">`
                +detail_value+`
                    <button type="button" class="btn" onclick="editDetailForm('` + detail_value + `',` + item_id + `,` + detail_id + `)">
                    <i class="bi bi-pencil-square" ></i>
                    </button>
                </section>`

    let parser = new DOMParser();
    let add = parser.parseFromString(str, 'text/html').body.firstChild;

    doc.replaceWith(add);
        
}


function addItem(item_id) {
    let url = "/management/item/" + item_id;

    let data = null;

    sendAjaxRequest('PATCH', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            // console.log(jsonData);
            let sectionToRemove = document.getElementById("addItemSection");
            let parser = new DOMParser();
            let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            console.log(add);
            sectionToRemove.replaceWith(add);

        }
    });
}

function deleteItem(item_id) {
    let url = "/management/item/" + item_id;

    let data = null;

    sendAjaxRequest('DELETE', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            // console.log(jsonData);
            let sectionToRemove = document.getElementById("deleteItemSection");
            let parser = new DOMParser();
            let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            console.log(add);
            sectionToRemove.replaceWith(add);
        }
    });
}


function submitNewReviewRequest(event) {
    event.preventDefault();

    let product_id = document.querySelector("meta[name=item_id]").content;

    let url = "/item/" + product_id + "/review";

    let review_text = document.getElementById("new_review_text").value;
    let star_selected = document.querySelector("input[name=rate]:checked");
    c
    if (star_selected == null) {
        let starForm = document.getElementById("newReviewStar");

        let parser = new DOMParser();
        let add = parser.parseFromString("<div style='color: red;' id='noStarSelected'>Select a rating</div>", 'text/html').body.childNodes[0];;

        starForm.appendChild(add);
    }
    else {
        let star_rating = star_selected.value
        let data = { "review_text": review_text, "star_rating": star_rating };

        let errorStars = document.getElementById('noStarSelected');

        if (errorStars != null)
            errorStars.remove();

        sendAjaxRequest('post', url, data, function () {
            if (this.status === 200) {
                document.getElementById("new_review_text").value = "";
                let parser = new DOMParser();
                let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
                let doc = document.getElementById("productReviews");
                doc.insertBefore(add, doc.childNodes[0]);


            }
        });
    }
}

function deleteReviewRequest(review_id) {
    let url = "/review/" + review_id;

    let data = null;

    sendAjaxRequest('delete', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            // console.log(jsonData);
            document.querySelector("div#review_" + review_id + ".user_review").remove();
        }
    });
}

function editReviewRequest(review_id) {
    let doc = document.getElementById("review_" + review_id);

    let url = "/item/getReviewForm/" + review_id;
    let data = null;

    sendAjaxRequest('post', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            let parser = new DOMParser();
            let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            doc.replaceWith(add);
        }
    });
}

function submitEditRequest(review_id) {
    let doc = document.getElementById("editReviewForm_" + review_id);

    let url = '/review/' + review_id;

    let review_text = document.getElementById("edit_review_text").value;
    let star_selected = document.querySelector("input[name=editRate]:checked");

    if (star_selected == null) {
        let starForm = document.getElementById("editReviewStar");

        let parser = new DOMParser();
        let add = parser.parseFromString("<div style='color: red;' id='noEditStarSelected'>Select a rating</div>", 'text/html').body.childNodes[0];;

        starForm.appendChild(add);
    }
    else {
        let star_rating = star_selected.value;
        let data = { "review_text": review_text, "star_rating": star_rating };

        let errorStars = document.getElementById('noEditStarSelected');

        if (errorStars != null)
            errorStars.remove();

        sendAjaxRequest('put', url, data, function () {
            if (this.status === 200) {
                let parser = new DOMParser();
                let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
                doc.replaceWith(add);
            }
        });
    }
}

function cancelEditRequest(review_id) {
    let doc = document.getElementById("editReviewForm_" + review_id);

    let url = "/item/getReview/" + review_id;
    let data = null;

    sendAjaxRequest('post', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            let parser = new DOMParser();
            let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            doc.replaceWith(add);
        }
    });
}



addEventListeners();