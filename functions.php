<?php
remove_action( 'wp_head', 'wp_generator' );
function at_remove_dup_canonical_link() {
	return false;
}
add_filter( 'wpseo_canonical', 'at_remove_dup_canonical_link' );

function wpseo_disable_rel_next_home( $link ) {
  if ( is_home() ) {
    return false;
  }
}
add_filter( 'wpseo_next_rel_link', 'wpseo_disable_rel_next_home' );

if (!function_exists('remove_wp_open_sans')) :
function remove_wp_open_sans() {
wp_deregister_style( 'open-sans' );
wp_register_style( 'open-sans', false );
}
add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
endif;

add_action('wp_enqueue_scripts', 'no_more_jquery');
function no_more_jquery(){
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . 
    ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . 
    '://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, null);
    wp_enqueue_script('jquery');
}
function disable_wp_emojicons() {
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  //add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

add_action( 'after_setup_theme', 'setup' );
function setup() {  
    add_theme_support( 'post-thumbnails' );
	//add_image_size( 'img430x250', 430, '250', true );
}

register_nav_menus( array(
	'navtop' => __( 'Menu Top' ),
	//'nav' => __( 'Nav Menu' ),
) );

if (function_exists('register_sidebar'))
{
register_sidebar(array(
'name'=>'Widget',
'before_widget' => '<section id="%1$s" class="widget %2$s">',
'after_widget' => '</section>',
'before_title' => '<h2 class="widget-title">',
'after_title' => '</h2>',
));
register_sidebar(array(
'name'=>'Widget Content',
'before_widget' => '<section id="%1$s" class="widget %2$s">',
'after_widget' => '</section>',
'before_title' => '<h2 class="widget-title">',
'after_title' => '</h2>',
));
}

add_post_type_support('page', 'excerpt');
function get_excerpt($limit, $source = null){
    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    return $excerpt;
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Page Setting',
		'menu_title'	=> 'Page Setting',
		'menu_slug' 	=> 'dc-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
add_action('admin_head', 'admin_styles');
function admin_styles() {
	?>
	<style>
		.dc_wh150 iframe { height: 150px !important; min-height: 150px; }
		#cfpf-format-video-fields {display: none !important}
	</style>
	<?php
}

function remove_revslider_meta_tag() {
     return '';  
}
add_filter( 'revslider_meta_generator', 'remove_revslider_meta_tag' );

/*add_action( 'after_setup_theme', 'setup' );
add_theme_support( 'post-formats', array(
   'standard', 'video'
) );*/

add_action( 'add_meta_boxes', 'action_add_meta_boxes', 0 );
function action_add_meta_boxes() {
	global $_wp_post_type_features;
	if (isset($_wp_post_type_features['post']['editor']) && $_wp_post_type_features['post']['editor']) {
		unset($_wp_post_type_features['post']['editor']);
		add_meta_box(
			'description_section',
			__('Content'),
			'inner_custom_box',
			'post', 'normal', 'high'
		);
	}
	if (isset($_wp_post_type_features['post_type']['editor']) && $_wp_post_type_features['post_type']['editor']) {
		unset($_wp_post_type_features['post_type']['editor']);
		add_meta_box(
			'description_section',
			__('Content'),
			'inner_custom_box',
			'post', 'normal', 'high'
		);
	}
	if (isset($_wp_post_type_features['page']['editor']) && $_wp_post_type_features['page']['editor']) {
		unset($_wp_post_type_features['page']['editor']);
		add_meta_box(
			'description_sectionid',
			__('Content'),
			'inner_custom_box',
			'page', 'normal', 'high'

		);
	}
}
function inner_custom_box( $post ) {
	the_editor($post->post_content);
}

function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}