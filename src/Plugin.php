<?php

namespace FarhanIsraq;

abstract class Plugin
{
    abstract public static function say(): string;
    abstract public static function msg(): string;
}
