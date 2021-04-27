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

    let review_text =  document.getElementById("new_review_text").value;
    let star_rating = document.querySelector("input[name=rate]:checked").value;

    let data = {"review_text": review_text, "star_rating": star_rating};

    sendAjaxRequest('post', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            // console.log(jsonData);
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



addEventListeners();