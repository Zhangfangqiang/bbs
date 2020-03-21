<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\NotificationsRequest;

class NotificationsController extends Controller
{
    /**
     * 展示消息通知页
     * @param NotificationsRequest $notificationsRequest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(NotificationsRequest $notificationsRequest)
    {
        return view('web.notifications.index' ,compact('notificationsRequest'));
    }
}
