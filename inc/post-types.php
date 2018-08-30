<?php
/**
 * Adding Custom Post Types to the theme
 *
 * @package owt
 */

/**
 * Registering the post types.
 */

function owt_register_post_types(){
  /* Doctor Post Type */
  $labels = array(
        'name'                => _x( 'Doctors', 'Post Type General Name', 'owt' ),
        'singular_name'       => _x( 'Doctor', 'Post Type Singular Name', 'owt' ),
        'menu_name'           => __( 'Newt - Doctors And Clinicians', 'owt' ),
        'parent_item_colon'   => '',
        'featured_image'      => __( 'Image', 'owt' ),
        'set_featured_image'      => __( 'Add Image', 'owt' ),
        'remove_featured_image'      => __( 'Remove Image', 'owt' ),
        'all_items'           => __( 'All Doctors', 'owt' ),
        'view_item'           => __( 'View Doctor', 'owt' ),
        'add_new_item'        => __( 'Add New Doctor', 'owt' ),
        'add_new'             => __( 'Add New', 'owt' ),
        'edit_item'           => __( 'Edit Doctor Profile', 'owt' ),
        'update_item'         => __( 'Update Doctor Profile', 'owt' ),
        'search_items'        => __( 'Search Doctor', 'owt' ),
        'not_found'           => __( 'Not Found', 'owt' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'owt' ),
    );
    $args = array(
        'label'               => __( 'doctors', 'owt' ),
        'description'         => __( 'Details of our Doctors', 'owt' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'departments' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 7,
        'menu_icon'           => get_template_directory_uri() . '/assets/imgs/doctors-34-pd.png',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    // Registering Doctor Post Type
    register_post_type( 'doctors', $args );

    /* Services Post Type */
    $labels = array(
          'name'                => _x( 'Services', 'Post Type General Name', 'owt' ),
          'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'owt' ),
          'menu_name'           => __( 'Newt - Services We Provide', 'owt' ),
          'parent_item_colon'   => '',
          'featured_image'      => __( 'Image', 'owt' ),
          'set_featured_image'      => __( 'Add Image', 'owt' ),
          'remove_featured_image'      => __( 'Remove Image', 'owt' ),
          'all_items'           => __( 'All Services', 'owt' ),
          'view_item'           => __( 'View Service', 'owt' ),
          'add_new_item'        => __( 'Add New Service', 'owt' ),
          'add_new'             => __( 'Add New', 'owt' ),
          'edit_item'           => __( 'Edit Service', 'owt' ),
          'update_item'         => __( 'Update Service', 'owt' ),
          'search_items'        => __( 'Search Service', 'owt' ),
          'not_found'           => __( 'Not Found', 'owt' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'owt' ),
      );
      $args = array(
          'label'               => __( 'services', 'owt' ),
          'description'         => __( 'Details of our Services', 'owt' ),
          'labels'              => $labels,
          'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
          'taxonomies'          => array( 'departments' ),
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 6,
          'menu_icon'           => get_template_directory_uri() . '/assets/imgs/service-34-pd.png',
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'page',
      );
      // Registering Doctor Post Type
      register_post_type( 'services', $args );

      /* Testimonials Post Type */
      $labels = array(
            'name'                => _x( 'Testimonials', 'Post Type General Name', 'owt' ),
            'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'owt' ),
            'menu_name'           => __( 'Newt - Client Testimonials', 'owt' ),
            'parent_item_colon'   => '',
            'featured_image'      => __( 'Image', 'owt' ),
            'set_featured_image'      => __( 'Add Image', 'owt' ),
            'remove_featured_image'      => __( 'Remove Image', 'owt' ),
            'all_items'           => __( 'All Testimonials', 'owt' ),
            'view_item'           => __( 'View Testimonial', 'owt' ),
            'add_new_item'        => __( 'Add New Testimonial', 'owt' ),
            'add_new'             => __( 'Add New', 'owt' ),
            'edit_item'           => __( 'Edit Testimonial', 'owt' ),
            'update_item'         => __( 'Update Testimonial', 'owt' ),
            'search_items'        => __( 'Search Testimonial', 'owt' ),
            'not_found'           => __( 'Not Found', 'owt' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'owt' ),
        );
        $args = array(
            'label'               => __( 'testimonials', 'owt' ),
            'description'         => __( 'Customer Testimonials', 'owt' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => get_template_directory_uri() . '/assets/imgs/chat-34_3-pd.png',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
        // Registering Testimonials Post Type
        register_post_type( 'testimonials', $args );

}
add_action( 'init', 'owt_register_post_types', 0 );

 ?>
