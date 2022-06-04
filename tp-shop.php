<?php
/**
 * Template Name: Shop
 * @author Kapamau
 */
get_header(); ?>
      <?php 
        theme_customize_shop(); 
      ?>
      <div class="container default-1">
            <div class="row">
                   <div class="col-md-12">
                          <div class="short-wrapper content-wrapper">
                                <?php  while ( have_posts() ) : the_post();  ?>
                                               <?php  the_content(); ?>
                                <?php endwhile; // End of the loop. ?>
                         </div>
                   </div>
            </div>
      </div>
<?php get_footer(); ?>
