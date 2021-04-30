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
    
    public function getFrom($id)
    {
        $review = Review::find($id);
        return view("partials.editReviewForm")->with("review",$review);
    }

    public function getReview($id)
    {
        $review = Review::find($id);
        return view("partials.review")->with("review",$review);
    }

    public function updateReview(Request $request)
    {
        $reviewId = $request->route('reviewId');
        $review = Review::find($reviewId);
        $data = $request->all();

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

        if($reviewToDelete->exists() && ($reviewToDelete["user_id"] == $currentUser["user_id"] || $currentUser["is_admin"] == true)) {
            $reviewToDelete->delete();
            return response()->json("Review deleted successfuly", 200);
        } else {
            if($reviewToDelete->exists()) {
                return response()->json("User not authorized to delete the review" . $reviewToDelete["review_id"] . $currentUser["user_id"], 403);
            } else {
                return response()->json("Review does not exist", 406);
            }
        }
    }
}
