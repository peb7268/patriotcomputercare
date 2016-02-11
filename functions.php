<?php
define('JS_PATH', get_template_directory_uri().'/js');


//Infinite Scrolling Pagination
function wp_infinitepaginate(){ 
    $loopFile        = $_POST['loop_file'];
    $paged           = $_POST['page_no'];
    $posts_per_page  = get_option('posts_per_page');
 	
    # Load the posts
    query_posts(array('paged' => $paged )); 
    get_template_part( 'loops/'.$loopFile );
 
    exit;
}
add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate');           // for logged in user
add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate');    // if user not logged in

function stripStandardWordpressJunk(){
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );
	add_filter( 'use_default_gallery_style', '__return_false' ); 	#Inline Styling for gallery
}

function addThemeSupport(){
	add_theme_support('post-thumbnails'); 
	addNavMenus();
}

function addNavMenus(){
	register_nav_menu('main_nav', 'Global Nav Menu');
	register_nav_menu('footer_nav', 'Footer Nav Menu');
}

function enqueue_scripts(){
	wp_enqueue_script('jquery');
	
	wp_register_script('fancybox', JS_PATH.'/vendors/fancybox/source/jquery.fancybox.js', array('jquery'), null, true);
	wp_register_style('fancybox', JS_PATH.'/vendors/fancybox/source/jquery.fancybox.css', null, true);

	wp_register_script('nivo', JS_PATH.'/vendors/nivoslider/jquery.nivo.slider.pack.js', array('jquery'), null, true);
	wp_register_style('nivo', JS_PATH.'/vendors/nivoslider/nivo-slider.css', null, true);

	wp_register_script('main', get_template_directory_uri().'/dist/js/bundle.js', array('jquery'), null, true);
	
	wp_enqueue_script('nivo');
	wp_enqueue_style('nivo');

	wp_enqueue_script('fancybox');
	wp_enqueue_style('fancybox');

	wp_enqueue_script('main');
}

function admin_init(){
	addThemeSupport();
}

function init(){
	stripStandardWordpressJunk();
	enqueue_scripts();
}

//Remove height and width from featured image
function remove_img_attr ($html) {
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}

add_action( 'wp_enqueue_scripts', 'init');
add_action( 'wp_loaded', 'admin_init');
add_filter( 'post_thumbnail_html', 'remove_img_attr' );

function featured_image_url($post){
	$thumb  = get_post_thumbnail_id($post->ID);
	$url 	= wp_get_attachment_url($thumb);

	echo $url;
}

require 'partials/hero/methods.php';
require 'partials/gallery.php';