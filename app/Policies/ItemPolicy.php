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

    public function create(User $user,Item $item)
    {
      return $user["is_admin"];
    }

    public function update(User $user,Item $item)
    {
      return $user["is_admin"];
    }

    public function delete(User $user,Item $item)
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

    public function discount(User $user, Item $item) {
      return $user['is_admin'];
    }
}
