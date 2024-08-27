<?php

/**
 * @package pablosPlugin
 */

namespace Includes\Pages;

class Admin
{
  public function register()
  {
    add_action('admin_menu', array($this, 'add_admin_pages'));
  }

  public function add_admin_pages()
  {
    add_menu_page('Pablos Plugin', 'Pablos', 'manage_options', 'pablos_plugin', array($this, 'admin_index'), 'dashicons-admin-customizer', 110);
  }

  public function admin_index()
  {
    // Require template
    require_once PLUGIN_PATH . 'templates/admin.php';
  }
}
