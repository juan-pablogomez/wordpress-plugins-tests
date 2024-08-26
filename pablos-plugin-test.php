<?php 
/**
 * 
 * Plugin Name: Pablos Puglin
 * Plugin URI: https://github.com/juan-pablogomez
 * Description: Plugin practice, test and showcases
 * Version: 1.0
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * Author: Juan Pablo Gómez
 * Author URI: https://curriculum-pablo.netlify.app/
 * License: GPL v2 or later  
 * @package pablosPlugin
 *  
*/




defined('ABSPATH') or die("You can't access this file");

class PablosPlugin {

  function __construct() {
    add_action('init',array($this, 'custom_post_type'));
  }
  function register() {
    add_action('admin_enqueue_scripts', array($this, 'enqueue')); // => For Backend 'ADMIN'
    // add_action('wp_enqueue_scripts', array($this, 'enqueue')); // For Frontend 'WP'
  }

  // function activate() {
  //   // Create CPT
  //   $this->custom_post_type();
  //   // Flush write rules
  //   flush_rewrite_rules();
  // }
  
  // function deactivate(){
  //   // Flush write rules
  //   flush_rewrite_rules();

  // }

  function custom_post_type() {
    register_post_type('job', array(
      'public' => true,
      'label' => 'Jobs'
    ));
  }

  function enqueue(){
    //enque all scripts
    wp_enqueue_style('pluginstyle', plugins_url('/assets/style.css', __FILE__ ));
    wp_enqueue_script('pluginscript', plugins_url('/assets/script.js', __FILE__ ));
  }


}

if (class_exists('PablosPlugin')) {
  $pablosPlugin = new PablosPlugin();
  $pablosPlugin->register();

  // For static Methods, whitout the 'this'. No inicialize the class, just using the class itself's name
  //  => PablosPlugin::register();
}


// Activation
require_once plugin_dir_path(__FILE__) . 'includes/pablos-plugin-activate.php';
register_activation_hook(__FILE__, array('PablosPluginActivate', 'activate'));

// Deactivation
require_once plugin_dir_path(__FILE__) . 'includes/pablos-plugin-deactivate.php';
register_deactivation_hook(__FILE__, array('PablosPluginDeactivate', 'deactivate'));