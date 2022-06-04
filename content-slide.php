    <div class="item ">
		    <?php the_post_thumbnail(); ?>
			<div class="container">
				<div class="carousel-caption">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					 <?php the_excerpt(); ?>
				</div>
			</div>
    </div>

