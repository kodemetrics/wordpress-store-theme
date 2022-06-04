<article class="col-md-6 col-sm-6 col-xs-12">
    <div class="ix-card">
      <div class="grid-thumb" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>)"></div>
      <div class="content">
           <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <span class="category"><?php the_category('|');?></span>
            <span><i class="fa fa-user"></i>
              <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>"><?php the_author(); ?></a>
            </span>
            <span><i class="fa fa-calendar-o"></i><?php echo esc_html(get_the_date()); ?></span>

            <?php the_excerpt(); ?>
          <a class="blog-link" href="<?php the_permalink(); ?>">continue</a>
      </div>

    </div>
</article>
