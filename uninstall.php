<?php

/**
 * Trigger this file on Plugin uninstall
 * @package pablosPlugin
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
  die;
}


// Clear Database stored data
// $jobs = get_posts(array(
//   'post_type' => 'job',
//   'numberposts' => -1
// ));

// foreach($jobs as $job) {
//   wp_delete_post($job->ID, true);
// }

// Access to Database via SQL
global $wpdb;
$args = "DELETE FROM wp_posts WHERE post_type = 'job'";
$wpdb->query($args);
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
