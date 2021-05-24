<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Discount;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscountPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Discount $discount) {
        return $user['is_admin'];
    }
}
