<div class="blog-detail-01">
    <span class="blog-category"><?php the_category(' ');?> </span>
    <h2 class="blog-title"><?php the_title(); ?></h2>
    <div class="blog-meta">
        <span><i class="fa fa-user"></i> Posted by
        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span>
        <span><i class="fa fa-clock-o"></i> <?php the_date(); ?> </span>
    </div>
    <div class="blog-detail-image grid-thumb" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>)"></div>
</div>
