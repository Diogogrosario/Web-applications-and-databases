<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    
    public function createReview(Request $request) {
        $data = $request->all();
        $product_id = $request->route('id');
        $user_id = Auth::user()['user_id'];

        $review = new Review();

        $this->authorize('create', $review);
       
        $review = Review::create([
            'user_id' => $user_id,
            'item_id' => $product_id,
            'comment_text' => $data['review_text'], 
            'rating' => $data['star_rating']
        ]);

        return $review;
    }
    
    public function getForm($id)
    {
        $review = Review::find($id);
        return view("partials.editReviewForm")->with("review",$review);
    }

    public function getReview($id)
    {
        $review = Review::find($id);
        if(is_null($review))
        {
            abort(404);
        }
        return view("partials.review")->with("review",$review);
    }

    public function updateReview(Request $request)
    {
        $reviewId = $request->route('reviewId');
        $review = Review::find($reviewId);
        if(is_null($review))
        {
            abort(404);
        }
        $data = $request->all();

        $this->authorize('update', $review);


        $review->comment_text = $data["review_text"];
        $review->rating = $data["star_rating"];

        $review->save();

        return view("partials.review")->with("review",$review);
    }

    public function submit(Request $request)
    {
        $review = $this->createReview($request);

        $view = view('partials.review')->with('review', $review);


        return $view;
    }

    public function delete(Request $request) {

        $reviewId = $request->route('reviewId');

        if(!Auth::check()) {
            return response()->json("Unauthenticated user cannot delete the review", 401);
        }
        
        $reviewToDelete = Review::find($reviewId);
        $currentUser = Auth::user();

        if(is_null($reviewToDelete)) {
            return response()->json("Review does not exist", 406);
            }

        $this->authorize('delete', $reviewToDelete);


        $reviewToDelete->delete();
        
        return response()->json("Review deleted successfuly", 200);

    }
}
