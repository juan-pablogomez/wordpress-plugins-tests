<?php

/**
 * @package pablosPlugin
 */

namespace Includes\Pages;

use Includes\Api\SettingsApi;

class Admin
{
  public $settings;
  public function __construct()
  {
    $this->settings = new SettingsApi();
  }
  public function register()
  {
    // add_action('admin_menu', array($this, 'add_admin_pages'));
    $pages = [
      [
        'page_title' => 'Pablos Plugin',
        'menu_title' => 'Pablos',
        'capability' => 'manage_options',
        'menu_slug' => 'pablos_plugin',
        'callback' => function () {
          echo "<h2>Hii</h2>";
        },
        'icon' => 'dashicons-admin-customizer',
        'position' => 110
      ]
    ];

    $this->settings->addPages($pages)->register();
  }

  // public function add_admin_pages()
  // {
  //   add_menu_page('Pablos Plugin', 'Pablos', 'manage_options', 'pablos_plugin', array($this, 'admin_index'), 'dashicons-admin-customizer', 110);
  // }

  // public function admin_index()
  // {
  //   // Require template
  //   require_once PLUGIN_PATH . 'templates/admin.php';
  // }
}
