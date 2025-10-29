<?php
// enqueue the child theme stylesheet
Function wp_schools_enqueue_scripts() {
//wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' )  );
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css', array(), time() );
wp_enqueue_style( 'childstyle' );

if(is_page_template('page_practice_area.php') || is_page_template('page_practice_area_child.php') || is_single()) {
	wp_enqueue_style( 'postali-styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue child theme styles.css
}

}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);

// Register additional menu for mobile devices 
function register_my_menu() {
  register_nav_menu('mobile-menu',__( 'Mobile Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Custom iPad only mobile detection (different than usual wp_is_mobile)
function my_wp_is_mobile() {
    if (! empty($_SERVER['HTTP_USER_AGENT'])
        // bail out, if iPad
        && false !== strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')
    ) return false;
    return wp_is_mobile();
}


// Widget Logic Conditionals
function is_child($parent) {
global $post;
return $post->post_parent == $parent;
}


// Shortcode for adding default sidebar to page content
function sidebar_sc( $atts ) {
    ob_start();
    dynamic_sidebar('SidebarPage');
    $html = ob_get_contents();
    ob_end_clean();
    return '
    <aside class="practice_area_sidebar">'.$html.'</aside>';
    }

    add_shortcode('sidebar', 'sidebar_sc');


// Add shortcode for basic WP search WITH text animation
function wpbsearchform( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s"></label>
    <label class="fade"><input class="dynamic-placeholder" type="text" value="' . get_search_query() . '" placeholder="" name="s" id="s" /></label>
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </div>
    </form>';
    return $form;
}
add_shortcode('searchbox-animate', 'wpbsearchform');

// Customize Site Search functionality (limiting excerpt length)
function excerpt($limit) {
 $excerpt = explode(' ', get_the_excerpt(), $limit);
 if (count($excerpt)>=$limit) {
   array_pop($excerpt);
   $excerpt = implode(" ",$excerpt).'...';
 } else {
   $excerpt = implode(" ",$excerpt);
 }    
 $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
 return $excerpt;
}
function content($limit) {
 $content = explode(' ', get_the_content(), $limit);
 if (count($content)>=$limit) {
   array_pop($content);
   $content = implode(" ",$content).'...';
 } else {
   $content = implode(" ",$content);
 }    
 $content = preg_replace('/\[.+\]/','', $content);
 $content = apply_filters('the_content', $content); 
 $content = str_replace(']]>', ']]&gt;', $content);
 return $content;
}
// Exclude specific pages from WP search (Homepage)
function jp_search_filter( $query ) {
  if ( $query->is_search && $query->is_main_query() ) {
    $query->set( 'post__not_in', array( 4 ) ); 
  }
}
add_action( 'pre_get_posts', 'jp_search_filter' );

// User role edits
add_filter( 'user_has_cap',
function( $caps ) {
    if ( ! empty( $caps['edit_pages'] ) )
        $caps['manage_options'] = true;
    return $caps;
} );


// Additional JS plugins
function my_custom_scripts() {
  //Homepage Scripts
  if( is_home() || is_front_page() ) {
  wp_enqueue_script('jquery');
  wp_register_script('homepage_scripts', get_stylesheet_directory_uri() . '/js/homepage_scripts.js',array('jquery'), null, true); 
  wp_enqueue_script('homepage_scripts', get_stylesheet_directory_uri() . '/js/homepage_scripts.js',array('jquery'), null, true);  
  }  

   //lazy load
  if( is_home() || is_front_page() || is_page(array(44,46,40)))
  {
    wp_register_script('lazyScroller', get_stylesheet_directory_uri() . '/js/jquery.lazy.min.js',array('jquery'),null,true);
    wp_enqueue_script('lazyScroller');  
    wp_register_script('lazyScroller2', get_stylesheet_directory_uri() . '/js/jquery.lazy.plugins.min.js',array('jquery'),null,true);
    wp_enqueue_script('lazyScroller2'); 
    wp_register_script('lazyScroller3', get_stylesheet_directory_uri() . '/js/lazy_settings.js',array('jquery'),null,true);
    wp_enqueue_script('lazyScroller3');  
  }
  
  // Lightbox Scripts
  wp_register_script('lightbox_scripts', get_stylesheet_directory_uri() . '/js/featherlight.min.js',array('jquery'), null, true); 
  wp_enqueue_script('lightbox_scripts');
}

add_action('wp_enqueue_scripts', 'my_custom_scripts');

// Additional CSS
function my_custom_styles() {
  //Lightbox Styles
  //if( is_home() || is_front_page() || is_page( 'search' ) ) {
  wp_register_style('lightbox_styles', get_stylesheet_directory_uri() . '/css/featherlight.min.css'); 
  wp_enqueue_style('lightbox_styles');
  //}   
}

add_action('wp_enqueue_scripts', 'my_custom_styles');

// Pagespeed
function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

function qode_styles_child() {
wp_deregister_style('style_dynamic');
wp_register_style('style_dynamic', get_stylesheet_directory_uri() . '/css/style_dynamic.css');
wp_enqueue_style('style_dynamic');
wp_deregister_style('style_dynamic_responsive');
wp_register_style('style_dynamic_responsive', get_stylesheet_directory_uri() . '/css/style_dynamic_responsive.css');
wp_enqueue_style('style_dynamic_responsive');
 wp_deregister_style('custom_css');
    wp_register_style('custom_css', get_stylesheet_directory_uri() . '/css/custom_css.css');
    wp_enqueue_style('custom_css');
}
function qode_scripts_child() {
wp_deregister_script('default_dynamic');
wp_register_script('default_dynamic', get_stylesheet_directory_uri() . '/js/default_dynamic.js');
wp_enqueue_style('default_dynamic', array(),false,true);
wp_deregister_script('custom_js');
    wp_register_script('custom_js', get_stylesheet_directory_uri() . '/js/custom_js.js');
    wp_enqueue_style('custom_js', array(),false,true);
}
add_action( 'wp_enqueue_scripts', 'qode_styles_child', 11);
add_action( 'wp_enqueue_scripts', 'qode_scripts_child', 11);

// Remove WordPress auto trash delete of pages
function wpb_remove_schedule_delete() {
    remove_action( 'wp_scheduled_delete', 'wp_scheduled_delete' );
}
add_action( 'init', 'wpb_remove_schedule_delete' );

  /* Add webp extension if supported by browser. Used in conjunction with imagify */
  function checkWebpCompatibility($image_url) {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "Other";
    
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) $browser = 'Opera';
    elseif (strpos($user_agent, 'Edge')) $browser = 'Edge';
    elseif (strpos($user_agent, 'Chrome')) $browser = 'Chrome';
    elseif (strpos($user_agent, 'Safari')) $browser = 'Safari';
    elseif (strpos($user_agent, 'Firefox')) $browser = 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) $browser = 'Internet Explorer';
        
    
    if( $browser == 'Internet Explorer' || $browser == 'Other') {
        return $image_url;
    } else {
        return $image_url . '.webp';
    }
}

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
      'page_title'    => 'Global Schema',
      'menu_title'    => 'Global Schema',
      'menu_slug'     => 'global-schema',
      'capability'    => 'edit_posts',
      'icon_url'      => 'dashicons-networking', // Add this line and replace the second inverted commas with class of the icon you like
      'redirect'      => false
  ));

}