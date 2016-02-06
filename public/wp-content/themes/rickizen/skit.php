<?php 
function tobiaslanden_customize_register( $wp_customize ){

$wp_customize->add_setting('background', ['default' => "#fff", 'transport' => 'refresh']);
$wp_customize->add_section('tobiaslanden_colors', ['title' => "Theme colors", 'priority' => 10]);
$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'background', [
				'label' => "Background",
				'section' => 'tobiaslanden_colors',
				'setting' => 'background'
			])
	);


}
add_action('customize_register','tobiaslanden_customize_register');
