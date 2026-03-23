<?php get_header(); ?>

<main>
	      <h1 align="center" style="margin-top:50px;">Search Results</h1>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
   <article class="article" data-article="">

      <div class="article__header">
         <header class="article-header">
            <div class="article-header__title">
               <div class="row">
                  <div class="column">
					  <h4 class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  </div>
               </div>
            </div>
            
         </header>
      </div>
      <div class="article__body">
         <div class="row">
            <div class="column">
               <div class="article-body">
                  <?php the_excerpt();?>
               </div>
            </div>
         </div>
         
      </div>
   </article>
<?php endwhile; ?>



<?php else: ?>
<article style="min-height:500px;"><p align="center"><?php _e( 'Sorry, we could not find a suitable match for your query.', 'html5blank' ); ?></p>
<p align="center"><a href="http://www.cultofweb.com/blog/">Go back to homepage</a> or <a href="http://cultofweb.com/blog/sitemap/">check out the Sitemap</a></p>
</article>

<?php endif; ?>
</main>




                  
    
<?php get_footer(); ?>
