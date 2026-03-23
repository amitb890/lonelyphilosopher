<!-- Temporary styling to hide comment form ajax messages -->
<style>
.alert__message, .alert--error, .alert__icon, .alert alert--error, .ajax-form__spinner, .alert--success{display:none;}

</style>
<!-- End of temporary styling -->

<?php
$args = array(
    'fields' => apply_filters(
        'comment_form_default_fields', array(
            'author' =>'<div class="comments-form__input comments-form__input--author">' . '<input id="author" name="author" type="text" class="input-text input-text--borderless" placeholder="Name" value="" required="required" style="max-width:100%;">'.
                '' .
                ( $req ? '' : '' )  .
                '</div>'
                ,
            'email'  => ' <div class="comments-form__input comments-form__input--email">' . '<input id="email" name="email" type="email" class="input-text input-text--borderless" placeholder="Email" value="" required="required" style="max-width:100%;">'  .
                '' .
                ( $req ? '' : '' ) 
                 .
                '</div>'
            
        )
    ),
    'comment_field' => '<div class="comments-form__textarea">' .
        '' . __( '' ) . '</label>' .
        '<textarea class="input-textarea" name="comment" aria-required="true" required="required"></textarea>' .
        '</div>',
    'comment_notes_after' => '',
    'title_reply' => '',

        'submit_button' => ' <div class="comments-form__input comments-form__input--submit">
            <div align="center" class="button-group button-group--responsive"><span class="button-group__item">
         <button name="submit" type="submit" id="submit" class="button button--primary">
         <span class="button__inner">
         <span class="button__label">Post comment</span>
         </span>
         </button>
         </span>
      </div>
      
   </div>'


);

?>


<div class="article__footer__comments">
   <div class="row">
      <div class="column">
         <div id="comments" class="comments">
            <div class="comments__inner">
               <div class="comments__inner__title">
                  <h4 class="heading heading--h4">
                     Leave a Comment           
                  </h4>
               </div>
               <!-- Comment Inner form -->
               <div class="comments__inner__form">
                  <?php comment_form($args); ?>
               </div>
               <!-- End Comment Inner form -->
               <!-- Start Listing Comments -->
               <?php if (have_comments()) : ?>
                  <div class="comments__inner__entries">
                     <ol class="commentlist">
                        <?php wp_list_comments('type=comment&callback=format_comment'); ?>
                     </ol>
                  </div>

                  <?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
                     <p><?php _e( 'Comments are closed here.', 'html5blank' ); ?></p>
                  <?php endif; ?>
               <!-- End listing comments -->
            </div>
         </div>
      </div>
   </div>
</div>




