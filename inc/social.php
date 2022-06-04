<?php

	function theme_customize_register($wp_customize) {

	$wp_customize->add_section('social', array(
		'title' => esc_attr__('Social Media Profiles', 'theme'),
		'priority' => 32
	));

	$socials = array(
		'facebook',
		'twitter',
		'youtube',
		'linkedin',
		'pinterest',
		'instagram'
	);

    $socials_names = array(
		'Facebook',
		'Twitter',
		'Youtube',
		'LinkedIn',
		'Pinterest',
		'instagram'
    );

    foreach($socials as $k=>$v) {
    	if($v == 'rss') continue; 
    	$setting_name = 'social_' . $v;
    	$wp_customize->add_setting($setting_name, array(
    		'sanitize_callback' => ''
    	));
		$wp_customize->add_control($setting_name, array(
			'label' => $socials_names[$k],
			'section' => 'social',
			'settings' => $setting_name,
			'priority' => 2
		));	
    }

    
 }

add_action('customize_register', 'theme_customize_register');


function theme_social_links() {

	$socials = array(
		'facebook',
		'twitter',
		'youtube',
		'linkedin',
		'pinterest',
		'instagram',
		'rss'
	);
    $socials_names = array(
		'Facebook',
		'Twitter',
		'Youtube',
		'LinkedIn',
		'Pinterest',
		'instagram',
		'RSS'
    );

	$social_links = array();
	foreach ($socials as $k=>$v) {
		if($v == 'rss' && !get_theme_mod('show_rss')){
			$link = new stdClass;
			$link->name = $socials_names[$k];
			$link->url = get_bloginfo('rss2_url');
			$link->class = $v;
			$social_links[] = $link;
		} else {
			$url = get_theme_mod('social_' . $v);
			if($url) {
				$link = new stdClass;
				$link->name = $socials_names[$k];
				$link->url = $url;
				$link->class = $v;
				$social_links[] = $link;
			}
		}
	}
	return $social_links; 
}
