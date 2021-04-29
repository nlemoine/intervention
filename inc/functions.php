<?php

namespace Sober\Intervention;

// Exit early in case multiple Composer autoloaders try to include this file.
if (function_exists(__NAMESPACE__.'\\intervention')) {
    return;
}

/**
 * Setup $loader object from function intervention
 *
 * @param string $module
 * @param string|array $config
 * @param string|array $roles
 */
function intervention($module = false, $config = false, $roles = false)
{
    $class = __NAMESPACE__ . '\Module\\' . str_replace('-', '', ucwords($module, '-'));
    if (!class_exists($class)) {
        return;
    }
    $instance = (new $class($config, $roles))->run();
}
