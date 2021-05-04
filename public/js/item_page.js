const reviewList = document.querySelector("section#productReviews");

function addEventListeners() {
    let reviewForm = document.querySelector('#newReviewForm button');
    if(reviewForm != null)
        reviewForm.addEventListener("click", submitNewReviewRequest);

    let wishListButton = document.querySelector('button.add-wishlist');
    wishListButton.addEventListener("click", wishlistRequest)
}


function submitNewReviewRequest(event) {
    event.preventDefault();

    let product_id = document.querySelector("meta[name=item_id]").content;

    let url = "/item/" + product_id + "/review";

    let review_text = document.getElementById("new_review_text").value;
    let star_selected = document.querySelector("input[name=rate]:checked");

    if(star_selected == null)
    {
        let starForm = document.getElementById("newReviewStar");
        
        let parser = new DOMParser();
        let add = parser.parseFromString("<div style='color: red;' id='noStarSelected'>Select a rating</div>", 'text/html').body.childNodes[0];;

        starForm.appendChild(add);
    }
    else{
        let star_rating = star_selected.value
        let data = {"review_text": review_text, "star_rating": star_rating};

        let errorStars = document.getElementById('noStarSelected');

        if(errorStars != null)
            errorStars.remove();
        
        sendAjaxRequest('post', url, data, function () {
            if (this.status === 200) {
                document.getElementById("new_review_text").value = "";
                let parser = new DOMParser();
                let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
                let doc = document.getElementById("productReviews");
                doc.insertBefore(add, doc.childNodes[0]);

                
            }});
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
        }});
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
        }});
}

function submitEditRequest(review_id) {
    let doc = document.getElementById("editReviewForm_" + review_id);
    
    let url = '/review/' + review_id;

    let review_text =  document.getElementById("edit_review_text").value;
    let star_selected = document.querySelector("input[name=editRate]:checked");

    if(star_selected == null)
    {
        let starForm = document.getElementById("editReviewStar");
        
        let parser = new DOMParser();
        let add = parser.parseFromString("<div style='color: red;' id='noEditStarSelected'>Select a rating</div>", 'text/html').body.childNodes[0];;

        starForm.appendChild(add);
    }
    else{
        let star_rating = star_selected.value;
        let data = {"review_text": review_text, "star_rating": star_rating};

        let errorStars = document.getElementById('noEditStarSelected');

        if(errorStars != null)
            errorStars.remove();

        sendAjaxRequest('put', url, data, function () {
            if (this.status === 200) {
                let parser = new DOMParser();
                let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
                doc.replaceWith(add);
            }});
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
        }});
}

function wishlistRequest(e) {
    let url = '/wishlist';
    let item_id = e.target.getAttribute('data-id');
    let data = null;
    let type = "add";
    let method = "post";

    if(e.target.classList.contains("add-wishlist")) {
        data = {'item_id': item_id};
    } else {
        method = "delete";
        url += '/' + item_id;
        type = "remove";
    }

    sendAjaxRequest(method, url, data, function() {
        console.log(this.response);
        if(this.status === 200) {
            if(type == "add") {
                e.target.innerHTML = '<i class="bi bi-heart-fill"></i> Remove from Wishlist';
                e.target.classList.add("remove-wishlist");
                e.target.classList.remove("add-wishlist");
            } else {
                e.target.innerHTML = '<i class="bi bi-heart"></i> Add to Wishlist';
                e.target.classList.remove("remove-wishlist");
                e.target.classList.add("add-wishlist");
            }
        }

    });
}



addEventListeners();