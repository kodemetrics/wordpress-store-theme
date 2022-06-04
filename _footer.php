   <!--FOOTER-->
     <footer class="page-footer">
          <div class="container ptb">
             <div class="row">
                 <div class="col-md-4  macro-ws-footer">
                     <?php dynamic_sidebar('footer'); ?>
                 </div>

                 <div class="col-md-4  macro-ws-footer">
                      <?php dynamic_sidebar('footer2'); ?>
                </div>

                <div class="col-md-4  macro-ws-footer">
                   <?php dynamic_sidebar('footer3'); ?>
                </div >
             </div>
          </div>

          <div class="copyright">
             <div class="container ptb">
                  <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-12 ">
                                <p>Copyright © <?php echo date('Y')?> All Rights Reserved</p>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12">
                             <div class="tm-footer-menu">
                               <?php wp_nav_menu(
                                   array('theme_location' => 'footer','container' => '','menu_class' => 'footer-menu',
                                        'menu_id' => 'footer-menu','fallback_cb' => '','echo' => true,'depth' => 1 ));
                                ?>
                             </div>
                           </div>
                     </div>
                 </div>
            </div>


      </footer>
  </div>
  <!--  Scripts-->
  <?php wp_footer() ?>
  </body>
</html>
