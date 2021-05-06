<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function putIsSeen($notificationId)
    {
        $notification = Notification::find($notificationId);

        $this->authorize('update', $notification);

        $notification["is_seen"] = true;
        $notification->save();
        return redirect()->back();
    }

    public function putIsSeenAjax($notificationId)
    {
        $notification = Notification::find($notificationId);

        $this->authorize('update', $notification);

        $notification["is_seen"] = true;
        $notification->save();
        
        return response()->json("Removed notification successfully", 200);
    }
}
