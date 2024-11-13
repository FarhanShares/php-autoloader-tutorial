<?php

namespace FarhanIsraq;

class Display
{
    public function __invoke(string $message = '')
    {
        echo $message . '<br />';
    }
}
