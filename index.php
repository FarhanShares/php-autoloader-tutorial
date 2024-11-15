<?php
require realpath('autoloader.php');

/**
 * As we use the namespace, the autoloader will load the class from the directories.
 * @see `autoloader.php` for the patterns we've used to identify the
 * correct classes from the directories.
 */

use FarhanIsraq\Display;
use FarhanShares\Example\ExamplePlugin;

use RocketFry\{
    Hello\HelloPlugin,
    Jello\JelloPlugin
};

// Initialize the display and plugins
$display = new Display();
$hello   = new HelloPlugin();
$jello   = new JelloPlugin();
$example = new ExamplePlugin();

// Display what the plugins have to say
$display($hello->say());
$display($jello->say());
$display($example->say());

$display('---');

// Display messages from the plugins
$display($hello->msg());
$display($jello->msg());
$display($example->msg());
