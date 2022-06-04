<?php

    add_action('customize_register', 'customize_register_shop');
	function customize_register_shop($wp_customize) {

	$wp_customize->add_section('shop', array(
		'title' => esc_attr__('Shop', 'theme'),
		'priority' => 31
	));


   /*********************************Banner Slides ***********************************/
	$banners = array(
		'banner_01',
		'banner_02',
		'banner_03',
		'banner_04'
	);

    $banners_names = array(
		'Banner 01',
		'Banner 04',
		'Banner 03',
		'Banner 04'
    );

    foreach($banners as $k=>$v) {
    	//if($v == 'rss') continue; 
    	$setting_name = 'banners_' . $v;
    	$wp_customize->add_setting($setting_name, array(
    		'sanitize_callback' => ''
    	));
		$wp_customize->add_control($setting_name, array(
			'label' => $banners_names[$k],
			'section' => 'shop',
			'settings' => $setting_name,
			'priority' => 2
		));	
    }




	/*********************************Advert ***********************************/
	$ads = array(
		'ads_01',
		'ads_02'
	);

    $ads_names = array(
		'Ads 01',
		'Ads 02'
    );

    foreach($ads as $k=>$v) {
    	//if($v == 'rss') continue; 
    	$setting_name = 'ads_' . $v;
    	$wp_customize->add_setting($setting_name, array(
    		'sanitize_callback' => ''
    	));
		$wp_customize->add_control($setting_name, array(
			'label' => $ads_names[$k],
			'section' => 'shop',
			'settings' => $setting_name,
			'priority' => 3
		));	
    }



	
	/*********************************Call to action url ***********************************/
	$call_to_actions = array(
		'call_to_action_01',
		'call_to_action_02',
		'call_to_action_03',
		'call_to_action_04'
	);

    $call_to_action_names = array(
		'Call to action 01',
		'Call to action 02',
		'Call to action 03',
		'Call to action 04',
    );

    foreach($call_to_actions as $k=>$v) {
    	//if($v == 'rss') continue; 
    	$setting_name = 'call_to_actions_' . $v;
    	$wp_customize->add_setting($setting_name, array(
    		'sanitize_callback' => ''
    	));
		$wp_customize->add_control($setting_name, array(
			'label' => $call_to_action_names[$k],
			'section' => 'shop',
			'settings' => $setting_name,
			'priority' => 4
		));	
    }


	

    
 }




function theme_banner_url() {

	$banners = array('banner_01','banner_02','banner_03','banner_04');
    $banners_names = array('Banner 01','Banner 04','Banner 03','Banner 04' );
	$banner_links = array();
	foreach ($banners as $k=>$v) {
			$url = get_theme_mod('banners_' . $v);
			if($url) {
				$link = new stdClass;
				$link->name = $banners_names [$k];
				$link->url = $url;
				$link->class = $v;
				$banner_links[] = $link;
			}
	}
	return $banner_links; 
}



function theme_ads_url() {

	$ads = array('ads_01','ads_02');
    $ads_names = array('Ads 01','Ads 02' );
	$banner_links = array();
	foreach ($ads as $k=>$v) {
		$url = get_theme_mod('ads_' . $v);
		if($url) {
			$link = new stdClass;
			$link->name = $ads_names[$k];
			$link->url = $url;
			$link->class = $v;
			$banner_links[] = $link;
		}
	}
	return $banner_links; 
}


function theme_action_url() {
	$call_to_actions = array('call_to_action_01','call_to_action_02','call_to_action_03','call_to_action_04');
    $call_to_action_names = array('Call to action 01','Call to action 02','Call to action 03','Call to action 04');
	$banner_links = array();
	foreach ($call_to_actions as $k=>$v) {
		$url = get_theme_mod('call_to_actions_' . $v);
		if($url) {
			$link = new stdClass;
			$link->name = $call_to_action_names[$k];
			$link->url = $url;
			$link->class = $v;
			$banner_links[] = $link;
		}
	}
	return $banner_links; 
}
