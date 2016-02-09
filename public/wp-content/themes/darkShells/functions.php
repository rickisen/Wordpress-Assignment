<?php 

// Visuals and content ================================================================================

// load the CSS into wp
function loadScripts(){
  wp_enqueue_style( 'darkshells-style', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts','loadScripts');

// register sidebar
function add_widget_areas(){
  register_sidebar([
    'name' => 'Header Widget Area',
    'id' => 'header-widgets'
  ]);
  register_sidebar([
    'name' => 'Left Sidebar',
    'id' => 'sidebar-left'
  ]);
}
add_action('widgets_init','add_widget_areas');

//register main nav
function register_header_nav_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_header_nav_menu' );


// Custom Post Types  ================================================================================

// Show CPT on home page
function add_my_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'softwareProject', 'terminaltheme', 'CliReview' ) );
  return $query;
}
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

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
function post_type_terminaltheme_init(){
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
        'rewrite'            => array( 'slug' => 'terminaltheme' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'taxonomies'         => array( 'terminal', 'colors', 'recomendation'),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );

  register_post_type('terminaltheme', $args);
}
add_action('init','post_type_terminaltheme_init');

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

/*
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
 */


function add_color_taxonomy() {
    $args = [
    'name' => 'Colors',
    'singular_name' => 'Color',
    'label' => 'Color',
    'rewrite' => ['slug' => 'color'],
    'hierarchical' => false
    ];
    register_taxonomy('color', 'terminaltheme', $args);
}
add_action( 'init', 'add_color_taxonomy');


// Terminal-Taxonomy, used for TerminalThemes 
function create_terminal_taxonomy(){
   register_taxonomy(
    'terminal',
    'terminaltheme',
    array(
      'label'        => 'Terminal Emulator',
      'rewrite'      => array( 'slug' => 'terminal' ),
      'hierarchical' => false,
    )
  ); 
}
add_action('init', 'create_Terminal_taxonomy');

// ProgramType-Taxonomy, used for CliReviews 
function create_programtype_taxonomy(){
   register_taxonomy(
    'programtype',
    array('clireview', 'softwareproject'),
    array(
      'label'        => 'Program Type',
      'rewrite'      => array( 'slug' => 'programtype' ),
      'hierarchical' => true
    )
  ); 
}
add_action('init', 'create_programtype_taxonomy');

// Recomendation-Taxonomy, used for CliReview and TerminalTheme
function create_recommendation_taxonomy(){
   register_taxonomy(
    'recomendation',
    array('clireview', 'terminaltheme'),
    array(
      'label'        => 'Recomendation',
      'rewrite'      => array( 'slug' => 'recommendation' ),
      'hierarchical' => false,
    )
  ); 
}
add_action('init', 'create_recommendation_taxonomy');

// taxonomy for softwareProjects 
function create_tech_taxonomy(){
   register_taxonomy(
    'tech',
    'softwareproject',
    array(
      'label' => 'Tech',
      'rewrite' => array( 'slug' => 'tech' ),
      'hierarchical' => true,
    )
  ); 
}
add_action('init', 'create_tech_taxonomy');


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


