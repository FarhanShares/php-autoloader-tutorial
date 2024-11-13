<?php

namespace FarhanIsraq;

/**
 * A simple display class (helper) that can be used to display messages.
 */
class Display
{
    public function __invoke(string $message = '')
    {
        echo $message . '<br />';
    }
}
