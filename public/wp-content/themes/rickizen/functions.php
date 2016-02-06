<?php 

function loadScripts(){
  wp_enqueue_style( 'rickizen-style', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts','loadScripts');

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

function post_type_portfolio_init(){

$labels = array(
        'name'                  => 'Portfolio',
        'singular_name'         => 'Portfolio',
        'menu_name'             => 'Portfolio',
        'name_admin_bar'        => 'Portfolio',
        'add_new'               => 'Portfolio',
        'add_new_item'          => 'Portfolio',
        'new_item'              => 'Portfolio',
        'edit_item'             => 'Portfolio',
        'view_item'             => 'Portfolio',
        'all_items'             => 'Portfolio',
        'search_items'          => 'Portfolio',
        'parent_item_colon'     => 'Portfolio',
        'not_found'             => 'Portfolio',
        'not_found_in_trash'    => 'Portfolio',
        'featured_image'        => 'Portfolio',
        'set_featured_image'    => 'Portfolio',
        'remove_featured_image' => 'Portfolio',
        'use_featured_image'    => 'Portfolio',
        'archives'              => 'Portfolio',
        'insert_into_item'      => 'Portfolio',
        'uploaded_to_this_item' => 'Portfolio',
        'filter_items_list'     => 'Portfolio',
        'items_list_navigation' => 'Portfolio',
        'items_list'            => 'Portfolio'
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );

  register_post_type('portfolio',$args);
}
add_action('init','post_type_portfolio_init');

/*function rickizen_customize_register($wp_customize){

  $wp_customize->add_setting('rickizen_background',[ 'default' => '#222', 'transport' => 'refresh']);
  $wp_customize->add_section('rickizen_colors', ['title'=>'Theme Colors', 'priority'=>10]);
  $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'background_color', [
      'label'   => 'Background',
      'section' => 'rickizen_colors',
      'setting' => 'rickizen_background'
    ])
  );


}
add_action('customize_register','rickizen_customize_register');
 */
function tobiaslanden_customize_register( $wp_customize ){

$wp_customize->add_section('tobiaslanden_colors', ['title' => "Theme colors", 'priority' => 10]);

$wp_customize->add_setting('font_color', ['default' => "#fff", 'transport' => 'refresh']);
$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'font_color', [
				'label' => "Font Color",
				'section' => 'tobiaslanden_colors',
				'setting' => 'font_color'
			])
	);

$wp_customize->add_setting('background', ['default' => "#222", 'transport' => 'refresh']);
$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'background', [
				'label' => "Background",
				'section' => 'tobiaslanden_colors',
				'setting' => 'background'
			])
	);
}
add_action('customize_register','tobiaslanden_customize_register');

function rickizen_cutomize_css(){
  ?>
    <style type="text/css">
       body { 
        background:<?php echo get_theme_mod('background'); ?> ; 
        color:<?php echo get_theme_mod('font_color'); ?> ; 
      }
    </style>
  <?php
}
add_action('wp_head', 'rickizen_cutomize_css');


function create_portfolio_taxonomy(){
   register_taxonomy(
    'tech',
    'portfolio',
    array(
      'label' => 'Tech',
      'rewrite' => array( 'slug' => 'tech' ),
      'hierarchical' => true,
    )
  ); 
}
add_action('init', 'create_portfolio_taxonomy');
