<?php

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('WeDevs_Settings_API_Test' ) ):
class WeDevs_Settings_API_Test {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WeDevs_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_theme_page( 'Theme Settings', 'Theme Settings', 'edit_theme_options', 'settings_api_test', array($this, 'plugin_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'wedevs_basics',
                'title' => __( 'Basic Settings', 'single-page-corp' )
            ),
//            array(
//                'id' => 'wedevs_advanced',
//                'title' => __( 'Advanced Settings', 'single-page-corp' )
//            ),
//            array(
//                'id' => 'wedevs_others',
//                'title' => __( 'Other Settings', 'single-page-corp' )
//            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'wedevs_basics' => array(
                array(
                    'name'    => 'Logo',
                    'label'   => __( 'Logo', 'single-page-corp' ),
                   // 'desc'    => __( 'File description', 'single-page-corp' ),
                    'type'    => 'file',
                    'default' => '',
                    'options' => array(
                        'button_label' => 'Choose Image'
                    )
                ),
				 array(
                    'name'  => 'about_us',
                    'label' => __( 'about us', 'single-page-corp' ),
                    'desc'  => __( 'Check to show About us section in homepage', 'single-page-corp' ),
                    'type'  => 'checkbox'
                ),
				array(
                    'name'              => 'ab_title',
                    'label'             => __( 'About us Title', 'single-page-corp' ),
                    'type'              => 'text',
                ),
				array(
                    'name'    => 'wysiwyg',
                    'label'   => __( 'About Us Content', 'single-page-corp' ),
//                    'desc'    => __( 'WP_Editor description', 'single-page-corp' ),
                    'type'    => 'wysiwyg',
                    'default' => ''
                ),
				 array(
                    'name'  => 'Portfolio',
                    'label' => __( 'Portfolio', 'single-page-corp' ),
                    'desc'  => __( 'Check to show Portfolio section in homepage', 'single-page-corp' ),
                    'type'  => 'checkbox'
                ),
				array(
                    'name'              => 'portfolio_title',
                    'label'             => __( 'Portfolio Title', 'single-page-corp' ),
                   // 'desc'              => __( 'Text input description', 'single-page-corp' ),
                    'type'              => 'text',
                    'default'           => 'Portfolio',
                ),
				
				 array(
                    'name'  => 'GoogleMap',
                    'label' => __( 'Google Map', 'single-page-corp' ),
                    'desc'  => __( 'Check to show Google Map section in homepage', 'single-page-corp' ),
                    'type'  => 'checkbox'
                ),
				array(
                    'name'              => 'lang',
                    'label'             => __( 'Langitude Input', 'single-page-corp' ),
                    'desc'              => __( 'Number field with validation callback `intval`', 'single-page-corp' ),
                    'type'              => 'text',
                    'default'           => 'Title',
                ),
				array(
                    'name'              => 'lat',
                    'label'             => __( 'latitude Input', 'single-page-corp' ),
                    'desc'              => __( 'find latitude and Longitude here <a href="http://www.latlong.net/" target="new">latlong.net/</a>', 'single-page-corp' ),
                    'type'              => 'text',
                    'default'           => 'Title',
                ),
				array(
                    'name'              => 'Zoom',
                    'label'             => __( 'Zoom level', 'single-page-corp' ),
                    'desc'              => __( 'find latitude and Longitude here <a href="http://www.latlong.net/" target="new">latlong.net/</a>', 'single-page-corp' ),
                    'type'              => 'number',
                    'default'           => '7',
                ),
				
				
            ),
            
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;
