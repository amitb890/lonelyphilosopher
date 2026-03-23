<?php

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}
// Add theme support for Featured Images
add_theme_support('post-thumbnails', array(
'post',
'page',
'custom-post-type-name',
));
// Limit word count of excerpt to 35 words only.
function tn_custom_excerpt_length( $length ) {
return 35;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

// Replace the default ellipsis in Excerpt
function trim_excerpt($text) {
     $text = str_replace('[&hellip;]', '', $text);
     return $text;
 }
add_filter('get_the_excerpt', 'trim_excerpt');


// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Prevent WordPress from adding P tags in WordPress posts
// This will mess up all the old posts and you have to edit them manually. Use at your own risk
//remove_filter( 'the_content', 'wpautop' );
//remove_filter( 'the_excerpt', 'wpautop' );


// 
// // Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Comments Section


// Remove Your email address will not be published
function change_up($fields) { 
$fields['comment_notes_before'] = ''; 
$fields['title_reply'] = __( 'New Title' );
return $fields; 
} 

add_filter('comment_form_defaults','change_up'); 

// Remove H3 ID=reply-title before form action in comment form
function my_comment_form_before() {
    ob_start();
}
add_action( 'comment_form_before', 'my_comment_form_before' );

function my_comment_form_after() {
    $html = ob_get_clean();
    $html = preg_replace(
        '/<h3 id="reply-title"(.*)>(.*)<\/h3>/',
        '<div class="comment-respond__sub-title"><span class="comment-respond__sub-title__cancel"></span></div>',
        $html
    );
    echo $html;
}
add_action( 'comment_form_after', 'my_comment_form_after' );

// Let's disable the checkbox - Save my name, email, and website in this browser for the next time I comment.

remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );



// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }





// Remove other unnecessary stuff
remove_action('wp_head', 'rsd_link'); //removes EditURI/RSD (Really Simple Discovery) link.
remove_action('wp_head', 'wlwmanifest_link'); //removes wlwmanifest (Windows Live Writer) link.
remove_action('wp_head', 'wp_generator'); //removes meta name generator.
remove_action('wp_head', 'wp_shortlink_wp_head'); //removes shortlink.
remove_action( 'wp_head', 'feed_links', 2 ); //removes feed links.
remove_action('wp_head', 'feed_links_extra', 3 );  //removes comments feed.

// Remove Emoji codes from header
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// De-register Stylesheets
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

function my_deregister_styles() {
    wp_deregister_style( 'simple-sitemap-css' );
    wp_deregister_style( 'wp-pagenavi' );
    wp_deregister_style( 'dpsp-frontend-style' );
    wp_deregister_style( 'wp-block-library' );
    wp_deregister_style( 'yarppWidgetCss' );
    wp_deregister_style( 'yarppRelatedCss');
	wp_deregister_style( 'newsletter');
    
}

// De-register Javascripts
add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );

function my_deregister_javascript() {
	wp_deregister_script( 'jquery' );
    wp_deregister_script( 'akismet' );
    wp_deregister_script( 'wp-embed' );
    wp_deregister_script( 'comment-reply');
	wp_deregister_script( 'newsletter-subscription');
	wp_deregister_script( 'akismet-form');
  
}
// Remove CSS in Footer
add_action( 'wp_footer', 'tj_deregister_yarpp_footer_styles' );
function tj_deregister_yarpp_footer_styles() {
   wp_dequeue_style('yarppRelatedCss');
}
?>
<?php
// Comment listings format, taken from this page -- https://digwp.com/2010/02/custom-comments-html-output/
    function format_comment($comment, $args, $depth) {
    
       $GLOBALS['comment'] = $comment; ?>
       
        <div <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
                
            <div class="comment-intro" style="font-weight:bold;">
                <?php printf(__('%s'), get_comment_author_link()) ?> <a style="font-weight:normal;color:#555;font-size: 0.8rem;float:right;"class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></a>
            </div>
            
            <?php if ($comment->comment_approved == '0') : ?>
                <em><php _e('Your comment is awaiting moderation.') ?></em><br />
            <?php endif; ?>
            
            <?php comment_text(); ?>
                   
<?php } ?>