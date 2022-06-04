<?php

  add_filter("the_content", "the_content_filter");
	add_filter('widget_text','do_shortcode');

	function the_content_filter($content) {

	// array of custom shortcodes requiring the fix
	$block = join("|",array("h1","h2","h3","post1","post2","post3","post4","post5","post56","post577","image",
                          "team","ts_row","testimonial","item","clients","accordion","portfolio","slider",
                          "faq","blockquote","call_to_action","post7","customOrder"));
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

	return $rep;

	}


add_shortcode('post577', 'themex_posts577');
function themex_posts577($atts, $content = null) {
  extract(shortcode_atts(array(
        'number_of_columns' => '4',
	    'number_of_posts' => '3',
        'excerpt_words' => '40',
        'strip_html' => 'yes',
        'title' => '',
        'category_name' => ''
		 ), $atts));


$args = array('posts_per_page' => $number_of_posts,
              'orderby' => 'post_date',
              'order' => 'DESC',
              'post_type' => 'post',
              'post_status' => 'publish','suppress_filters' => false);

$the_query = new WP_Query( $args );
$out.='<div class="container"> ';
$out.='<div class="row">';
$out.='<div class="col-md-12"><div class="box-icon"><h5>Lifestyle</h5></div></div>';

$args1 = array("post_type" => "post","post_status" => "publish","offset" =>1, "posts_per_page" =>"9");
$the_query1 = new WP_Query( $args1 );
while ($the_query1->have_posts()) : $the_query1->the_post();
   ob_start();
       $out.='  <div class="col-lg-4 col-md-6 col-sm-12 ">';
    	 $out.='	<div class="card-small">';
    	 $out.='		<img src="'.wp_get_attachment_url(get_post_thumbnail_id()).'"/>';
    	 $out.='		<div class="card-small-wrapper col">';
    	 $out.='			<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
    	 $out.='			<span><i class="fa fa-clock-o"></i>'.esc_html(get_the_date()).'</span>';
    	 $out.='		</div>';
    	 $out.=' </div>';
       $out.=' </div>';
   ob_end_clean();

endwhile;


$out.='</div>';
$out.=' </div>';

return  $out;
}

add_shortcode('post56', 'themex_posts56');
function themex_posts56() {

   $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"5");
   $the_query = new WP_Query( $args );
   $out.='<div class="col-md-12"><div class="box-icon"><h5>Technology</h5></div></div>';

    while ($the_query->have_posts()) : $the_query->the_post();
    ob_start();
    $out.='<div class="col-md-12 card-medium">';
    $out.='<div class="row">';
    $out.='<div class="col-md-6 card-medium-image"><img src="'.wp_get_attachment_url(get_post_thumbnail_id()).'"/>';
    $categories = get_the_category();
		if ( ! empty( $categories ) ) {
		  $out.='<a href="'.esc_url(get_category_link($categories[0]->term_id)).'">'.esc_html($categories[0]->name).'</a>';
		}
    $out.='</div>';
    $out.='<div class="col-md-6 card-medium-content"><h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>
             <div class="card-meduim-meta">
	            <span>by <a href="'. esc_url(get_author_posts_url(get_the_author_meta('ID'))).'">'.get_the_author().'</a></span>
	            <span><i class="fa fa-clock-o"></i> Posted on '.get_the_date().'</span>
             </div>
           <p>'.get_the_excerpt().'</p><a class="url" href="'.get_permalink().'">Read more</a></div>';
        $out.='</div></div>';
   ob_end_clean();

  endwhile;
  $out.='</div></div>';
	return  $out;
}


add_shortcode('post1', 'themex_posts1');
function themex_posts1() {

     $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"3");
     $the_query = new WP_Query( $args );

     $args2 = array("post_type" => "post","post_status" => "publish","offset" =>1, "posts_per_page" =>"1");
     $the_query2 = new WP_Query( $args2 );

     $out ='<div class="container"> ';
     $out.='<div class="row">';
     $out.='<div class="col-md-12"><div class="box-icon"><h5>Politics</h5></div></div>';

     $out.='<div class="col-lg-8 col-md-12">';
     $out.='<ul>';
     while ($the_query->have_posts()) : $the_query->the_post();
		   ob_start();
        get_template_part('inc/template-part/m_11');
		   $out.=ob_get_contents();
		   ob_end_clean();
	   endwhile;
     $out.='</ul>';
     $out.='</div>';

	  while ($the_query2->have_posts()) : $the_query2->the_post();
		   ob_start();
		   get_template_part('inc/template-part/c1');
		   $out.=ob_get_contents();
		   ob_end_clean();

	  endwhile;
    $out .='</div></div>';
	return $out;
}

add_shortcode('post2', 'themex_posts2');
function themex_posts2() {

     $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"2");
     $the_query = new WP_Query( $args );

     $args2 = array("post_type" => "post","post_status" => "publish","offset" =>1, "posts_per_page" =>"5");
     $the_query2 = new WP_Query( $args2 );

     $out ='<div class="container"> ';
     $out.='<div class="row">';
     $out.='<div class="col-md-12"><div class="box-icon"><h5>Human</h5></div></div>';

     while ($the_query->have_posts()) : $the_query->the_post();
		   ob_start();
		    //get_template_part('inc/recent-post3');
        get_template_part('inc/template-part/c1');
		   $out.=ob_get_contents();
		   ob_end_clean();

	  endwhile;

    $out.='<div class="col-lg-4 col-md-12"><ul>';
	  while ($the_query2->have_posts()) : $the_query2->the_post();
		   ob_start();
		    //get_template_part('inc/recent-post2');
        //get_template_part('inc/template-part/c1');
         get_template_part('inc/template-part/m_12');
		   $out.=ob_get_contents();
		   ob_end_clean();

	  endwhile;
       $out.='</ul></div></div></div>';
	return $out;
}


add_shortcode('post3', 'themex_posts3');
function themex_posts3() {

     $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"3");
     $the_query = new WP_Query( $args );

     $args2 = array("post_type" => "post","post_status" => "publish","offset" =>1, "posts_per_page" =>"9");
     $the_query2 = new WP_Query( $args2 );

     $out.='<div class="container"> ';
	   $out.='<div class="row">';
     $out.='<div class="col-md-12"><div class="box-icon"><h5>Business & Finance</h5></div></div>';

     while ($the_query->have_posts()) : $the_query->the_post();
		   ob_start();
		   get_template_part('inc/template-part/c1');
		   $out.=ob_get_contents();
		   ob_end_clean();

	  endwhile;

	  while ($the_query2->have_posts()) : $the_query2->the_post();
		   ob_start();
		   get_template_part('inc/recent-post2');
		   $out.=ob_get_contents();
		   ob_end_clean();

	  endwhile;

       $out.='</div></div>';
	return $out;
}


add_shortcode('post4', 'themex_posts4');
function themex_posts4() {

   $args2 = array("post_type" => "post","post_status" => "publish","offset" =>2, "posts_per_page" =>"4");
   $the_query2 = new WP_Query( $args2 );

   $out.='<div class="container"> ';
	 $out.='<div class="row">';
	 $out.='<div class="col-md-12"><div class="box-icon"><h5>Technology</h5></div></div>';

	  while ($the_query2->have_posts()) : $the_query2->the_post();

      ob_start();
		   get_template_part('inc/template-part/c2');
		   $out.=ob_get_contents();
		  ob_end_clean();
	  endwhile;
         $out.='</div></div>';
	return $out;
}

add_shortcode('post5', 'themex_posts5');
function themex_posts5() {

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

        $out.='<div class="col-sm-6 mustmg_grid_small">';
        $out.='<div class="row">';
        while ($the_query1->have_posts()) : $the_query1->the_post();
		   ob_start();
		   get_template_part('inc/template-part/c6');
		   $out.=ob_get_contents();
		   ob_end_clean();

	    endwhile;
	    $out.='</div></div>';


      $out.='</div></div>';
	return $out;
}

add_shortcode('post6', 'themex_posts6');
function themex_posts6() {

     $args2 = array("post_type" => "post","post_status" => "publish","offset" =>2, "posts_per_page" =>"6");
     $the_query2 = new WP_Query( $args2 );

     $out.='<div class="container"> ';
	 $out.='<div class="row">';
	 $out.='<div class="col-md-12"><div class="box-icon"><h5>Technology 2</h5></div></div>';

	  while ($the_query2->have_posts()) : $the_query2->the_post();

           ob_start();
		   get_template_part('inc/template-part/c3');
		   $out.=ob_get_contents();
		   ob_end_clean();
	  endwhile;

      $out.='</div></div>';
	return $out;
}

 add_shortcode('post5', 'themex_posts5');
/*
// + <ul></ul>
function themex_posts5() {

     $out.='<div class="container"> ';
	 $out.='<div class="row">';
	 $out.='<div class="col-md-12"><div class="box-icon"><h5>Politics</h5></div></div>';

	   $args = array("post_type" => "post","post_status" => "publish","offset" =>2, "posts_per_page" =>"1");
       $the_query = new WP_Query( $args );


        while ($the_query->have_posts()) : $the_query->the_post();
		   ob_start();
		   get_template_part('c1');
		   $out.=ob_get_contents();
		   ob_end_clean();

	    endwhile;


	   $args1 = array("post_type" => "post","post_status" => "publish","offset" =>2, "posts_per_page" =>"4");
       $the_query1 = new WP_Query( $args1 );

        $out.='<div class="col-lg-4">';
        $out.='<div class="row">';
        while ($the_query1->have_posts()) : $the_query1->the_post();
		   ob_start();
		   get_template_part('c4');
		   $out.=ob_get_contents();
		   ob_end_clean();

	    endwhile;
	    $out.='</div></div>';

      $args2 = array("post_type" => "post","post_status" => "publish","offset" =>2, "posts_per_page" =>"10");
      $the_query2 = new WP_Query( $args2 );
      $out.='<div class="col-lg-4 col-md-12 listing">';
      $out.='<ul class="l-text lh-main c-main">';
	  while ($the_query2->have_posts()) : $the_query2->the_post();

           ob_start();
		   $out.='<li><a href="'.get_permalink().'"  title="'.get_the_title().'">'.get_the_title().'</a></li>';
		   ob_end_clean();
	  endwhile;
      $out.='</ul></div>';

      $out.='</div></div>';
	return $out;
}*/


//add_shortcode('block1', 'themex_posts30');

add_shortcode('customOrder', 'themex_customOrder');
function themex_customOrder() {
       #http://localhost/blog/wp-json/myplugin/v1/author/
	   $out.='
		    <div class="row">
		    <div class="col-md-5">
			<form  method="post">
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" id="ordername" name="name" class="form-control tm"/>
				</div>

				<div class="form-group">
					<label for="">Product</label>
					<input type="text" id="orderproduct" name="product" class="form-control tm"/>
			    </div>
				<div class="form-group">
					<label for="">Quantity</label>
					<input type="number" id="orderqty" name="quanity" class="form-control tm"/>
			    </div>
				<div class="form-group">
					<label for="">Phone Number</label>
					<input type="text" id="orderphoneno" name="phoneno" class="form-control tm"/>
			   </div>
			   <div class="form-group">
					<label for="">Email</label>
					<input type="email" id="orderemail" name="email" class="form-control tm"/>
			  </div>

			  <div class="form-group">
					<label for="">Comment</label>
					<textarea row="3" col="10" id="orderdesc" name="description" class="form-control tm"></textarea>
			  </div>

			  <div class="form-group">
				   <input type="submit" id="bulk-email" class="btn btn-primary btn-lg"/>
		    </div>

			</form>
			</div>
			</div>';
	return $out;
}


// add_action( 'rest_api_init', function () {
// 	register_rest_route( 'myplugin/v1', '/author/', array(
// 		'methods' => 'POST',
// 		'callback' => 'my_awesome_func',
// 	));
// });
//
// function my_awesome_func($request) {
//   $userdata = array(
//     'name'=> $request['name'],
//     'email'=> $request['email'],
//     'product'=> $request['product'],
//     'quanity'=> $request['quanity'],
//     'phoneno'=> $request['phoneno'],
//     'description'=> $request['description'],
//   );
//   $userdata['status'] = 200;
//
//   //$to = get_option('admin_email');
//   $to = "okaforwilson2@gmail.com";
//   $subject = 'Bulk Order Request';
//   $from = "zaaniestores@zaanie.com";
//   $message.='<div style="background-color:#F7f7f7;padding: 70px 0;width: 100%;margin: 0;font-family: "Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;">';
// 	$message.='<div class="wrapper" style="width:70%;margin: 0px auto;">';
// 	$message.='<div style="padding:36px 48px;background-color: #96588a;border-radius:2px 2px 0px 0px;">';
// 	$message.='<h1 style="color: #FFF;">Bulk Order Request</h1>';
// 	$message.='</div>';
// 	$message.='<div style="padding:36px 48px;background-color: #FFF;border: 1px solid #f0f0f0;">';
// 	$message.='<p>Hi okaforwilson2,</p>';
// 	$message.='<p>Someone has requested a new password for the following account on Brixblog: </p>';
//   $message.='<p>"'.$request['name'].'"</p>';
//   $message.='<p>"'.$request['phoneno'].'" </p>';
//   $message.='<p>"'.$request['email'].'"</p>';
//   $message.='<p>"'.$request['product'].'" </p>';
//   $message.='<p>"'.$request['quanity'].'"</p>';
//   $message.='<p>"'.$request['description'].'" </p>';
// 	$message.='</div></div></div>';
//   // $headers[] = 'Content-Type: text/html; charset=UTF-8';
//   // $headers[] = 'From: Wishio Team ' . "\r\n";
//   //$headers = array('Content-Type: text/html; charset=UTF-8','From: "'.$request['name'].'" &lt;"'.$request['email'].'"');
//   //if(wp_mail( $to, $subject, $message, $headers)){
//
//   if(wp_mail($to, $subject,$message)){
//      return $userdata;
//   }else{
//     $msg = array('status'=> 500,'message'=>"Failed");
//     return $msg;
//   }
// }

// add_action( 'phpmailer_init', 'mailer_config', 10, 1);
// function mailer_config(PHPMailer $mailer){
//   $mailer->IsSMTP();
//   $mailer->Host = "mail.telemar.it"; // your SMTP server
//   $mailer->Port = 25;
//   $mailer->SMTPDebug = 2; // write 0 if you don't want to see client/server communication in page
//   $mailer->CharSet  = "utf-8";
// }

// add_action('rest_api_init', function () {
// 		register_rest_route( 'myplugin/v1', '/author/(?P<id>\d+)', array(
// 			'methods' => 'GET',
// 			'callback' => 'my_awesome_func',
// 		));
// });
//
// function my_awesome_func( $data ) {
// 	  $posts = get_posts( array( 'author' => $data['id']) );
//   	if ( empty($posts) ) {
//       return new WP_Error( 'no_author', 'Invalid author', array( 'status' => 404 ) );
//   	}
// 	  return $posts[0]->post_title;
// }


function themex_posts30() {

	$out.='<form action="/your-server-side-code" method="POST">
			 <input type="text" name="amount" id="amount" value="999">
		   <script
			 src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			 data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
			 data-amount= document.write(document.getElementById("amount").value);
			 data-name="Stripe.com"
			 data-description="Widget"
			 data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
			 data-locale="auto"
			 data-zip-code="true">
		   </script>
		 </form>';
 return $out;
}



function get_silder() {

 ?>
		<!--Main Slider-->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">

			<!-- InmyCarouseldicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
			</ol>
			<div class="carousel-inner" role="listbox">

				<?php
				     $args = array("post_type" => "post","post_status" => "publish", "posts_per_page" =>"2");
				     $the_query = new WP_Query( $args );

					 while ($the_query->have_posts()) : $the_query->the_post();

					   ob_start();
					   get_template_part('content', 'slide');
					   $out.=ob_get_contents();
					   ob_end_clean();

					  endwhile;
					  echo $out;
			     ?>

			</div>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<?php

}

function main_silde() {

 ?>
		<!--Main Slider-->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">

			<!-- InmyCarouseldicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
			</ol>
			<div class="carousel-inner" role="listbox">

				<?php
				     $args = array("post_type" => "slides","post_status" => "publish", "posts_per_page" =>"2");
				     $the_query = new WP_Query( $args );

					 while ($the_query->have_posts()) : $the_query->the_post();

					   ob_start();
					   get_template_part('content', 'slide');
					   $out.=ob_get_contents();
					   ob_end_clean();

					  endwhile;
					  echo $out;
			     ?>

			</div>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<?php

}





?>
