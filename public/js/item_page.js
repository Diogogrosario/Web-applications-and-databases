const reviewList = document.querySelector("section#productReviews");

function addEventListeners() {
    let reviewForm = document.querySelector('#newReviewForm button');
    if (reviewForm != null)
        reviewForm.addEventListener("click", submitNewReviewRequest);

    let editItemButton = document.getElementById("editItemButton");
    if (editItemButton != null)
        editItemButton.addEventListener("click", editItemRequest);

    let addDiscountForm = document.querySelector("form#addDiscountForm");
    if(addDiscountForm != null)
        addDiscountForm.addEventListener("submit", addDiscount);
    
    let removeDiscountButtons = document.querySelectorAll("button.delete_discount");
    for(removeDiscountButton of removeDiscountButtons) {
        removeDiscountButton.addEventListener("click", deleteDiscount);
    }
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
    
    if (star_selected == null) {
        let starForm = document.getElementById("newReviewStar");

        let parser = new DOMParser();
        if(document.querySelector("div#noStarSelected") == null) {
            let add = parser.parseFromString("<div style='color: red;' id='noStarSelected'>Select a rating</div>", 'text/html').body.childNodes[0];
            starForm.appendChild(add);
        }
    }
    else {
        let star_rating = star_selected.value
        let data = { "review_text": review_text, "star_rating": star_rating };

        let errorStars = document.getElementById('noStarSelected');

        if (errorStars != null)
            errorStars.remove();

        sendAjaxRequest('post', url, data, function () {
            console.log(this.response)
            if (this.status === 200) {
                document.getElementById("new_review_text").value = "";
                let parser = new DOMParser();
                let add = parser.parseFromString(this.responseText, 'text/html').body.childNodes[0];
                let doc = document.getElementById("productReviews");
                doc.insertBefore(add, doc.childNodes[0]);

                let reviewForm = document.querySelector("form#newReviewForm");
                reviewForm.remove();

            } else if(this.status == 406) {

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
        if(document.querySelector("div#noEditStarSelected") == null) {
            let add = parser.parseFromString("<div style='color: red;' id='noEditStarSelected'>Select a rating</div>", 'text/html').body.childNodes[0];
            starForm.appendChild(add);
        }
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

function addDiscount(event) {
    event.preventDefault();
    let item_id = this.getAttribute("data-id");

    let begin_input = this.querySelector("input#begin_date_" + item_id);
    let begin_date = new Date(begin_input.value);
    let end_input = this.querySelector("input#end_date_" + item_id);
    let end_date = new Date(end_input.value);

    let dates_div = document.querySelector("div#add_discount_dates");
    if(end_date - begin_date < 86400000) // less than 1 day difference
    {
        if(document.querySelector("div#discount_date_error") == null) {
            let date_error = document.createElement("div");
            date_error.setAttribute("id", "discount_date_error");
            date_error.className = "alert alert-danger";
            date_error.innerHTML = "End date must be at least one day after the begin date."
            dates_div.parentNode.insertBefore(date_error, dates_div);
        }
        return;
    } else {
        let date_error = dates_div.parentNode.querySelector("div#discount_date_error");
        if(date_error != null) {
            dates_div.parentNode.removeChild(date_error);
        }
    }

    let percentage_input = this.querySelector("input#percentage_" + item_id);
    let percentage = percentage_input.value;
    if(percentage < 1 || percentage > 99) 
        return;

    let url = "/admin/discountProduct";
    let data = {"item_id": item_id, "begin_date": begin_date.toLocaleDateString('en-US'), "end_date": end_date.toLocaleDateString('en-US'),
                "percentage": percentage};

    sendAjaxRequest('POST', url, data, function () {
         console.log(this.response);
        if (this.status === 200) {
            //clear inputs
            updatePrices(item_id);

            begin_input.value = null; 
            end_input.value = null;
            percentage_input.value = null;

            let responseJson = JSON.parse(this.responseText);
            let discountsList = document.querySelector("table#discounts_list tbody");
            
            let newDiscountEntry = document.createElement("tr");
            newDiscountEntry.setAttribute("class", "item_discount");

            let beginTd = document.createElement("td");
            beginTd.setAttribute("scope", "row")
            beginTd.innerHTML = responseJson['begin_date'];

            let endTd = document.createElement("td");
            endTd.innerHTML = responseJson['end_date'];

            let percTd = document.createElement("td");
            percTd.innerHTML = responseJson['percentage'] + '%';

            let deleteTd = document.createElement("td");
            deleteTd.setAttribute("class", "p-0 pt-1");
            deleteTd.innerHTML = '<button class="btn fs-4 p-0 m-0 delete_discount" data-id="' + responseJson['discount_id']
                                + '" style="color:red;"><i class="bi bi-trash-fill"></i></button>';

            newDiscountEntry.appendChild(beginTd);
            newDiscountEntry.appendChild(endTd);
            newDiscountEntry.appendChild(percTd);
            newDiscountEntry.appendChild(deleteTd);
            discountsList.appendChild(newDiscountEntry);
        }}
    );
}

function deleteDiscount(event) {
    let ids = this.getAttribute("data-id").split('_');
    let item_id = ids[1];
    let discount_id = ids[0];
    let discountRow = this.parentNode.parentNode;
    let discounts_list = discountRow.parentNode;

    let url = "/admin/discountProduct/" + item_id + '/' + discount_id;
    let data = null;

    sendAjaxRequest('DELETE', url, data, function () {
        console.log(this.response)
        if (this.status === 200) {
            discounts_list.removeChild(discountRow);
            updatePrices(item_id);
        }}
    );
}

function updatePrices(item_id) {
    let url = "/admin/discountProduct/" + item_id;
    let data = null;
    
    sendAjaxRequest('GET', url, data, function() {
        if(this.status === 200) {
            console.log(this.response);

            let price_details = JSON.parse(this.responseText);

            let mainPriceDiv = document.querySelector("div#productPrice");
            let mainInside = price_details['price_discounted'];
            let modalsInside = mainInside;

            if(price_details['discount'] > 0) {
                let discount_span = document.createElement('small');
                discount_span.setAttribute("class", "text-decoration-line-through");
                discount_span.style = "color:black; font-size:0.5em;";
                discount_span.innerHTML = price_details['price'];
                mainInside += discount_span.outerHTML;

                discount_span.setAttribute("class", "align-top itemPreviousPriceDiscount text-decoration-line-through fs-6");
                discount_span.style = "color:black;";
                modalsInside += discount_span.outerHTML;
            }
            mainPriceDiv.innerHTML = mainInside;
            
            let pricesModals = document.querySelectorAll("div.item-price-modal");
            for(let priceInModal of pricesModals) {
                priceInModal.innerHTML = modalsInside;
            }
        }
    });
}

addEventListeners();