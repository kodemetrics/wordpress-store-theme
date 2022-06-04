
<nav class="preset_01">
   <div class="container">
      <div class="row">
            <div class="col-lg-12  col-xs-12">
               <div class="logo">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php if(!has_custom_logo()){
                              bloginfo('name');
                            }else{
                              the_custom_logo();
                            } ?>
                  </a>
               </div>
               <div class="responsive"><i class="fa fa-navicon"></i></div>
                 <?php wp_nav_menu(

                  array(  'theme_location' => 'primary',
                          'container' => '',
                          'menu_class' => 'nav-menu',
                          'menu_id' => 'primary-menu',
                          'fallback_cb' => '',
                          'echo' => true,
                          /*'walker' => new theme_walker(),*/
                          'depth' => 2 ));

                          ?>

                <?php
                  // converio_cart_menu_item();converio_cart_shopping_bag();
                ?>

                <?php wp_nav_menu(
                  array(  'theme_location' => 'primary',
                          'container' => '',
                          'menu_class' => 'mobile-menu-wrapper',
                          'fallback_cb' => '',
                          'echo' => true,
                          /*'walker' => new theme_walker(),*/
                          'depth' => 2 )); ?>
             </div>
        </div>
    </div>
</nav>
