<?php

/**
 * @package pablosPlugin
 */

namespace Includes\Pages;

use Includes\Api\Callbacks;
use Includes\Api\Callbacks\AdminCallbacks;
use Includes\Api\SettingsApi;
use Includes\Base\BaseController;

class Admin extends BaseController
{
  public $settings;
  public $callbacks;
  public $pages = [];
  public $subpages = [];


  public function register()
  {
    $this->settings = new SettingsApi();
    // add_action('admin_menu', array($this, 'add_admin_pages'));
    $this->callbacks = new AdminCallbacks();
    $this->setPages();
    $this->setSubpages();
    $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
  }

  public function setPages()
  {
    $this->pages = array(
      array(
        'page_title' => 'Pablos Plugin',
        'menu_title' => 'Pablos',
        'capability' => 'manage_options',
        'menu_slug' => 'pablos_plugin',
        'callback' => array($this->callbacks, 'adminDashboard'),
        'icon' => 'dashicons-admin-customizer',
        'position' => 110
      )
    );
  }

  public function setSubpages()
  {
    $this->subpages = array(
      array(
        'parent_slug' => 'pablos_plugin',
        'page_title' => 'Custom Post Types',
        'menu_title' => 'CPT',
        'capability' => 'manage_options',
        'menu_slug' => 'pablos_cpt',
        'callback' => array($this->callbacks, 'adminCpt')
      ),
      array(
        'parent_slug' => 'pablos_plugin',
        'page_title' => 'Custom Taxonomies',
        'menu_title' => 'Taxonomies',
        'capability' => 'manage_options',
        'menu_slug' => 'pablos_taxonomies',
        'callback' => array($this->callbacks, 'adminTaxonomy')
      ),
      array(
        'parent_slug' => 'pablos_plugin',
        'page_title' => 'Custom Widgets',
        'menu_title' => 'Widgets',
        'capability' => 'manage_options',
        'menu_slug' => 'pablos_widgets',
        'callback' => array($this->callbacks, 'adminWidget')
      )
    );
  }
}
