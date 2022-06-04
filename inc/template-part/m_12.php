<?php
/**
 *
 * @author Kapamau
*/
?>

<li class="list-item">
   <div class="meta-data">
     <span class="category"><?php the_category('|');?></span>
     <span> | </span>
     <span class="date"><?php echo esc_html(get_the_date()); ?></span>
  </div>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</li>
