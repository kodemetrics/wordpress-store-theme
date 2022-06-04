<?php
/**
 * Template Name: Homepage + Sidebar
 * @author Kapamau
 */

get_header(); ?>
<?php theme_customize_banner(); ?>
<div class="main-wrapper">
    <div class="container">
          <div class="row">
              <div class="col-md-8">
                   <div class="row">
                          <div class="short-wrapper content-wrapper">
                                <?php  while ( have_posts() ) : the_post();  ?>
                                               <?php  the_content(); ?>
                                <?php endwhile; // End of the loop. ?>
                         </div>
                   </div>
              </div>

             <div class="col-md-4 col-sm-12 sidebar-wrapper">
                 <?php if ( is_active_sidebar( 'hm-sidebar' )  ) : ?>
                   <?php dynamic_sidebar( 'hm-sidebar' ); ?>
                   <!--widget-area -->
                 <?php endif; ?>
             </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
