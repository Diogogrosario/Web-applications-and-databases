<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Review;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, User $userToDelete)
    {
        return $userToDelete["user_id"] == Auth::user()["user_id"] || Auth::user()["is_admin"];

    }
}
