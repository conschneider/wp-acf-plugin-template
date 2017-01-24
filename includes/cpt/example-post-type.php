<?php
/**
 * Add a Custom Post Type: example
 */
if(!class_exists('CustomPlugin_ExamplePostType'))
{
    class CustomPlugin_ExamplePostType
    {
        const SLUG = "example";

        /**
         * Construct the custom post type for Reports
         */
        public function __construct()
        {
            // register actions
            add_action('init', array(&$this, 'init'));
        } // END public function __construct()
        
        /**
         * Hook into the init action
         */
        public function init()
        {
            // Register the Analytics Report post type
            register_post_type(self::SLUG,
                array(
                    'labels' => array(
                        'name' => __(sprintf('%ss', ucwords(str_replace("_", " ", self::SLUG))), 'custom'),
                        'singular_name' => __(ucwords(str_replace("_", " ", self::SLUG)), 'custom')
                    ),
                    'description' => __("Example post type", 'custom'),
                    'supports' => array(
                        'title',
                    ),
                    'public' => true,
                    'show_ui' => true,
                    'has_archive' => true,
                    'show_in_menu' => CustomPlugin_Settings::SLUG,
                )
            );

            if(function_exists("register_field_group"))
            {
                // Our ACF Goodies are going to go here
            } // END if(function_exists("register_field_group"))
        } // END public function init()
    } // END class CustomPlugin_ExamplePostType
} // END if(!class_exists('CustomPlugin_ExamplePostType'))