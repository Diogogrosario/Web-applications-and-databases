<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    public function submit(Request $request) {
        $data = $request->all();
        $product_id = $request->route('id');
        $user_id = Auth::user()['user_id'];

        // if(Review::where('user_id', $user_id)->where('item_id', $product_id)->exists()) {
            
        //     return response()->json("User cannot review a product more than once", 403);

        // } else {
            $review = Review::create([
                'user_id' => $user_id,
                'item_id' => $product_id,
                'comment_text' => $data['review_text'], 
                'rating' => $data['star_rating']
            ]);

            // $review = new Review;
            // $review->user_id = Auth::user()['user_id'];
            // $review->item_id = $product_id;
            // $review->comment_text = $data['review_text'];
            // $review->rating = $data['star_rating'];

            // $user = User::find(Auth::user()['user_id']);
            // $review->user()->save($user);

            // $review->save();

            // $review->load('user');
            
            $view = View::make('partials/review', [$review])->with('review', $review)->render();

            return response()->json($view, 200);
        // }
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
