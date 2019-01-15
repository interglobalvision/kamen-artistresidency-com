<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
  $args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
  ) );
  $posts = get_posts( $args );
  $post_options = array();
  if ( $posts ) {
    foreach ( $posts as $post ) {
      $post_options [ $post->ID ] = $post->post_title;
    }
  }
  return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_igv_';

  /**
   * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
   */

  $options_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'options_metabox',
		'title'         => esc_html__( 'Options', 'cmb2' ),
		'object_types'  => array( 'post', 'page', 'resident' ), // Post type
	) );

  $options_metabox->add_field( array(
		'name'         => esc_html__( 'Image carousel', 'cmb2' ),
		'desc'         => esc_html__( '', 'cmb2' ),
		'id'           => $prefix . 'images',
		'type'         => 'file_list',
		'preview_size' => array( 150, 150 ), // Default: array( 50, 50 )
	) );

  // APPLY

  $apply_page = get_page_by_path('apply');

  if (!empty($apply_page) ) {
    $apply_metabox = new_cmb2_box( array(
      'id'            => $prefix . 'apply_metabox',
      'title'         => esc_html__( 'Fields', 'cmb2' ),
      'object_types'  => array( 'page' ), // Post type
      'show_on'      => array( 'key' => 'id', 'value' => array($apply_page->ID) ),
    ) );

    $apply_metabox->add_field( array(
  		'name' => esc_html__( 'Deadlines', 'cmb2' ),
  		'id'   => $prefix . 'apply_deadlines',
  		'type' => 'wysiwyg',
      'options' => array(
  	    'wpautop' => false, // use wpautop?
  	    'media_buttons' => false, // show insert/upload button(s)
    	),
  	) );

    $apply_metabox->add_field( array(
  		'name' => esc_html__( 'Residence Period', 'cmb2' ),
  		'id'   => $prefix . 'apply_period',
  		'type' => 'wysiwyg',
      'options' => array(
  	    'wpautop' => false, // use wpautop?
  	    'media_buttons' => false, // show insert/upload button(s)
    	),
  	) );

    $apply_metabox->add_field( array(
  		'name' => esc_html__( 'Submission', 'cmb2' ),
  		'id'   => $prefix . 'apply_submission',
  		'type' => 'wysiwyg',
      'options' => array(
  	    'wpautop' => false, // use wpautop?
  	    'media_buttons' => false, // show insert/upload button(s)
    	),
  	) );
  }

}
?>
