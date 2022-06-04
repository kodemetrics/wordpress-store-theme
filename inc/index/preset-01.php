<article class="col-md-6 col-sm-6 col-xs-12">
    <div class="card">
       <?php the_post_thumbnail(); ?>
          <div class="card-content">
               <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
               <span class="post-author-name"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>"><?php the_author(); ?></a> <span>-<span></span>
               <span class="post-data"><?php echo esc_html(get_the_date()); ?></span>
               <?php the_excerpt(); ?>
          </div>
    </div>
</article>
