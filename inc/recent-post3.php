<article class="col-md-4 col-sm-4 col-xs-12">
     <div class="card2">
        <?php the_post_thumbnail(); ?>
           <div class="card-content2">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                 <span class="category"><?php the_category('|');?></span>
                 <span><i class="fa fa-user"></i>
                   <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>"><?php the_author(); ?></a>
                 </span>
                 <span><i class="fa fa-calendar-o"></i><?php echo esc_html(get_the_date()); ?></span>

                 <?php the_excerpt(); ?>

           </div>
     </div>
</article>
