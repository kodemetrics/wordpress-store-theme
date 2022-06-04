<?php get_header(); ?>
  <div class="container default index-template ">
  <div class="row">

        <div class="col-md-8">
             <div class="row">
                <?php while ( have_posts() ) : the_post() ?>
                <?php theme_customize_index(); ?>
                <?php endwhile; ?>
              </div>
              <?php theme_pagination(); ?>
        </div>

        <div class="col-md-4 col-sm-12 sidebar-wrapper">
             <?php get_sidebar(); ?>
        </div>

</div>
</div>

<?php get_footer(); ?>
