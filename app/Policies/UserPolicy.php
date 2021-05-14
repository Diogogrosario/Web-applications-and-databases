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

    public function edit(User $user, User $userToEdit)
    {
        return Auth::user()["user_id"] == $user["user_id"];
    }

    public function checkout(User $user, User $user1)
    {
        return Auth::check();
    }
}
