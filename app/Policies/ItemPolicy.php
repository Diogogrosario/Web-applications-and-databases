<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Card;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
      return $user["is_admin"];
    }

    public function update(User $user)
    {
      return $user["is_admin"];
    }

    public function delete(User $user)
    {
      return $user["is_admin"];
    }

    public function wishlist()
    {
      return Auth::check();
    }

    public function cart()
    {
      return Auth::check();
    }
}
