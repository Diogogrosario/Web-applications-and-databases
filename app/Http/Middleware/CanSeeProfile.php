<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CanSeeProfile
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $profileID = $request->route('id');

        if(!Auth::check()) {
            return redirect('/');
        }

        if ($request->user()["user_id"] != $profileID && $request->user()["is_admin"] == false) {

            if($profileID != NULL)
                return redirect('/');
        }

        return $next($request);
    }

}