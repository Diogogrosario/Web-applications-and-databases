const reviewList = document.querySelector("section#productReviews");

function addEventListeners() {
    let reviewForm = document.querySelector('#newReviewForm button');
    if(reviewForm != null)
        reviewForm.addEventListener("click", submitNewReviewRequest);
}


function submitNewReviewRequest(event) {
    event.preventDefault();

    let product_id = document.querySelector("meta[name=item_id]").content;

    let url = "/products/" + product_id + "/review";

    let review_text = document.getElementById("new_review_text").value;
    let star_rating = document.querySelector("input[name=rate]:checked").value;
    
    let data = {"review_text": review_text, "star_rating": star_rating};
    
    sendAjaxRequest('post', url, data, function () {
        if (this.status === 200) {
            document.getElementById("new_review_text").value = "";
            let parser = new DOMParser();
	        let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            let doc = document.getElementById("productReviews");
            doc.insertBefore(add, doc.childNodes[0]);

            
        }});
}

function deleteReviewRequest(review_id) {

    let product_id = document.querySelector("meta[name=item_id]").content;

    let url = "/products/" + product_id + "/review/" + review_id;

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
    let star_rating = document.querySelector("input[name=editRate]:checked").value;

    let data = {"review_text": review_text, "star_rating": star_rating};

    sendAjaxRequest('put', url, data, function () {
        if (this.status === 200) {
            let parser = new DOMParser();
	        let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            doc.replaceWith(add);
        }});
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



addEventListeners();