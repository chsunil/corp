
<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => __( 'General', 'single-page-corp' )
      ),
      array(
        'id'          => 'home',
        'title'       => __( 'Home', 'single-page-corp' )
      ),
      array(
        'id'          => 'social',
        'title'       => __( 'Social', 'single-page-corp' )
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'logo',
        'label'       => __( 'Logo', 'single-page-corp' ),
        'desc'        => __( 'Upload your website Logo', 'single-page-corp' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'background',
        'label'       => __( 'Background', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'font',
        'label'       => __( 'Font', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'google-fonts',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'google_analytics',
        'label'       => __( 'Google Analytics', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'css_setting',
        'label'       => __( 'css setting', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'copy',
        'label'       => __( 'copy', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'header_image',
        'label'       => __( 'Header Image', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'show_about_us',
        'label'       => __( 'Show About Us', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'show',
            'label'       => __( 'Show', 'single-page-corp' ),
            'src'         => ''
          ),
          array(
            'value'       => 'hide',
            'label'       => __( 'Hide', 'single-page-corp' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'about_us_heading',
        'label'       => __( 'About Us Heading', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'about_us_content',
        'label'       => __( 'About Us Content', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'show_porfolio',
        'label'       => __( 'Show Porfolio', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'show',
            'label'       => __( 'Show', 'single-page-corp' ),
            'src'         => ''
          ),
          array(
            'value'       => 'hide',
            'label'       => __( 'Hide', 'single-page-corp' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'portfolio_heading',
        'label'       => __( 'Portfolio Heading', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'show_clients',
        'label'       => __( 'Show Clients', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'show_google_map',
        'label'       => __( 'Show Google Map', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'show',
            'label'       => __( 'Show', 'single-page-corp' ),
            'src'         => ''
          ),
          array(
            'value'       => 'hide',
            'label'       => __( 'Hide', 'single-page-corp' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'google_map_code',
        'label'       => __( 'Google Map Code', 'single-page-corp' ),
        'desc'        => __( 'Enter Your code for Google map', 'single-page-corp' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'social',
        'label'       => __( 'Social', 'single-page-corp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'social-links',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}