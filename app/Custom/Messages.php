<?php


namespace App\Custom;


use App\Custom\Interfaces\NotificationInterface;
use App\Message;

class Messages implements NotificationInterface
{

    private $messages;

    public function __construct()
    {
        $this->get();
    }

    public function get()
    {
        return $this->messages = Message::select('id','name','message', 'created_at')->where('is_new', 1)->latest()->get();
    }

    public function send()
    {
        return [
            'total' => count($this->messages),
            'data'  => $this->messages
        ];
    }
}
