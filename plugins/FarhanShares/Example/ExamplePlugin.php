<?php

namespace FarhanShares\Example;

use FarhanIsraq\Plugin;
use FarhanShares\Example\InjectMessage;

class ExamplePlugin extends Plugin
{
    public static function say(): string
    {
        return 'Example Here!';
    }

    public static function msg(): string
    {
        return InjectMessage::msg();
    }
}
