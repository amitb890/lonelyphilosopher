<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<style>
	.related-feed-item img{width:130px;height:75px;}
</style>
<h4 class="heading heading--h4">Related articles</h4>
<?php if (have_posts()):?>

	<?php while (have_posts()) : the_post(); ?>
		<?php if (has_post_thumbnail()):?>
		<article class="related-feed-item">
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" data-related-content-link="" class="related-feed-item__link">
			<div class="related-feed-item__link__image"><?php the_post_thumbnail(); ?></div>
			<div class="related-feed-item__link__title">
		        <div class="heading heading--h5">
		           <span class="link link--heading heading--no-margin"><?php the_title(); ?></span>
		        </div>
     		</div>
		</a>
		</article>
		<?php endif; ?>
	<?php endwhile; ?>


<?php else: ?>
<p>No related photos.</p>
<?php endif; ?>
