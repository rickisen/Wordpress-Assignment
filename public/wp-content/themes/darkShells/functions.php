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
  register_sidebar([
    'name' => 'Hidden Footer',
    'id' => 'sidebar-hidden'
  ]);
}
add_action('widgets_init','add_widget_areas');

//register main nav
function register_header_nav_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_header_nav_menu' );

/* // Show CPT on home page */
/* function add_my_post_types_to_query( $query ) { */
/*   if ( is_home() && $query->is_main_query() ){ */
/*     $query->set( 'post_type', array( 'post', 'softwareProject', 'terminaltheme', 'CliReview' ) ); */
/*   } */
/*   return $query; */
/* } */
/* add_action( 'pre_get_posts', 'add_my_post_types_to_query' ); */

// Custom Post Types  ================================================================================

// post type for software projects hosted on github
function post_type_softwareProject_init(){
  $labels = array(
        'name'                  => 'Software Projects',
        'singular_name'         => 'Software Project',
    );
 
    $args = array(
        'labels'               => $labels,
        'public'               => true,
        'publicly_queryable'   => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'query_var'            => true,
        'rewrite'              => array( 'slug' => 'softwareproject' ),
        'capability_type'      => 'post',
        'has_archive'          => true,
        'hierarchical'         => false,
        'menu_position'        => null,
        'taxonomies'           => array('tech'),
        'supports'             => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt'),
        'register_metabox_cb'  => 'add_sp_metaboxes',
    );

  register_post_type('softwareproject', $args);
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
        'register_metabox_cb'  => 'add_tt_metaboxes',
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
        'rewrite'            => array( 'slug' => 'clireview' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'taxonomies'         => array('programtype', 'recomendation'),
        'register_metabox_cb'  => 'add_cr_metaboxes',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );

  register_post_type('clireview', $args);
}
add_action('init','post_type_CliReview_init');

// Taxonomies ------------------------------------------------------------

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

// metaboxes -----------------------------

// Softwareprojects ----------
function add_sp_metaboxes(){
  add_meta_box('sp-metabox', 'Softwareproject Metadata', 
    'sp_callback', 'softwareproject',
    'normal','high');
}
add_action('add_meta_boxes', 'add_sp_metaboxes');

function sp_callback(){
  global $post;

  // creates the nonce we will recieve later, 
  // although since this code is in functions.php, the noun should be that file, weird
  echo '<input type="hidden" name="softwareprojectmeta_noncename" 
    id="softwareprojectmeta_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'">';

  // get the link if it's allready been entered
  $ghlink = get_post_meta($post->ID,'_ghlink', true);
  $link = get_post_meta($post->ID,'_link', true);
  $screenshot = get_post_meta($post->ID,'_screenshot', true);

  // the input fields, potentially prefilled with previous data
  echo '
        <h2>Link to Webpage</h2>
        <p>The address to the page, with the "http://" part </p>
        <input type="text" name="_link" value="'.$link.'" class="widefat" 
        placeholder="http://www.myhompage.com" /> <hr>
      ';
  echo '
        <h2>Github Repo</h2>
        <p>The address to the repo, with the "https://" part </p>
        <input type="text" name="_ghlink" value="'.$ghlink.'" class="widefat" 
        placeholder="https://github.com/user/repo" /> <hr>
      ';

  echo '
        <h2>Screenshot</h2>
        <p>The address to a screenshot of the app, with the "http://" part </p>
        <input type="text" name="_screenshot" value="'.$screenshot.'" class="widefat" 
        placeholder="http://imagehost.com/image.jpg" />
      ';
}

function save_softwareprojectmeta($post_id, $post){
  // verify this is the right call we're handling
  if (!wp_verify_nonce($_POST['softwareprojectmeta_noncename'], plugin_basename(__FILE__) )){
    return $post->ID;
  }

  //verify permissions
  if (!current_user_can('edit_post', $post->ID)) {
    return $post->ID;
  }

  $events_meta['_ghlink']     = $_POST['_ghlink'];
  $events_meta['_link']     = $_POST['_link'];
  $events_meta['_screenshot'] = $_POST['_screenshot'];
  
  foreach($events_meta as $key => $value){
    //don't store custom data twice
    if ($post->post_type == 'revision') {
      return;
    }
    
    // If $value is an array, make it a CSV (unlikely)
    $value = implode(',', (array)$value); 
    
    // If the custom field already has a value, we update it, 
    // otherwise we add a new meta, or destroy it
    if(get_post_meta($post->ID, $key, FALSE)) { 
      update_post_meta($post->ID, $key, $value);
    } else { 
      // the custom field doesn't have a value so add it
      add_post_meta($post->ID, $key, $value);
    }	        
    
    // if we got an empty value, the user 
    // wanted to delete that field
    if(!$value) {
      delete_post_meta($post->ID, $key); 
    }
  }
}
add_action('save_post', 'save_softwareprojectmeta', 1, 2);

// Terminalthemes ----------
function add_tt_metaboxes(){
  add_meta_box('tt-metabox', 'Terminal Theme Metadata', 
    'tt_callback', 'terminaltheme',
    'normal','high');
}
add_action('add_meta_boxes', 'add_tt_metaboxes');

function tt_callback(){
  global $post;

  // creates the nonce we will recieve later, 
  // although since this code is in functions.php, the noun should be that file, weird
  echo '<input type="hidden" name="terminaltheme_noncename" 
    id="terminaltheme_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'">';

  // get the link if it's allready been entered
  $screenshot = get_post_meta($post->ID,'_screenshot', true);
  $link = get_post_meta($post->ID,'_link', true);

  // the input fields, potentially prefilled with previous data
  echo '
        <h2>Link</h2>
        <p>The address to the theme file, with the "https://" part </p>
        <input type="text" name="_link" value="'.$link.'" class="widefat" 
        placeholder="https://github.com/user/themerepo" /> <br><br><hr>
      ';
  echo '
        <h2>Screenshot</h2>
        <p>The address to a screenshot of the theme, with the "http://" part </p>
        <input type="text" name="_screenshot" value="'.$screenshot.'" class="widefat" 
        placeholder="http://imagehost.com/image.jpg" />
      ';
}

function save_terminalthememeta($post_id, $post){
  // verify this is the right call we're handling
  if (!wp_verify_nonce($_POST['terminaltheme_noncename'], plugin_basename(__FILE__) )){
    return $post->ID;
  }

  //verify permissions
  if (!current_user_can('edit_post', $post->ID)) {
    return $post->ID;
  }

  $events_meta['_screenshot'] = $_POST['_screenshot'];
  $events_meta['_link']       = $_POST['_link'];
  
  foreach($events_meta as $key => $value){
    //don't store custom data twice
    if ($post->post_type == 'revision') {
      return;
    }
    
    // If $value is an array, make it a CSV (unlikely)
    $value = implode(',', (array)$value); 
    
    // If the custom field already has a value, we update it, 
    // otherwise we add a new meta, or destroy it
    if(get_post_meta($post->ID, $key, FALSE)) { 
      update_post_meta($post->ID, $key, $value);
    } else { 
      // the custom field doesn't have a value so add it
      add_post_meta($post->ID, $key, $value);
    }	        
    
    // if we got an empty value, the user 
    // wanted to delete that field
    if(!$value) {
      delete_post_meta($post->ID, $key); 
    }
  }
}
add_action('save_post', 'save_terminalthememeta', 1, 2);

// CliReviews ----------
function add_cr_metaboxes(){
  add_meta_box('cr-metabox', 'Cli Review Metadata', 
    'cr_callback', 'clireview',
    'normal','high');
}
add_action('add_meta_boxes', 'add_cr_metaboxes');

function cr_callback(){
  global $post;

  // creates the nonce we will recieve later, 
  // although since this code is in functions.php, the noun should be that file, weird
  echo '<input type="hidden" name="clireview_noncename" 
    id="clireview_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'">';

  // get the link if it's allready been entered
  $screenshot = get_post_meta($post->ID,'_screenshot', true);

  // the input fields, potentially prefilled with previous data
  echo '
        <h2>Screenshot</h2>
        <p>The address to a screenshot of the app, with the "http://" part </p>
        <input type="text" name="_screenshot" value="'.$screenshot.'" class="widefat" 
        placeholder="http://imagehost.com/image.jpg" />
      ';
}

function save_clireviewmeta($post_id, $post){
  // verify this is the right call we're handling
  if (!wp_verify_nonce($_POST['clireview_noncename'], plugin_basename(__FILE__) )){
    return $post->ID;
  }

  //verify permissions
  if (!current_user_can('edit_post', $post->ID)) {
    return $post->ID;
  }

  $events_meta['_screenshot'] = $_POST['_screenshot'];
  
  foreach($events_meta as $key => $value){
    //don't store custom data twice
    if ($post->post_type == 'revision') {
      return;
    }
    
    // If $value is an array, make it a CSV (unlikely)
    $value = implode(',', (array)$value); 
    
    // If the custom field already has a value, we update it, 
    // otherwise we add a new meta, or destroy it
    if(get_post_meta($post->ID, $key, FALSE)) { 
      update_post_meta($post->ID, $key, $value);
    } else { 
      // the custom field doesn't have a value so add it
      add_post_meta($post->ID, $key, $value);
    }	        
    
    // if we got an empty value, the user 
    // wanted to delete that field
    if(!$value) {
      delete_post_meta($post->ID, $key); 
    }
  }
}
add_action('save_post', 'save_clireviewmeta', 1, 2);

// Filters for widgets ====================

// Adds a filter that includes my CPT's so that widgets 
// like 'recent posts' gets all CPT's posts
function widget_posts_args_add_custom_type() {
   $params['post_type'] = array('post','softwareproject','terminaltheme','clireview');
   return $params;
}
add_filter('widget_posts_args', 'widget_posts_args_add_custom_type'); 

// Admin Panel ================================================================================

function customize_colors_register( $wp_customize ){
  $wp_customize->add_section('colors', ['title' => "Theme colors", 'priority' => 10]);
  $wp_customize->add_section('show-hide', ['title' => "Show/Hide parts of the theme", 'priority' => 10]);


  $wp_customize->add_setting('arrows', ['default' => true, 'transport' => 'refresh']);
  $wp_customize->add_control(
      new WP_Customize_Control($wp_customize, 'arrows', [
          'label' => "Show arrows in the footer",
          'section' => 'show-hide',
          'setting' => 'arrow',
          'type' => 'checkbox',
        ])
    );

  // add color-settigns 
  $colors = [ 'background' => '#222', 'font_color' => '#ddd', 
    'h1' => '#e45641', 'h2' => '#f1a94e', 'h3' => '#44b3c2', 
    'h4' => '#3987c0', 'h5' => '#94f91d' ];
  foreach ($colors as $name => $color){
    $wp_customize->add_setting($name, ['default' => $color, 'transport' => 'refresh']);
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, $name, [
            'label' => $name,
            'section' => 'colors',
            'setting' => $name
          ])
      );
  }
}
add_action('customize_register','customize_colors_register');

function darkshells_cutomize_css(){
  ?>
    <style type="text/css">
       body { 
        background-color:<?php echo get_theme_mod('background'); ?> ; 
        color:<?php echo get_theme_mod('font_color'); ?> ; 
      }

      .window-colors{ 
        background-color:<?php echo get_theme_mod('background'); ?> ; 
      }

      h1 {color:<?php echo get_theme_mod('h1');?>}
      h2 {color:<?php echo get_theme_mod('h2');?>}
      h3 {color:<?php echo get_theme_mod('h3');?>}
      h4 {color:<?php echo get_theme_mod('h4');?>}
      h4 {color:<?php echo get_theme_mod('h5');?>}

      .arrows{display:<?php echo get_theme_mod('arrows') ? 'flex' : 'none'; ?>;}

      .arrows .leftside-arrows .arrow:nth-child(1) { background-color: <?php echo get_theme_mod('h2');?>; } 
      .arrows .leftside-arrows .arrow:nth-child(1):after { border-left-color: <?php echo get_theme_mod('h2');?>; } 
      .arrows .leftside-arrows .arrow:nth-child(2) { background-color: <?php echo get_theme_mod('h3');?>; }
      .arrows .leftside-arrows .arrow:nth-child(2):after { border-left-color:<?php echo get_theme_mod('h3');?>; } 
      .arrows .rightside-arrows .arrow:nth-child(1){ background-color: <?php echo get_theme_mod('h4');?>; }
      .arrows .rightside-arrows .arrow:nth-child(1):before { border-right-color:<?php echo get_theme_mod('h4');?>; } 
      .arrows .rightside-arrows .arrow:nth-child(2){ background-color: <?php echo get_theme_mod('h1');?>; } 
      .arrows .rightside-arrows .arrow:nth-child(2):before { border-right-color:<?php echo get_theme_mod('h1');?>; } 

    </style>
  <?php
}
add_action('wp_head', 'darkshells_cutomize_css');


