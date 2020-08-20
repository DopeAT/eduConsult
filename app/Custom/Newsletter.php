<?php


namespace App\Custom;


use App\Custom\Interfaces\NotificationInterface;

class Newsletter implements NotificationInterface
{

    private $total;

    public function __construct()
    {
        $this->get();
    }

    public function get()
    {
        return $this->total = \App\Newsletter::where('is_new', 1)->count();
    }

    public function send()
    {
        return [
            'total'  => $this->total
        ];
    }
}
