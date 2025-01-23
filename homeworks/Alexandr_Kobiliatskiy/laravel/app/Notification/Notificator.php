<?php

namespace App\Notification;

class Notificator
{
    public function send(string $msg): void
    {
        echo $msg;
    }
}
