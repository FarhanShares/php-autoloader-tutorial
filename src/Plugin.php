<?php

namespace FarhanIsraq;

/**
 * A simple plugin class that can be used to create plugins.
 */
abstract class Plugin
{
    abstract public static function say(): string;
    abstract public static function msg(): string;
}
