<?php get_header(); ?>
  <article id="post-<?php the_ID();?>" <?php post_class(); ?> >
      <div class="container default">
           <div class="row">
                   <div class="col-md-8">
                    <?php while ( have_posts() ) : the_post() ?>
                      <?php theme_customize_single(); ?>
                      <div class="blog-content"> <?php the_content(); ?> </div>
                      <div class="blog-tags">
                           <div class="tag-cloud">
                               <?php the_tags( '<i class="fa fa-tags"></i> Tags : ', ', ' ); ?>
                          </div>
                      </div>

                     <div class="post-author">
                          <?php echo get_avatar(get_the_author_meta('user_email'), $size = '105' ); ?>
                          <div class="post-author-content">
                              <h5>
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
                              </h5>
                              <p><?php the_author_meta('description'); ?></p>
                          </div>
                      </div>



                      <?php
                          /*If comments are open or we have at least one comment, load up the comment template */
                           if ( comments_open() || '0' != get_comments_number() )
                               comments_template( '', true );
                       ?>
      		           <?php endwhile; ?>

               </div>



              <div class="col-md-4 col-sm-12 sidebar-wrapper">
                  <?php if ( is_active_sidebar( 'hm-sidebar' )  ) : ?>
                    <?php dynamic_sidebar( 'hm-sidebar' ); ?>
                    <!--widget-area -->
                  <?php endif; ?>
              </div>

          </div>
      </div>
  </article>

<?php get_footer(); ?>
