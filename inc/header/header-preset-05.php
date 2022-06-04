<div class="menu-banner-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
              <a href="about-me">
                    <div class="author-img" style="background-image:url(<?php echo get_template_directory_uri();?>/assets/images/author_01.jpg)">
                        <div class="author-content">
                            <p><strong>Ogwa J. Aduloju</strong> <span> (The Sassy Librarian) </span> <br>  
                            Ogwa is a writer, poet and librarian. Described as an avid reader 

                            <?php echo esc_url('<a href="ma">More</a>');?>
                          </p>
                        </div>
                        
                    </div>
                </a>
               
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
                  //  wp_nav_menu(
                  //     array(
                  //             'theme_location' => 'primary',
                  //             'container' => '',
                  //             'menu_class' => 'menu',
                  //             'fallback_cb' => '',
                  //             'echo' => true,
                  //             'walker' => new theme_walker(),
                  //             'depth' => 1
                  //           )
                  //   );
                    ?>
            </div>

            <div class="col-lg-8">
              <div class="banner owl-carousel">

                  <?php $banner = theme_banner_url();
                   foreach($banner as $link) : ?>
                     <div class="item">
                         <a href="#"><img src="<?php echo esc_attr($link->url);?>" /></a>
                     </div>
                 <?php endforeach; ?>

                </div>
            </div>

            <div class="col-lg-2">
              <div class="ads">

                <?php $ads = theme_ads_url();
                 foreach($ads as $link) : ?>
                    <img class="ads-placement" src="<?php echo esc_attr($link->url);?>"/>
                 <?php endforeach; ?>

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
