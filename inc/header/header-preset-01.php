<div class="header-top">
<div class="container">
   <div class="row">
      <div class="col-lg-12  col-xs-12 ">

            <div class="tagline">
                <?php echo date('l, F d, Y')?>
            </div>

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


<nav>
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
                          'depth' => 2 )); ?>

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
