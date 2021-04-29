<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Review;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ReviewPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Review $review)
    {
      return Auth::check();
    }

    public function update(User $user, Review $review)
    {
      return $user["user_id"] == $review["user_id"] || $user["is_admin"];
    }

    public function delete(User $user, Review $review)
    {
        return $user["user_id"] == $review["user_id"] || $user["is_admin"];

    }
}
