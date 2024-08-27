<?php

/**
 * @package PablosPlugin
 */

namespace Includes\Base;
class Enqueue
{
  public function register()
  {
    add_action('admin_enqueue_scripts', array($this, 'enqueue')); // => For Backend 'ADMIN'
    add_action('wp_enqueue_scripts', array($this, 'enqueue')); // For Frontend 'WP'
  }

  function enqueue()
  {
    //enque all scripts
    wp_enqueue_style('pluginstyle', PLUGIN_URL . 'assets/style.css');
    wp_enqueue_script('pluginscript', PLUGIN_URL . 'assets/script.js');
  }
}
