<div class="top-nav">
  <div class="container">
    <div class="row"><div class="col-lg-2"></div></div>
  </div>
</div>

<header class="nav-wrapper">
  <div class="container">
    <div class="row">
       <div class="col-lg-2">
          <div class="tm-logo">
                 <?php
                    if(!has_custom_logo()){bloginfo('name'); }else{the_custom_logo();}
                  ?>
<!--
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 162 45" enable-background="new 0 0 162 45" xml:space="preserve">
                        <g enable-background="new">
                          <path fill="#7C287D" d="M0.8,35.9l16.6-24.1v-0.1H2.3V6.8H25v3.5L8.7,34.1v0.2h16.6v4.9H0.8V35.9z"/>
                          <path fill="#7C287D" d="M36.8,30L34,39.1h-6.1L38.3,6.8h7.5l10.5,32.4H50L47.1,30H36.8z M46.1,25.5l-2.5-8c-0.6-2-1.2-4.2-1.6-6
                            h-0.1c-0.5,1.9-1,4.1-1.5,6l-2.5,8H46.1z"/>
                          <path fill="#7C287D" d="M67.4,30l-2.8,9.2h-6.1L68.8,6.8h7.5l10.5,32.4h-6.3L77.6,30H67.4z M76.6,25.5l-2.5-8c-0.6-2-1.2-4.2-1.6-6
                            h-0.1c-0.5,1.9-1,4.1-1.5,6l-2.5,8H76.6z"/>
                          <path fill="#7C287D" d="M91.4,39.1V6.8h6.7l8.4,13.9c2.2,3.6,4,7.3,5.5,10.8h0.1c-0.4-4.3-0.5-8.5-0.5-13.4V6.8h5.5v32.4h-6.1
                            l-8.4-14.2c-2.1-3.6-4.2-7.5-5.8-11.2l-0.1,0c0.2,4.2,0.3,8.4,0.3,13.8v11.6H91.4z"/>
                          <path fill="#7C287D" d="M129.8,6.8v32.4h-5.9V6.8H129.8z"/>
                          <path fill="#7C287D" d="M154.6,24.8h-12.2v9.5h13.6v4.8h-19.5V6.8h18.8v4.8h-12.9V20h12.2V24.8z"/>
                        </g>
                  </svg>
              </a>  -->
        </div>

       </div>
       <div class="col-lg-7">
             <!-- <form role="search" method="get" class="search-form" action=" <?php echo home_url('/') ?>" >
                <div class="search-form-wrapper">
                   <input type="text" id="s" value=" <?php echo get_search_query() ?>" autocomplete="off" placeholder="Search products, brands and categories" />
                   <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                 </div>
             </form> -->
          <form role="search" method="get" class="search-form" action="#" >
              <div class="search-block">
                <input type="text" id="s" placeholder="Search products, brands and categories" />
                <button type="submit" class="btn">SEARCH</button>
              </div>
          </form>

       </div>
       <div class="col-lg-3">
         <ul class="tm-support">
            <li><a><i class="mdi mdi-account-o"></i>Login   <i class="mdi mdi-chevron-down tm"></i></a>
              <div class="sub-menu">
                 <ul>
                   <li><a href="http://localhost/blog/my-account">Login</a></li>
                   <li><a href="http://localhost/blog/bulk-order">Bulk Order</a></li>
                   <li><a href="#">FAQ</a></li>
                 </ul>
              </div>
            </li>

            <li><a><i class="mdi mdi-lock"></i>Help<i class="mdi mdi-chevron-down tm"></i></a>
              <div class="sub-menu">
                 <ul>
                   <li><a href="http://localhost/blog/my-account">Login</a></li>
                   <li><a href="http://localhost/blog/bulk-order">Bulk Order</a></li>
                   <li><a href="#">FAQ</a></li>
                 </ul>
              </div>
            </li>
            <?php echo converio_cart_menu_item_3(); // converio_cart_shopping_bag();?>

         </ul>
       </div>
    </div>
  </div>
</header>


<header class="mobile-nav-wrapper">
     <div class="container">
        <div class="row">
            <div class="col-md-12">
                     <div class="menu-o-block">
                         <i class="fa fa-navicon tm-open hamburger"></i>
                         <div class="tm-logo"><?php if(!has_custom_logo()){bloginfo('name'); }else{the_custom_logo();}?></div>
                          <ul class="tm-cart">
                             <li><a href="my-account"> <i class="mdi mdi-account-o"></i></a> </li>
                             <li><a href="cart"><i class="mdi mdi-shopping-cart"></i></a> </li>
                          </ul>
                     </div>

                 <div class="search-container">
                  <form role="search" method="get" class="search-form" action="#" >
                      <div class="search-block">
                        <input type="text" id="s" placeholder="Search products, brands and categories" />
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                      </div>
                  </form>
                </div>

            </div>
        </div>
     </div>

     <div class="mobile-menu-wrapper">
       <div class="tmx">
         <i class="fa fa-close tm-close"></i>
         <div class="tmx-logo"><?php if(!has_custom_logo()){bloginfo('name'); }else{the_custom_logo();}?></div>
       </div>

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
</header>
