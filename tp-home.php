<?php
/**
 * Template Name: Homepage
 * @author Kapamau
 */
get_header(); ?>

<div class="main_banner_wrapper">
  <?php theme_customize_banner(); ?>
</div>
<div class="container">
      <!-- <div class="row">
          <div class="col-md-12"> -->
               <div class="row">
                      <div class="tm short-wrapper">
                            <?php  while ( have_posts() ) : the_post();  ?>
                                           <?php  the_content(); ?>
                            <?php endwhile; // End of the loop. ?>
                     </div>
               </div>
          <!-- </div>
    </div> -->
</div>

<?php get_footer(); ?>
