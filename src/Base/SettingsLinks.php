<?php

/**
 * @package PablosPlugin
 */

namespace Includes\Base;

class SettingsLinks
{
  protected $plugin_name;
  public function __construct() {
    $this->plugin_name = PLUGIN;
  }
  public function register() {
    add_filter("plugin_action_links_$this->plugin_name", array($this, 'settings_link'));
  }

  public function settings_link($links)
  {
    $settings_link = '<a href="options-general.php?page=pablos_plugin">Settings</a>';
    array_push($links, $settings_link);
    return $links;
  }
}
