<?php

add_action('customize_register', 'customize_register_general');

function customize_register_general($wp_customize) {

			/***General section***/
			$wp_customize->add_section('general', array(
				'title' => esc_attr__('General', 'theme'),
				'priority' => 10
			));

		  $wp_customize->add_setting('link_color', array(
			'default'     => '#000000',
		     'transport'   => 'refresh',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color',
				array(
					'label'   => __( 'Header Color', 'theme' ),
					'section' => 'general',
					'settings'=> 'link_color',
					'priority'=> 1,
			    )));


			//Layout control
			$wp_customize->add_setting('layout_control', array(
				'default' => 0,
				'sanitize_callback' => ''
			) );
			$wp_customize->add_control('layout_control', array(
				'label' => esc_attr__('Layout Control', 'theme'),
				'section' => 'general',
				'settings' => 'layout_control',
				'type' => 'radio',
				'priority' => 2,
				'choices' => array(
					0 => esc_attr__('Full Width Layout', 'theme'),
					1 => esc_attr__('Box Layout', 'theme'),
				)
			));


			//Banner control
			$wp_customize->add_setting('image_control', array(
				'default' => 0,
				'sanitize_callback' => ''
			) );
			$wp_customize->add_control('image_control', array(
				'label' => esc_attr__('Image Control', 'theme'),
				'section' => 'general',
				'settings' => 'image_control',
				'type' => 'radio',
				'priority' => 3,
				'choices' => array(
					0 => esc_attr__('Banner-00', 'theme'),
					1 => esc_attr__('Banner-01', 'theme'),
					2 => esc_attr__('Banner-02', 'theme'),
					3 => esc_attr__('Banner-03', 'theme'),
					4 => esc_attr__('Banner-04', 'theme'),
				)));



				//single control
				$wp_customize->add_setting('single_control', array(
					'default' => 0,
					'sanitize_callback' => ''
				) );
				$wp_customize->add_control('single_control', array(
					'label' => esc_attr__('Single Control', 'theme'),
					'section' => 'general',
					'settings' => 'single_control',
					'type' => 'radio',
					'priority' => 3,
					'choices' => array(
						0 => esc_attr__('Preset-01', 'theme'),
						1 => esc_attr__('Preset-02', 'theme'),
						2 => esc_attr__('Preset-03', 'theme'),
					)));

					//header control
					$wp_customize->add_setting('header_control', array(
						'default' => 0,
						'sanitize_callback' => ''
					) );
					$wp_customize->add_control('header_control', array(
						'label' => esc_attr__('Header Control', 'theme'),
						'section' => 'general',
						'settings' => 'header_control',
						'type' => 'radio',
						'priority' => 4,
						'choices' => array(
							0 => esc_attr__('Header-01', 'theme'),
							1 => esc_attr__('Header-02', 'theme'),
							2 => esc_attr__('Header-03', 'theme'),
							3 => esc_attr__('Header-04', 'theme'),
							4 => esc_attr__('Header-05', 'theme'),
						)));

}



function theme_customize_css(){
	   if(get_theme_mod('layout_control')==1){
	   	   ?>
	       <!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/custom.css" media="screen"> -->
	         <style type="text/css">
	            h1 { color: <?php echo get_theme_mod('link_color', '#000000'); ?>};
	            <?php echo get_template_part('css/responsive');?>
	         </style>
	    <?php
	   }

}
add_action( 'wp_head', 'theme_customize_css');


function theme_customize_banner(){
	  switch(get_theme_mod('image_control')) {
					case 1:themex_posts51();
						break;
					case 2:themex_posts52();
				   	break;
					case 3:themex_posts53();
					  break;
					case 4:themex_posts54();
				   	break;
					default:themex_posts55();
						break;
		 }
}


function theme_customize_single(){
		switch(get_theme_mod('single_control')) {
				case 1: include locate_template('inc/single/single-preset-02.php');
					break;
				case 2: include locate_template('inc/single/single-preset-03.php');
					break;
				default: include locate_template('inc/single/single-preset-01.php');
					break;
			}
}



function theme_customize_header(){
		switch(get_theme_mod('header_control')) {
				case 1: include locate_template('inc/header/header-preset-02.php');
					break;
				case 2: include locate_template('inc/header/header-preset-03.php');
					break;
				case 3: include locate_template('inc/header/header-preset-04.php');
					break;
			    case 4: include locate_template('inc/header/header-preset-06.php');
					break;		
				default: include locate_template('inc/header/header-preset-01.php');
					break;
			}
}

function theme_customize_index(){
		switch(false) {
				case 1: include locate_template('inc/index/preset-02.php');
					break;
				default: include locate_template('inc/index/preset-01.php');
					break;
			}
}


function theme_customize_shop(){
		switch(false) {
				  default: include locate_template('inc/header/header-preset-05.php');
				  break;
			}
}
