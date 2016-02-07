<?php 

// Visuals and content ================================================================================

// load the CSS into wp
function loadScripts(){
  wp_enqueue_style( 'darkshells-style', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts','loadScripts');

// register sidebar
function hej(){
  register_sidebar([
    'name' => 'Second Sidebar',
    'id' => 'sidebar-2'
  ]);
  register_sidebar([
    'name' => 'Sidebar',
    'id' => 'sidebar-1'
  ]);
}
add_action('widgets_init','hej');


// Custom Post Types  ================================================================================

// post type for software projects hosted on github
function post_type_softwareProject_init(){
  $labels = array(
        'name'                  => 'Software Projects',
        'singular_name'         => 'Software Project',
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Software Project' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'taxonomies'         => array('tech'),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
    );

  register_post_type('softwareProject', $args);
}
add_action('init','post_type_softwareProject_init');

// post type for Terminal Themes
function post_type_TerminalTheme_init(){
  $labels = array(
        'name'                  => 'Terminal Themes',
        'singular_name'         => 'Terminal Theme',
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'TerminalTheme' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'taxonomies'         => array( 'Terminal', 'Color', 'Recomendation'),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );

  register_post_type('TerminalTheme', $args);
}
add_action('init','post_type_CliReview_init');

// post type for CLI-reviews
function post_type_CliReview_init(){
  $labels = array(
        'name'                  => 'CLI Reviews',
        'singular_name'         => 'CLI Review',
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'CliReview' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'taxonomies'         => array('ProgramType', 'Recomendation'),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );

  register_post_type('CliReview', $args);
}
add_action('init','post_type_CliReview_init');

// Taxonomies ------------------------------------------------------------

// Color-Taxonomy, used for TerminalThemes 
function create_Color_taxonomy(){
   register_taxonomy(
    'Color',
    'TerminalTheme',
    array(
      'label'        => 'Color',
      'rewrite'      => array( 'slug' => 'Color' ),
      'hierarchical' => false,
    )
  ); 
}
add_action('init', 'create_Color_taxonomy');

// Terminal-Taxonomy, used for TerminalThemes 
function create_Terminal_taxonomy(){
   register_taxonomy(
    'Terminal',
    'TerminalTheme',
    array(
      'label'        => 'Terminal Emulator',
      'rewrite'      => array( 'slug' => 'Terminal' ),
      'hierarchical' => false,
    )
  ); 
}
add_action('init', 'create_Terminal_taxonomy');

// ProgramType-Taxonomy, used for CliReviews 
function create_Programtype_taxonomy(){
   register_taxonomy(
    'ProgramType',
    'CliReview',
    array(
      'label'        => 'Program Type',
      'rewrite'      => array( 'slug' => 'ProgramType' ),
      'hierarchical' => true
    )
  ); 
}
add_action('init', 'create_Programtype_taxonomy');

// Recomendation-Taxonomy, used for CliReview and TerminalTheme
function create_recommendation_taxonomy(){
   register_taxonomy(
    'Recomendation',
    array('CliReview', 'TerminalTheme'),
    array(
      'label'        => 'Recomendation',
      'rewrite'      => array( 'slug' => 'recommendation' ),
      'hierarchical' => false,
    )
  ); 
}
add_action('init', 'create_recommendation_taxonomy');

// taxonomy for softwareProjects 
function create_softwareProject_taxonomy(){
   register_taxonomy(
    'tech',
    'softwareProject',
    array(
      'label' => 'Tech',
      'rewrite' => array( 'slug' => 'tech' ),
      'hierarchical' => true,
    )
  ); 
}
add_action('init', 'create_softwareProject_taxonomy');


// Admin Panel ================================================================================

function customize_colors_register( $wp_customize ){

  $wp_customize->add_section('colors', ['title' => "Theme colors", 'priority' => 10]);

  $wp_customize->add_setting('font_color', ['default' => "#ddd", 'transport' => 'refresh']);
  $wp_customize->add_control(
      new WP_Customize_Color_Control($wp_customize, 'font_color', [
          'label' => "Font Color",
          'section' => 'colors',
          'setting' => 'font_color'
        ])
    );

  $wp_customize->add_setting('background', ['default' => "#222", 'transport' => 'refresh']);
  $wp_customize->add_control(
      new WP_Customize_Color_Control($wp_customize, 'background', [
          'label' => "Background",
          'section' => 'colors',
          'setting' => 'background'
        ])
    );
}
add_action('customize_register','customize_colors_register');

function darkshells_cutomize_css(){
  ?>
    <style type="text/css">
       body { 
        background:<?php echo get_theme_mod('background'); ?> ; 
        color:<?php echo get_theme_mod('font_color'); ?> ; 
      }
    </style>
  <?php
}
add_action('wp_head', 'darkshells_cutomize_css');


