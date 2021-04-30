<form class="mt-4 mb-5" id={{"editReviewForm_" . $review["review_id"]}}>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <textarea required class="form-control" id="edit_review_text" name="review_text" placeholder={{$review["comment_text"]}} aria-label="Review textarea" maxlength="400" style="resize:none;"></textarea>
    <div class="editRate">
        <input type="radio" id="editStar5" name="editRate" value="5" />
        <label for="editStar5" title="text">5 stars</label>
        <input type="radio" id="editStar4" name="editRate" value="4" />
        <label for="editStar4" title="text">4 stars</label>
        <input type="radio" id="editStar3" name="editRate" value="3" />
        <label for="editStar3" title="text">3 stars</label>
        <input type="radio" id="editStar2" name="editRate" value="2" />
        <label for="editStar2" title="text">2 stars</label>
        <input type="radio" id="editStar1" name="editRate" value="1" />
        <label for="editStar1" title="text">1 star</label>
    </div>
    <div class="d-flex flex-row-reverse">
        <button type="button" form="editReviewForm" class="btn btn-dark btn-md my-2" onclick={{"cancelEditRequest(".$review["review_id"].")"}}>X</button>
        <button type="button" form="editReviewForm" class="btn btn-dark btn-md m-2" onclick={{"submitEditRequest(".$review["review_id"].")"}}>Submit</button>
    </div>    
</form> 