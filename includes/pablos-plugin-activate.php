<?php

/**
 * @package pablosPlugin
 */

class PablosPluginActivate {
  public static function activate() {
    flush_rewrite_rules();
  }
}
