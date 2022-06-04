<?php
/**
 *
 * @author Kapamau
*/
?>

<li class="list-item-ms">
    <div class="thumbnail-ms"style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>');"></div>

    <div class="content-wrapper">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="meta-data">
            <span class="category"><?php the_category('|');?></span>
            <span> - </span>
            <span class="date"><?php echo esc_html(get_the_date()); ?></span>
         </div>
         <?php the_excerpt(); ?>
    </div>

</li>
