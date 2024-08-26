<?php

/**
 * @package pablosPlugin
 */

class PablosPluginDeactivate {
  public static function deactivate() {
    flush_rewrite_rules();
  }
}
