<?php

namespace RocketFry\Jello;

use FarhanIsraq\Plugin;
use RocketFry\Jello\Components\Message;

class JelloPlugin extends Plugin
{
    public static function say(): string
    {
        return 'Jello, World!';
    }

    public static function msg(): string
    {
        return Message::msg();
    }
}
