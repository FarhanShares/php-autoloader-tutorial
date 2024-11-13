<?php

/**
 * Define the namespace prefix and source directory for the application.
 */
define('APP_NAMESPACE_PREFIX', 'FarhanIsraq');
define('APP_SRC_DIR', __DIR__ . '/src');

define('PLUGIN_ENTRY_POINT_SUFFIX', 'Plugin');
define('PLUGINS_DIR', __DIR__ . '/plugins');

/**
 * Register the autoloader with the SPL autoloader stack with our own logic.
 *
 * @param string $class The fully qualified class name that has been accessed.
 */
spl_autoload_register(function ($class) {
    $base = PLUGINS_DIR;
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    /**
     * Load the src directory as the base if the class is in the APP_NAMESPACE_PREFIX namespace.
     *
     * @example FarhanIsraq\Plugin will be loaded from APP_SRC_DIR/Plugin.php
     */
    if (str_starts_with($path, APP_NAMESPACE_PREFIX)) {
        $base = APP_SRC_DIR;
        $path = str_replace(APP_NAMESPACE_PREFIX, '', $path) . '.php';
        goto load;
    }

    /**
     * We need a way to identify the main plugin entry point, which is why
     * PLUGIN_ENTRY_POINT_SUFFIX is used. Load the main plugin entry point as is.
     *
     * @example RocketFry\Hello\HelloPlugin will be loaded from PLUGINS_DIR/RocketFry/Hello/HelloPlugin.php
     */
    if (str_ends_with($path, PLUGIN_ENTRY_POINT_SUFFIX)) {
        $path = $path . '.php';
        goto load;
    }

    /**
     * Otherwise, for plugin files, add "src/" to the path, just after the plugin name.
     * Anything under the src directory is considered a component of the plugin.
     *
     * @example RocketFry\Hello\Message will be loaded from PLUGINS_DIR/RocketFry/Hello/src/Message.php
     */
    $path    = explode(DIRECTORY_SEPARATOR, $path);
    $path[2] = 'src' . DIRECTORY_SEPARATOR . $path[2]; # after plugin name add src
    $path    = implode(DIRECTORY_SEPARATOR, $path) . '.php';

    /**
     * Load the file if it exists and that's it.
     * If the file does not exist, throw an error or log it if needed.
     */
    load:
    $filepath = $base . DIRECTORY_SEPARATOR . $path;
    if (file_exists($filepath)) require_once $filepath;
});
