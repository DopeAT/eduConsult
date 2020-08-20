<?php


namespace App\Custom\Interfaces;


interface NotificationInterface
{

    /**
     * @return mixed
     */
    public function get();

    /**
     * @return mixed
     */
    public function send();

}
