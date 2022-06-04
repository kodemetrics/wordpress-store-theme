<?php

add_shortcode('recent-post', 'recent_posts');
add_filter('widget_text','do_shortcode');


function recent_posts() {
     $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"2");
     $the_query = new WP_Query( $args );
     $out.='<ul class="recent-posts"> ';
	   while ($the_query->have_posts()) : $the_query->the_post();
    	   ob_start();
    	   get_template_part('inc/recent-post');
    	   $out.=ob_get_contents();
    	   ob_end_clean();
  	  endwhile;
  	  $out.='</ul> ';
  	 return $out;
}

	if ( ! function_exists( 'retro_paging_nav' ) ) :

	function retro_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>

		  <div class="nav-links clear">

				<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous left"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'retro-portfolio-4' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next right"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'retro-portfolio-4' ) ); ?></div>
				<?php endif; ?>

			 </div><!-- nav-links -->

		<?php
	}

endif;


function themex_posts51() {
     $out.='<div class="container"> ';
	   $out.='<div class="row">';
	      $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"4");
        $the_query = new WP_Query( $args );
        while ($the_query->have_posts()) : $the_query->the_post();
      		   ob_start();
      		   get_template_part('inc/template-part/cs5');
      		   $out.=ob_get_contents();
      		   ob_end_clean();
    	   endwhile;
        $out.='</div></div>';
	echo  $out;
}


function themex_posts52() {
    $out.='<div class="container"> ';
	  $out.='<div class="row">';
	  $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"3");
    $the_query = new WP_Query( $args );
        while ($the_query->have_posts()) : $the_query->the_post();
    		   ob_start();
    		   get_template_part('inc/template-part/cs6');
    		   $out.=ob_get_contents();
		       ob_end_clean();
	      endwhile;
       $out.='</div></div>';
	echo $out;
}


function themex_posts53() {
       $out.='<div class="container"> ';
	     $out.='<div class="row">';
	     $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"2");
       $the_query = new WP_Query( $args );
        while ($the_query->have_posts()) : $the_query->the_post();
    		   ob_start();
    		   get_template_part('inc/template-part/cs7');
    		   $out.=ob_get_contents();
    		   ob_end_clean();
	      endwhile;
        $out.='</div></div>';
	echo  $out;
}


function themex_posts54() {

     $out.='<div class="container"> ';
	   $out.='<div class="row">';

	     $args1 = array("post_type" => "post","post_status" => "publish","offset" =>1, "posts_per_page" =>"2");
       $the_query1 = new WP_Query( $args1 );

        $out.='<div class="col-sm-3 mustmg_grid_small">';
        $out.='<div class="row">';
        while ($the_query1->have_posts()) : $the_query1->the_post();
		   ob_start();
		   get_template_part('inc/template-part/cs8');
		   $out.=ob_get_contents();
		   ob_end_clean();

	    endwhile;
	    $out.='</div></div>';

	   $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"1");
       $the_query = new WP_Query( $args );


        while ($the_query->have_posts()) : $the_query->the_post();
		   ob_start();
		   get_template_part('inc/template-part/c5');
		   $out.=ob_get_contents();
		   ob_end_clean();

	    endwhile;


	   $args2 = array("post_type" => "post","post_status" => "publish","offset" =>3, "posts_per_page" =>"2");
       $the_query2 = new WP_Query( $args2 );

        $out.='<div class="col-sm-3 mustmg_grid_small">';
        $out.='<div class="row">';
        while ($the_query2->have_posts()) : $the_query2->the_post();
		   ob_start();
		   get_template_part('inc/template-part/cs8');
		   $out.=ob_get_contents();
		   ob_end_clean();

	    endwhile;
	    $out.='</div></div>';


      $out.='</div></div>';
	echo  $out;
}


function themex_posts55() {

     $out.='<div class="container"> ';
	   $out.='<div class="row">';
	   $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"1");
     $the_query = new WP_Query( $args );
       while ($the_query->have_posts()) : $the_query->the_post();
		   ob_start();
		   get_template_part('inc/template-part/c5');
		   $out.=ob_get_contents();
		   ob_end_clean();
	    endwhile;

      $args1 = array("post_type" => "post","post_status" => "publish","offset" =>1, "posts_per_page" =>"4");
      $the_query1 = new WP_Query( $args1 );
      $out.='<div class="col-lg-6 col-md-6 col-sm-6 mustmg_grid_small">';
      $out.='<div class="row">';
       while ($the_query1->have_posts()) : $the_query1->the_post();
		   ob_start();
		   get_template_part('inc/template-part/c6');
		   $out.=ob_get_contents();
		   ob_end_clean();
	    endwhile;
	    $out.='</div></div>';
      $out.='</div></div>';
	echo  $out;
}



?>
