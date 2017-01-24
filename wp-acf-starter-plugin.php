<?php
/**
 * @package Custom Starter Plugin utilizing ACF for WordPress
 * @version 1.0
 */
/*
Plugin Name: Custom Starter Plugin utilizing ACF for WordPress
Plugin URI: http://www.yaconiello.com/blog/making-better-wordpress-plugins/
Description: This plugin attempts to illustrate using clear exampes how to leverage ACF's power in a custom plugin.
Author: Con Schneider
Version: 1.0
Author URI: http://conschneider.de
*/

if(!class_exists("CustomPlugin"))
{
    /**
     * class:   CustomPlugin
     * desc:    plugin class to allow reports be pulled from multipe GA accounts
     */
    class CustomPlugin
    {
        /**
         * Created an instance of the CustomPlugin class
         */
        public function __construct()
        {
            // Set up ACF
            add_filter('acf/settings/path', function() {
                return sprintf("%s/includes/advanced-custom-fields-pro/", dirname(__FILE__));
            });
            add_filter('acf/settings/dir', function() {
                return sprintf("%s/includes/advanced-custom-fields-pro/", plugin_dir_url(__FILE__));
            });
            require_once(sprintf("%s/includes/advanced-custom-fields-pro/acf.php", dirname(__FILE__)));

            // Settings managed via ACF
            require_once(sprintf("%s/includes/admin/admin-settings.php", dirname(__FILE__)));
            $settings = new CustomPlugin_Settings(plugin_basename(__FILE__));

            // CPT for example post type
            require_once(sprintf("%s/includes/example-post-type.php", dirname(__FILE__)));
            $exampleposttype = new CustomPlugin_ExamplePostType();
        } // END public function __construct()

        /**
         * Hook into the WordPress activate hook
         */
        public static function activate()
        {
            // Do something
        }

        /**
         * Hook into the WordPress deactivate hook
         */
        public static function deactivate()
        {
            // Do something
        }
    } // END class CustomPlugin
} // END if(!class_exists("CustomPlugin"))

if(class_exists('CustomPlugin'))
{    
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('CustomPlugin', 'activate'));
    register_deactivation_hook(__FILE__, array('CustomPlugin', 'deactivate'));
    
    // instantiate the plugin class
    $plugin = new CustomPlugin();
} // END if(class_exists('CustomPlugin'))