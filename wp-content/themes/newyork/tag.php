<?php get_header(); ?>
<main>
   <div class="row">
      <div class="column">
         <section id="posts" class="feed" data-posts_per_page="9">
            <div class="feed__title">
               <div class="heading heading--h4 heading--no-margin">
                  <?php _e( 'Articles On ', 'html5blank' ); echo single_tag_title('', false); ?>        
               </div>
            </div>
            <div class="feed__body">
               <div class="matrix matrix--of-one-small matrix--of-two-medium matrix--of-three-normal matrix--of-three-large">
                  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
<div class="matrix__item">
    <article class="excerpt">
        <figure class="excerpt__thumbnail">
         <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" data-related-content-link="">
            <?php the_post_thumbnail(array(450,270));?>
         </a>
      </figure>
      
        <div class="excerpt__title">
            <h5 class="heading heading--responsive heading--h5 heading--no-margin">
                <a class="link link--subtle-default" href="<?php the_permalink(); ?>" data-related-content-link="">
                  <?php the_title(); ?>
                </a>
            </h5>
        </div>
        <div class="excerpt__meta"><?php the_excerpt(); ?></div>
    </article>
</div>

<?php endwhile; ?>

<?php else: ?>
<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
<?php endif; ?>
                  
                  
               </div>
            </div>
            <!-- Start pagination -->        
            <div class="feed__pagination">
               <div class="pagination">
                  <?php wp_pagination(); ?>
               </div>
            </div>
            <!-- End pagination -->
         </section>
      </div>
   </div>
   <?php include('newslettercta.php');?> 
</main>



<?php get_footer(); ?>
