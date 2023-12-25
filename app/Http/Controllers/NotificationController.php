<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->where('id', $request->input('id'))
            ->markAsRead();

        return back();
    }
}
