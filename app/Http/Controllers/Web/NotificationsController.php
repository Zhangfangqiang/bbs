<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    /**
     * 展示消息通知页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('web.notifications.index');
    }
}
