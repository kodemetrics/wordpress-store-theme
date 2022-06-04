<?php

	add_filter("the_content", "the_content_filter");
	add_filter('widget_text','do_shortcode');

	function the_content_filter($content) {

	// array of custom shortcodes requiring the fix
	$block = join("|",array("h1","h2","h3","testimonial_row","team_member","post","service-row","services","causes","about","image","team","ts_row","testimonial","item","clients","accordion","portfolio","slider","faq","blockquote","call_to_action"));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

	return $rep;

	}


add_shortcode('ts_row', 'm_ts_row');
add_action('vc_before_init','row_addon_callback');

function row_addon_callback(){
	vc_map( array(
		'name' => __('SL-Theme','my-text-domain'),
		'base' =>  "ts_row",
		'class' => "" ,
		'category' => __("ShowLove","my-text-domain"),
		'icon' =>"", //get_template_directory_uri().'/images/favicon.ico',
		'params' => array(
           array(
						  'type' => "textfield",
							'heading' => __('Widget Title','my-text-domain'),
							'param_name' => "title" ,
					  ),

					array(
						 'type' => "dropdown",
						 'heading' => __('Widget Category','my-text-domain'),
						 'param_name' => "class" ,
						 'admin_label' => true ,
						 'std' => "two",
						 'value' => txCategory()
						 //'value' => ['one','two','three']
						 // 'value' => array('one' => 'First Option','two' => 'Second Option','three' => 'Third Option'),
						 // 'description' => __('The description')
					 ),

					array(
						 'type' => "colorpicker",
						 'heading' => __('Widget Color','my-text-domain'),
						 'param_name' => "color" ,
					 ),

					 array(
 	 						 'type' => "posttypes",
 	 						 'heading' => __('Widget Post type','my-text-domain'),
 	 						 'param_name' => "color2" ,
 	 						 'admin_label' => true ,
 	 					 ),

					 array(
						  'type' => "textfield",
							'heading' => __('Widget Limit','my-text-domain'),
							'param_name' => "limit" ,
					  ),

						// array(
						// 		 'type' => "checkbox",
						// 		 'heading' => __('Widget Checkbox','my-text-domain'),
						// 		 'param_name' => "color2" ,
						// 		 'admin_label' => true ,
						// 		 'value' => array(
						// 			 'one' => 'First Option',
						// 			 'two' => 'Second Option',
						// 			 'three' => 'Third Option'
						// 		 ),
						// 		 'std' => "two" ,
						// 	 ),

				 array(
						'type' => "textarea",
						'heading' => __('Widget Textarea','my-text-domain'),
						'param_name' => "color3" ,
					),

		 )
	));
}

 function txCategory(){
	  $terms = get_terms(['taxonomy' =>'category','hide_empty' => false,]);
		$arrayName = [];
		foreach ($terms as $key => $value) {
							array_push($arrayName,$value->name );	//  $value->name // $value->count
		}
		return $arrayName;
}

function m_ts_row($atts, $content = null) {
	extract( shortcode_atts( array(
			"id" => '',
			"class" => '',
			"title" => '',
			),$atts));

$code = '
	<div id="'.$id.'" class="'.$class.'">
		<div class="container">
			<div class="row">
		        <div class="section-title col-md-12">
                  <h2>'.$title.'</h2>
               </div>
			   '.do_shortcode($content).'
			</div>
		</div>
	</div>
';
return $code;
}




add_shortcode('causes', 'm_causes');
function m_causes($atts, $content = null) {
	extract( shortcode_atts( array(
		  "id" => '',
		  "image" => '',
			"title" => '',
			"content" => '',
			"progress" => '',
			"amount" => '',
			"link" => '',
			),$atts));

$code = '
		 <div class="col-md-4 col-sm-6 col-xs-12">
		    <div class="single-portfolio">
		        <img src="'.$image.'" alt="portfolio-img" />
		        <div class="single-portfolio-content">
		            <h3>'.$title.'</h3>
		            <p>'.$content.'</p>
		            <div class="progress">
		              <div class="progress-bar progress-bar-striped" style="width:'.$progress.'%"><span>'.$progress.'%</span></div>
		            </div>
		            <span class="amount">Goal '.$amount.'</span>
		            <a target="_blank" class="blog-link" href="'.$link.'">Donate</a>
		        </div>
		    </div>
		</div>
';
return $code;
}



add_shortcode('about', 'm_about');
function m_about($atts, $content = null) {
	extract( shortcode_atts( array(
	        "id" => '',
			"title" => '',
			"content" => '',
			"image" => '',
			"link" => '',
			),$atts));

		$code = '
		<div id="about-us" class="about-section">
    <div class="container">
		<div class="row">
		          <div class="col-md-6 col-xs-12 about-content ">
                    <h3>'.$title.'</h3>
                    <p>'.$content.'</p>
                    <a class="thm-btn about-btn" href="#">Donate</a>
              </div>

              <!--About Image-->
             <div class="about-image col-md-6 col-xs-12" style="background-image: url('.$image.')"></div>
      </div>
      </div>
      </div>
';
return $code;
}


add_shortcode('services', 'm_services');
function m_services($atts, $content = null) {
	extract( shortcode_atts( array(
	        "id" => '',
			"title" => '',
			"content" => '',
			"image" => '',
			"icon" => '',
			),$atts));

		$code = '
		            <div class="col-lg-4 col-md-3 col-sm-6 col-sm-12">
                        <div class="single-service">
                             <i class="'.$icon.'"></i>
                             <h3>'.$title.'</h3>
                             <p>'.$content.'</p>
                         </div>
                    </div>

';
return $code;
}

add_shortcode('team', 'm_team');
function m_team($atts, $content = null) {
	extract( shortcode_atts( array(
			"heading" => '',
			"message" => '',
			"btn" => '',
			"link" => '',
			),$atts));

		$code = '
	      <div id="team" class=" macro-ws">
	         <div class="container">
	           <div class="row">
		          <div class="team">
                      <div class="col-md-4 section-title">
                          <h2>'.$heading.'</h2>
                          <p>'.$message.'</p>
                          <a class="thm-btn" href="#">'.$btn.'</a>
                      </div>
                            '.do_shortcode($content).'
                   </div>
                </div>
              </div>
          </div>
';
return $code;
}

add_shortcode('team_member', 'm_team_member');
function m_team_member($atts, $content = null) {
	extract( shortcode_atts( array(
			"name" => '',
			"message" => '',
			"image" => '',
			"position" => '',
			),$atts));

		$code = '
                      <div class="col-md-4 col-sm-6">
                          <div class="item">
                                <div class="single-team2">
                                   <div class="team-image">
                                        <img  src="'.$image.'"  alt="team"/>
                                        <div class="content">
                                           <h3>'.$name.'</h3>
                                           <p>'.$message.'</p>
                                           <span>'.$position.'</span>
                                       </div>
                                   </div>
                               </div>
                          </div>
                      </div>
';
return $code;
}



add_shortcode('portfolio', 'm_portfolio');
function m_portfolio($atts, $content = null) {
	extract( shortcode_atts( array(
	    "id" => '',
			"title" => '',
			"content" => '',
			"image" => '',
			"icon" => '',
			),$atts));

		$code = '
		      <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-project">
                        <div class="single-project-img"><img src="'.$image.'" alt="portfolio-img" /></div>
                        <div class="single-project-content">
                            <h3>'.$title.'</h3>
														<p>'.$content.'</p>
                        </div>
                    </div>
                </div>
';
return $code;
}

add_shortcode('call_to_action', 'm_call_to_action');
function m_call_to_action($atts, $content = null) {
	extract( shortcode_atts( array(
			"title" => '',
			"url" => '',
			"btn" => '',
			),$atts));

		$code = '
			<!--Call to action Area-->
		    <div class="call-to-action-area" style="padding:30px 0px;">
		       <div class="container">
		            <div class="row">
		               <div class="col-md-8 col-sm-12 col-xs-12">
		                    <div class="callto-action-text">
		                      <h3>'.$title.'</h3>
		                    </div>
		               </div>
		               <div class="col-md-4 col-sm-12 col-xs-12">
		                    <div class="callto-action-text">
		                      <a href="'.$url.'" class="call-btn">'.$btn.'</a>
		                    </div>
		               </div>
		            </div>
		       </div>
		    </div>
';
return $code;
}


add_shortcode('faq2', 'm_faq2');
function m_faq2($atts, $content = null) {
	extract( shortcode_atts( array(
			"title" => '',
			"message" => '',
			"image" => '',
			"url" => '',
			"btn" => '',
			),$atts));

		$code = '
			<div class="faq-section" style="background-image: url('.$image.');">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <div class="content">
                            <h2>'.$title.'</h2>
                            <p>'.$message.'</p>
                            <div class="link">
                                <a class="thm-btn" href="'.$url.'">'.$btn.'</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">'.do_shortcode($content).'</div>
                </div>
            </div>
        </div>
';
return $code;
}

add_shortcode('faq', 'm_faq');
function m_faq($atts, $content = null) {
	extract( shortcode_atts( array(
		  "title" => '',
			"image" => '',
			),$atts));

		$code = '
			<div id="faq" class="faq-section2 macro-ws">
            <div class="container">
                <div class="row clearfix">
								 <div class="col-md-12 section-title">
								    <h2>'.$title.'</h2>
								 </div>
								    <div class="col-md-6">
								     	   '.do_shortcode($content).'
									  </div>
                    <div class="col-md-6">
										    <div class="faq-section-img" style="background-image: url('.$image.')">

												</div>
                    </div>
                </div>
            </div>
        </div>
';
return $code;
}



add_shortcode('accordion', 'm_accordion');
function m_accordion($atts, $content = null) {
	extract( shortcode_atts( array(
			"title" => '',
			"message" => '',
			),$atts));

		$code = '
        <button class="accordion">'.$title.'</button>
        <div class="panel">
             <p>'.$message.'</p>
        </div>
';
return $code;
}


add_shortcode('testimonial_row', 'm_testimonial_row');
function m_testimonial_row($atts, $content = null) {
	extract( shortcode_atts( array(
	"title" => '',
	),$atts));

		$code = '
        <div id="testimonials" class="macro-ws">
        <div class="container">
            <div class="row">
						    <div class="section-title text-center">
								   <h2>'.$title.'</h2>
								</div>
                <div class="testimonials owl-carousel">
                    '.do_shortcode($content).'
                </div>
            </div>
        </div>
       </div>

';
 return $code;
}

add_shortcode('testimonial', 'm_testimonial');
function m_testimonial($atts, $content = null) {
		extract( shortcode_atts( array(
			"text" => 'Testimonials',
			"image" => '',
			"author" => '',
			),$atts));

	$code = '
         <div class="col-md-12">
            <div class="item">
                 <p>'.$text.'</p>
                 <div class="t-image">
                   <img src="'.$image.'" alt="'.$author.'">
                 </div>
                 <span>'.$author.'</span>
           </div>
        </div>
';
 return $code;
}


add_shortcode('clients', 'm_clients');
function m_clients($atts, $content = null) {
	extract( shortcode_atts( array(),$atts));

		$code = '
        <div id="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="client owl-carousel">'.do_shortcode($content).'</div>
                </div>
            </div>
        </div>
       </div>

';
return $code;
}


add_shortcode('image', 'm_item');
function m_item($atts, $content = null) {
	extract( shortcode_atts( array(
		  "name" => 'name',
			"url" => '',
			),$atts));
					$code ='<div class="item"><img src="'.$url.'" alt="'.$name.'"/></div>';
 return $code;
}


add_shortcode('post', 'themex_posts');
function themex_posts($atts, $content = null) {
	   extract( shortcode_atts( array(
			"heading" => '',
			"content" => '',
			),$atts));

     $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"2");
     $the_query = new WP_Query( $args );
		 $out ='';
		 $out.='<section id="news-events" class="news-events macro-ws">
		        <div class="section-title text-center"><h2>'.$heading.'</h2><p>'.$content.'</p></div>
		        <div class="container"><div class="row">';

			   while ($the_query->have_posts()) : $the_query->the_post();
				   ob_start();
				   get_template_part('content', 'post');
				   $out.=ob_get_contents();
				   ob_end_clean();
			  endwhile;
     $out.='</div></div></section>';
	   return $out;
}


add_shortcode('recent-post', 'recent_posts');
function recent_posts() {

     $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"2");
     $the_query = new WP_Query( $args );
		 $out ='';
     $out.='<ul class="recent-posts"> ';
	   while ($the_query->have_posts()) : $the_query->the_post();

	   ob_start();
	   get_template_part('template-parts/recent-post');
	   $out.=ob_get_contents();
	   ob_end_clean();

	  endwhile;
	  $out.='</ul> ';
	 return $out;
}




	if ( ! function_exists( 'theme_paging_nav' ) ) :

	function theme_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>

		  <div class="nav-links clear">

				<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous left"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'show-love' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next right"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'show-love' ) ); ?></div>
				<?php endif; ?>

			 </div><!-- nav-links -->

		<?php
	}

endif;


?>
