<div class="menu-banner-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <!-- <div class="menu">
                    <ul>
                      <li><a href="#">Phones & Tablets</a> </li>
                      <li><a href="#">Computing</a> </li>
                      <li><a href="#">Fashion</a> </li>
                      <li><a href="#">Electronics</a> </li>
                      <li><a href="#">Home & Office</a> </li>
                      <li><a href="#">Games</a> </li>
                      <li><a href="#">Phones & Tablets</a> </li>
                      <li><a href="#">Computing</a> </li>
                      <li><a href="#">Fashion</a> </li>
                      <li><a href="#">Electronics</a> </li>
                      <li><a href="#">Home & Office</a> </li>
                      <li><a href="#">Games</a> </li>
                    </ul>
                </div>     -->
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

            <div class="col-lg-8">
              <div class="banner owl-carousel">
                          <!-- <div class="item">
                            <a href="#">
                                <img class="grid-thumb" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/banner_01.jpg)" />
                            </a>
                          </div>
                          <div class="item">
                            <a href="#">
                              <img class="grid-thumb" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/assets/images/banner_02.jpg)" />
                            </a>
                            </div> -->

                   <div class="item">
                    <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/banner_001.jpg)" /></a>
                  </div>
                  <div class="item">
                    <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/banner_002.jpg)" /></a>
                  </div>

                   <div class="item">
                    <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/banner_003.jpg)" /></a>
                  </div>

                   <div class="item">
                    <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/banner_004.png)" /></a>
                  </div>

                </div>
            </div>

            <div class="col-lg-2">
              <div class="ads">
                <img class="ads-placement" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ads_01.jpg" alt="">
                <img class="ads-placement" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/ads_01.jpg" alt=""> 
              </div>
            </div>


            
                 
          <div class="col-lg-3">
              <a href="#" class="ln-call-to-action">
                <div class="img">
                  <img src="https://ng.jumia.is/cms/Homepage/2021/w03/JumiaGlobal-(1).png" width="40" height="40">
                </div>
                <span class="text">Jumia Global</span>
              </a>
          </div>


          <div class="col-lg-3">
              <a href="#" class="ln-call-to-action">
                <div class="img">
                  <img src="https://ng.jumia.is/cms/0-1-homepage/quicklinks/jumia-food.png" width="40" height="40">
                </div>
                <span class="text">Jumia Food</span>
              </a>
          </div>


          <div class="col-lg-3">
              <a href="#" class="ln-call-to-action">
                <div class="img">
                  <img src="https://ng.jumia.is/cms/0-1-homepage/quicklinks/jumia-pay.png" width="40" height="40">
                </div>
                <span class="text">Official Stores</span>
              </a>
          </div>


          <div class="col-lg-3">
              <a href="#" class="ln-call-to-action">
                <div class="img">
                  <img src="https://ng.jumia.is/cms/Official-Store_ICON_JBF21.png" width="40" height="40">
                </div>
                <span class="text">Official Stores</span>
              </a>
          </div>


        </div>
    </div>
</div>
