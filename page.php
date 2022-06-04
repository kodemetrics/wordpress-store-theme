<?php get_header(); ?>
       <!-- <div class="container ptb"> -->
	        <!-- <div class="row" style="margin: 3% 0%;">     -->
          <div class="container">
              <div class="row" style="margin:3% 0%;">
                    <div class="col-lg-12 col-md-12">
      					       <?php  while ( have_posts() ) : the_post();  ?>
      		                         <?php  the_content(); ?>
      				          <?php	endwhile; // End of the loop. ?>
                    </div>
		           </div>
	        </div>

<?php get_footer(); ?>
