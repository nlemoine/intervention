<?php
/*
Plugin Name:        Intervention
Plugin URI:         http://github.com/soberwp/intervention
Description:        WordPress plugin containing modules to cleanup and customize wp-admin
Version:            1.3.0
Author:             Sober
Author URI:         http://github.com/soberwp/
License:            MIT License
License URI:        http://opensource.org/licenses/MIT
GitHub Plugin URI:  soberwp/intervention
GitHub Branch:      master
*/

if(!class_exists('Sober\Intervention\Instance')) {
    require(__DIR__ . '/dist/autoload.php');
}
