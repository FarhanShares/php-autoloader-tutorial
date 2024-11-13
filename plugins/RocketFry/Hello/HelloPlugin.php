<?php

namespace RocketFry\Hello;

use FarhanIsraq\Plugin;
use RocketFry\Hello\Components\Message;

class HelloPlugin extends Plugin
{
    public static function say(): string
    {
        return 'Hello, World!';
    }

    public static function msg(): string
    {
        return Message::msg();
    }
}
