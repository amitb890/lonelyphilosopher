<?php get_header(); ?>
<main>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
   <article class="article" data-article="">
      
      <div class="article__header">
         <header class="article-header">
            <div class="article-header__title">
               <div class="row">
                  <div class="column">
                     <h1 class="heading heading--h0 heading--no-margin heading--capped">
                       <?php the_title(); ?>			
                     </h1>
                  </div>
               </div>
            </div>
            
         </header>
      </div>
      <div class="article__body">
         <div class="row">
            <div class="column">
               <div class="article-body">
                  <?php the_content();?>
               </div>
            </div>
         </div>
         
      </div>




      <footer class="article__footer">
         <div class="article__footer__meta">
            <div class="row">
               <div class="column">
                  <div class="section section--border-bottom">
                     <div class="row">
                       
                        <div class="column">
                           
                           <!-- Start YARPP -->
                           <?php related_posts();?>
                           <!-- End YARPP -->
                           
                           
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--  Start Comments section -->
         <?php comments_template(); ?> 
         <!-- End Comments Section -->
      </footer>
   </article>
<?php endwhile; ?>



<?php else: ?>
<article><h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1></article>
<?php endif; ?>
</main>
<?php get_footer(); ?>