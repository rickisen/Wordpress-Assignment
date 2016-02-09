<?php

// pluginname WP Figlet
// shortname WPFiglet
// dashname wp-figlet

/*
Plugin Name: WP Figlet
Version: 0.2.1
Plugin URI: http://www.prelovac.com/vladimir/wordpress-plugins/wp-figlet
Author: Vladimir Prelovac
Author URI: http://www.prelovac.com/vladimir
Description: WP Figlet allows you to draw ASCII art in your posts and page source.

*/


global $wp_version;	

$exit_msg='WP Figlet requires WordPress 2.3 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';

if (version_compare($wp_version,"2.3","<"))
{
	exit ($exit_msg);
}


// Avoid name collisions.
if ( !class_exists('WPFiglet') ) :

class WPFiglet {
	
	// Name for our options in the DB
	var $DB_option = 'WPFiglet_options';
	
	// the plugin URL
	var $plugin_url;
	
	// plugin language textdomain
	var $plugin_domain='WP-Figlet';  
	
	
	// Initialize WordPress hooks
	function WPFiglet() {	
		$this->plugin_url=trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
		
		$this->handle_load_domain();
		$options = $this->get_options();
		
		//add_filter('the_content',  array(&$this, 'content_filter'), 10);	
		// Add Options Page
		add_action('admin_menu',  array(&$this, 'admin_menu'));
		
		if ($options['printhead'])
			add_action('wp_head', array(&$this, 'handle_wp_head'),-10);
		
		// add shortcode handler
		add_shortcode('ascii', array(&$this, 'post_ascii'));

		
	}

	// Hook the admin menu
	function admin_menu() {
		//add_management_page('WP Figlet Options', 'WP Figlet', 8, basename(__FILE__), array(&$this, 'handle_options'));
		add_options_page('WP Figlet Options', 'WP Figlet', 8, basename(__FILE__), array(&$this, 'handle_options'));
		

	} 
	
	function post_ascii( $params, $content = null )
	{
		$values = shortcode_atts( array(
	   'font' => 'big.flf',
	   'smalltext' => ''	   
	   ), $params );

		
		$line=$this->get_ascii('cachenormal', $content, $values['smalltext'], $values['font']);
		
		return '<pre>'.$line.'</pre>';
	}



	function handle_load_domain() {
		$locale = get_locale();
		$mofile = $this->plugin_url.'/lang/' .$this->plugin_domain. '-' . $locale . '.mo';
		load_textdomain($this->plugin_domain, $mofile); 	
	} 
	
	function get_ascii($type, $bigtext, $smalltext, $font) {
		$line='';
		
		$options = $this->get_options();
		
		// check cache
		if (($options[$type]['bigtext']==$bigtext) && ($options[$type]['font']==$font))
			$line=$options[$type]['line'];			
		else
		{		
			if ($bigtext)
			{	
				require("phpfiglet_class.php");
			
				$phpFiglet = new phpFiglet();
				
				if ($phpFiglet->loadFont( dirname (__FILE__).'/fonts/'.$font)) {
		 			$line=$phpFiglet->fetch($bigtext);
		 		} else {
		 			$line="Could not load font file";
		 		}
		 		
		 		$options[$type]['bigtext']=$bigtext;
		 		$options[$type]['font']=$font;
		 		$options[$type]['line']=$line;
		 		
		 		update_option($this->DB_option, $options); 
	 		}	 	
		}
		return $line;
	}
	
	
	function handle_wp_head(){
		
				
		$options = $this->get_options();
		
		$bigtext=$options['bigtext'];
		$smalltext=$options['smalltext'];
		$font=$options['font'];
		
		
		$line=$this->get_ascii('cachehead', $bigtext, $smalltext, $font);		
		
		echo "\n<!--\n".$line.$smalltext."\n\n\ncreated by wp figlet-->\n";
	}
	
	
	// Handle our options
	function get_options() {
	   $options = array(		
			'cachehead' => array('bigtext'=>'', 'font'=>'', 'line'=>''),
			'cachenormal' => array('bigtext'=>'', 'font'=>'', 'line'=>''),
			'bigtext' => __('Hello World'),
			'smalltext' => __('Welcome to my site'),
			'font' => "big.flf",
			'printhead' => ''
			
		);

    $saved = get_option($this->DB_option);

    if (!empty($saved)) {
        foreach ($saved as $key => $option)
            $options[$key] = $option;
    }             
    if ($saved != $options)
    	update_option($this->DB_option, $options); 
    	
    return $options;
	}

	// Set up default values
	function install() {
		$this->get_options();		
		
	}
	
	function handle_options()
	{
		$options = $this->get_options();


		if ( isset($_POST['submitted']) ) {
			$options = array();
		
			
			$options['bigtext']=$_POST['bigtext'];							
			$options['smalltext']=$_POST['smalltext'];							
			$options['font']=$_POST['font'];							
			$options['printhead']=$_POST['printhead'];		
		
			update_option($this->DB_option, $options);
			echo '<div class="updated fade"><p>'.__('Plugin settings saved.').'</p></div>';
		}

		

		$action_url = $_SERVER['REQUEST_URI'];	

		$bigtext=$options['bigtext'];
		$smalltext=$options['smalltext'];
		$font=$options['font'];
		$printhead=$options['printhead']=='on'?'checked':'';
		
		$select='';   
		if ($handle = opendir(dirname (__FILE__).'/fonts')) {

			while (false !== ($file = readdir($handle)))
			{
				if ($file != "." && $file != "..") {
				//	if ($phpFiglet->loadFont("fonts/" . $file)) {
						$select.='<option value="'.$file.'" '.($file==$font ? 'selected="selected"' : '').'>'.$file."</option>\n";
					//}
				}
			}
			closedir($handle);
	}

		
			
		$action_url = $_SERVER['REQUEST_URI'];	
		$imgpath=$this->plugin_url.'/img';	

		
		include('wp-figlet-options.php'); 
		
		

	}
	
	

}

endif; 

if ( class_exists('WPFiglet') ) :
	
	$WPFiglet = new WPFiglet();
	if (isset($WPFiglet)) {
		register_activation_hook( __FILE__, array(&$WPFiglet, 'install') );
	}
endif;

?>