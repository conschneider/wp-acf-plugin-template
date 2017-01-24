<?php
if(!class_exists('CustomPlugin_Settings'))
{
    class CustomPlugin_Settings
    {
        const SLUG = "custom-plugin-options";

        /**
         * Construct the plugin object
         */
        public function __construct($plugin)
        {
            // register actions
            acf_add_options_page(array(
                'page_title' => __('Custom Plugin', 'custom'),
                'menu_title' => __('Custom Plugin', 'custom'),
                'menu_slug' => self::SLUG,
                'capability' => 'manage_options',
                'redirect' => false
            ));

            add_action('init', array(&$this, "init"));
            add_action('admin_menu', array(&$this, 'admin_menu'), 20);
            add_filter("plugin_action_links_$plugin", array(&$this, 'plugin_settings_link'));
        } // END public function __construct
        
        /**
         * Add options page
         */
        public function admin_menu()
        {
            // Duplicate link into properties mgmt
            add_submenu_page(
                self::SLUG,
                __('Settings', 'custom'),
                __('Settings', 'custom'),
                'manage_options',
                self::SLUG,
                1
            );
        }

        /**
         * Add settings fields via ACF
         */
        function init()
        {
            if(function_exists('register_field_group'))
            {
                // OUR ACF GOODIES ARE GOING TO GO HERE
            }
        }

        /**
         * Add the settings link to the plugins page
         */
        public function plugin_settings_link($links)
        { 
            $settings_link = sprintf('<a href="admin.php?page=%s">Settings</a>', self::SLUG); 
            array_unshift($links, $settings_link); 
            return $links; 
        } // END public function plugin_settings_link($links)
    } // END class CustomPlugin_Settings
} // END if(!class_exists('CustomPlugin_Settings'))