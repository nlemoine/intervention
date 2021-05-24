<?php
/*
Plugin Name:        Intervention
Plugin URI:         http://github.com/soberwp/intervention
Description:        Easily customize wp-admin and configure application options.
Version:            2.0.0-rc.2
Author:             Sober
Author URI:         http://github.com/soberwp/
License:            MIT License
License URI:        http://opensource.org/licenses/MIT
GitHub Plugin URI:  soberwp/intervention
GitHub Branch:      master
*/
namespace Sober\Intervention;

/**
 * Restrict direct access
 */
if (!defined('ABSPATH')) {
    die;
};

define('INTERVENTION_DIR', dirname(__FILE__));

/**
 * Support for Bedrock/Composer
 */
if (!class_exists('Sober\Intervention\Intervention')) {
    include file_exists($composer = __DIR__ . '/vendor/autoload.php') ? $composer : __DIR__ . '/dist/autoload.php';
}

/**
 * Return user config for Intervention
 */
function get()
{
    $theme = get_stylesheet_directory();

    /**
     * Sage once included `style.css`under directory resources
     * which makes `$theme` incorrectly point to `resources/config`
     * resulting in the config file not being found. Searching 
     * for `resources` and changing to the parent directory fixes
     * the issue
     */
    $matchpos = strpos($theme, '/resources');
    $match = $matchpos && strpos($theme, 'resources') + strlen('resources') === strlen($theme);

    if ($match) {
        $theme = dirname(get_stylesheet_directory());
    }

    $config = file_exists($theme . '/config/') ?
        $theme . '/config/intervention.php' :
        $theme . '/intervention.php';

    /*
    $config = has_filter('sober/intervention/return') ?
        apply_filters('sober/intervention/return', rtrim($default)) :
        $default;
    */

    if (!file_exists($config)) {
        return;
    }

    $read = include($config);

    return $read === 1 ? false : $read;
}

/**
 * Initialize
 */
$intervention = new Intervention(get());
