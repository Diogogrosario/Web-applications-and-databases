<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Photo;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
{
    use HandlesAuthorization;

    public function create(User $user,Photo $photo)
    {
      return $user["is_admin"];
    }

    public function update(User $user,Photo $photo)
    {
      return $user["is_admin"];
    }

    public function delete(User $user,Photo $photo)
    {
      return $user["is_admin"];
    }
}
