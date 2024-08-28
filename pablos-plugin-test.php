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

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php' )) {
  require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));

use Includes\Base\Activate;
use Includes\Base\Deactivate;

function activate_pablos_plugin() {
  Activate::activate();
}
function deactivate_pablos_plugin() {
  Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_pablos_plugin');
register_deactivation_hook(__FILE__, 'deactivate_pablos_plugin');

if(class_exists('Includes\\Init')) {
  Includes\Init::register_services();
}

// use Includes\Base\Activate;
// use Includes\Base\Deactivate;

// if (!class_exists('PablosPlugin')) {
//   class PablosPlugin
//   {
//     public $plugin_name;

//     function __construct()
//     {
//       add_action('init', array($this, 'custom_post_type'));
//       $this->plugin_name = plugin_basename(__FILE__);
//     }
//     function register()
//     {

//       add_action('admin_enqueue_scripts', array($this, 'enqueue')); // => For Backend 'ADMIN'
//       // add_action('wp_enqueue_scripts', array($this, 'enqueue')); // For Frontend 'WP'

//       add_action('admin_menu', array($this, 'add_admin_pages'));

//       add_filter("plugin_action_links_$this->plugin_name", array($this, 'settings_link'));
//     }

//     public function settings_link($links)
//     {
//       // Add customs settings link
//       $settings_link = '<a href="options-general.php?page=pablos_plugin">Settings</a>';
//       array_push($links, $settings_link);
//       return $links;
//     }

//     public function add_admin_pages()
//     {
//       add_menu_page('Pablos Plugin', 'Pablos', 'manage_options', 'pablos_plugin', array($this, 'admin_index'), 'dashicons-admin-customizer', 110);
//     }

//     public function admin_index()
//     {
//       // Require template
//       require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
//     }


//     function activate()
//     {
//       // require_once plugin_dir_path(__FILE__) . 'includes/pablos-plugin-activate.php';
//       Activate::activate();
//     }

//     function deactivate()
//     {
//       // require_once plugin_dir_path(__FILE__) . 'includes/pablos-plugin-deactivate.php';
//       Deactivate::deactivate();
//     }

//     function custom_post_type()
//     {
//       register_post_type('job', array(
//         'public' => true,
//         'label' => 'Jobs'
//       ));
//     }

//     function enqueue()
//     {
//       //enque all scripts
//       wp_enqueue_style('pluginstyle', plugins_url('/assets/style.css', __FILE__));
//       wp_enqueue_script('pluginscript', plugins_url('/assets/script.js', __FILE__));
//     }
//   }

//   $pablosPlugin = new PablosPlugin();
//   $pablosPlugin->register();

//   // For static Methods, whitout the 'this'. No inicialize the class, just using the class itself's name
//   //  => PablosPlugin::register();


//   // Activation
//   register_activation_hook(__FILE__, array($pablosPlugin, 'activate'));

//   // Deactivation
//   register_deactivation_hook(__FILE__, array($pablosPlugin, 'deactivate'));
// }
