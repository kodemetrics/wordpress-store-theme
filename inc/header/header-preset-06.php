<div class="elementor-widget-container">
	<h2>SHOP MARKETING &amp; SALES SUPPORT PRODUCTS</h2>
</div>
<div class="sassy-header-top-wrapper">
<div class="container">
   <div class="row">
      <div class="col-lg-12  col-xs-12 ">

         <div class="sassy-header-top">
           <ul class="elementor-icon-list-items elementor-inline-items">
							<li>
                                <span><i aria-hidden="true" class="fa fa-phone"></i></span>
								<span class="elementor-icon-list-text">08141140043</span>
							</li>
                            <li>
                                <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                <span class="elementor-icon-list-text">info@triciabiz.com</span>
                            </li>
                           <li>
                                <span><i aria-hidden="true" class="fa fa-clock-o"></i></span>
                                <span class="elementor-icon-list-text">Mon - Fri: 9:00 - 5:00</span>
                           </li>
						</ul>

           <ul>
                <?php $social_links = theme_social_links();
                 foreach($social_links as $link) : ?>
                    <li>
                       <a href="<?php echo esc_attr($link->url);?>"><i class="fa fa-<?php echo esc_attr($link->class); ?>"></i></a>
                    </li>
                 <?php endforeach; ?>
           </ul>
                 </div>

         </div>
     </div>
 </div>
</div>


<div class="sassy-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <div class="sassy-menu-wrapper">
                    <div class="sassy-logo">
                      <?php if(!has_custom_logo()){  bloginfo('name');  }else{the_custom_logo();} ?>
                    </div>

                    <div class="sassy-menu">
                            <?php
                            wp_nav_menu(
                                array(
                                        'theme_location' => 'primary',
                                        'container' => '',
                                        'menu_class' => 'menu',
                                        'fallback_cb' => '',
                                        'echo' => true,
                                        'walker' => new theme_walker(),
                                        'depth' => 1
                                        )
                                );
                                ?>
                        </div>

                    <?php echo theme_cart_count(); ?>
            </div>


						<div class="sassy-mobile-wrapper">
							<?php if(!has_custom_logo()){	bloginfo('name');	}else{the_custom_logo();	} ?>
							<span><i class="fa fa-bars"></i></span>
		          <?php echo theme_cart_count(); ?>
						</div>

         </div>
        </div>
    </div>
</div>


<div class="sassy-mobile-menu">
				<?php
				wp_nav_menu(
					       array('theme_location' => 'primary','container' => '',	'menu_class' =>
								       'menu','fallback_cb' => '','echo' => true,'walker' => new theme_walker(),
										   'depth' => 1
										)
						);
						?>
</div>
