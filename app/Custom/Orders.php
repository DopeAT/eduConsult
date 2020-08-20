<?php


namespace App\Custom;


use App\Custom\Interfaces\NotificationInterface;
use App\Order;

class Orders implements NotificationInterface
{

    private $total;

    public function __construct()
    {
        $this->get();
    }

    public function get()
    {
        return $this->total = Order::select('id')->where('is_new', 1)->count();
    }

    public function send()
    {
        return [
            'total'  => $this->total
        ];
    }
}
