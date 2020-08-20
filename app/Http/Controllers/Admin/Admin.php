<?php


namespace App\Http\Controllers\Admin;


use App\Custom\Messages;
use App\Custom\Newsletter;
use App\Custom\Orders;
use App\Http\Controllers\Controller;

class Admin extends Controller
{

    public $notifications;

    public function __construct()
    {
        $notificationMessages = new Messages;
        $notificationOrders   = new Orders;
        $notificationNewsletter = new Newsletter();

        $this->notifications = [
            'orders' => $notificationOrders->send(),
            'messages' => $notificationMessages->send(),
            'newsletter' => $notificationNewsletter->send()
        ];
    }

}
