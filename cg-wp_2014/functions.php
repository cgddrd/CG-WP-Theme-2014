<?php 

function set_up_JS()
{
	// Register the H5BP JS scripts required for the site.
	//wp_register_script( 'H5BP-plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ) );
	//wp_register_script( 'H5BP-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );

	//Register the be-spoke scroll JS. 

	/**
	 * Register a required JS file for use in the site. 
	 * 
	 * Wordpress will automatically add the <script> tag to the page <head>.
	 *
	 * Params:
	 * 1. WP variable name for this particular script (NOT the actual name of the JS file)
	 * 2. The filepath of the JS file - Gets the root of the site and then you can add the rest. 
	 * 3. Informs WP that this script relies on the JQuery libraries included as part of WP. 
	 * 
	 * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_script
	 */
	//wp_register_script( 'CG-scroll', get_template_directory_uri() . '/js/scroll.js', array( 'jquery' ) );
	
	wp_register_script( 'CG-WP-Min', get_template_directory_uri() . '/js/cg-wp.js', array( 'jquery' ) );

	// Add the scripts to the WP site.

	//Jquery is included as part of WP - You do not have to register it.
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'CG-WP-Min' );
}

function set_up_CSS() {


	wp_register_style( 'H5BP-Normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), false, 'all');

	wp_register_style( 'H5BP-Main', get_template_directory_uri() . '/css/main.css', array('H5BP-Normalize'), false, 'all');

	wp_register_style( 'Google-Fonts-SSP', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400', array('H5BP-Main'), false, 'all');
	
	wp_register_style( 'Google-Fonts-Lato', 'http://fonts.googleapis.com/css?family=Lato:400,700', array('H5BP-Main'), false, 'all');

	wp_register_style( 'Google-Fonts-Incon', 'http://fonts.googleapis.com/css?family=Inconsolata:400,700', array('H5BP-Main'), false, 'all');

	wp_register_style( 'Font-Awesome', 'http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css', array('H5BP-Main'), false, 'all');

	wp_register_style( 'CG-Style', get_template_directory_uri() . '/style.css', array('H5BP-Main'), false, 'all');

	wp_enqueue_style( 'H5BP-Normalize' );
	wp_enqueue_style( 'H5BP-Main' );
	wp_enqueue_style( 'Google-Fonts-SSP' );
	wp_enqueue_style( 'Font-Awesome' );
	wp_enqueue_style( 'CG-Style' );
	
}

/** 
 * Add an event handler to call 'set_up_JS' on the WP action 'wp_enqueue_scripts'
 *
 * @see http://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
 */
add_action( 'wp_enqueue_scripts', 'set_up_CSS' );
add_action( 'wp_enqueue_scripts', 'set_up_JS' );

function custom_excerpt_length( $length ) {
	return 60;
}

function new_excerpt_more( $more ) {
	return '&#8230; <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}

add_filter( 'excerpt_more', 'new_excerpt_more');

add_filter( 'excerpt_length', 'custom_excerpt_length');

function hls_set_query() {
  $query  = attribute_escape(get_search_query());
 
  if(strlen($query) > 0){
    echo '
      <script type="text/javascript">
        var hls_query  = "'.$query.'";
      </script>
    ';
  }
}

function SearchFilter($query) {
	if ($query->is_search) {
	$query->set('post_type', 'post');
	}
	return $query;
	}

add_filter('pre_get_posts','SearchFilter');

function highlight_search_term($text){
    if(is_search()){
		$keys = implode('|', explode(' ', get_search_query()));
		$text = preg_replace('/(' . $keys .')/iu', '<span class="search-term">\0</span>', $text);
	}
    return $text;
}
add_filter('the_excerpt', 'highlight_search_term');
add_filter('the_title', 'highlight_search_term');
 

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php //echo get_avatar($comment, 60); ?>

         <?php printf(__('%s'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }

 add_filter('comment_form_default_fields', 'url_filtered');
function url_filtered($fields)
{
if(isset($fields['url']))
unset($fields['url']);
return $fields;
}

?>