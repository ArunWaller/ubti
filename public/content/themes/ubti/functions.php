<?php
/**
 * ubti functions and definitions
 *
 * @package ubti
 */
 
 
 
 // Added cookie based on url
  function setcookie_firsturl() {
		// GRABS THE CURRENT PAGE NAME - THIS IS ALSO KNOWS AS THE PAGE/POST SLUG
		$pagename =  trim( $_SERVER["REQUEST_URI"] , '/' );
		//if ( !isset($_COOKIE['firsturl'])) 
			//echo $pagename;

			
		if (
			(strpos($pagename,"industries/aerospace-and-defense")  !== false) or
			(strpos($pagename,"industries/healthcare")  !== false) or
			(strpos($pagename,"industries/financial-services") !== false)
			
			
			)
		{
		$timer = time()+86400;
		   setcookie( 'firsturl', $pagename, 3 * 'DAYS_IN_SECONDS', COOKIEPATH, COOKIE_DOMAIN,is_ssl(),true );
		}
		
	
		
    }

    add_action('init', 'setcookie_firsturl',1 );
   
    
    //if(!isset($_COOKIE['firsturl'])) {
    //  echo "-----: firsturl is not set.";
    //} else {
    //  echo "-----The cookie firsturl is set.";
    //  echo "----Value of cookie: " . $_COOKIE['firsturl'];
    //}

	

 
if ( ! function_exists( 'ubti_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ubti_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ubti, use a find and replace
	 * to change 'ubti' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ubti', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'ubti' ),
		'sidemenu' => esc_html__( 'Sidebar Menu', 'ubti' ),
		'aerospace_menu' => esc_html__( 'Aerospace Menu', 'ubti' ),
		'finance_menu' => esc_html__( 'Finance Menu', 'ubti' ),
		'healthcare_menu' => esc_html__( 'Healthcare Menu', 'ubti' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Register Custom Navigation Walker
	require_once('inc/navwalker.php');

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ubti_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // ubti_setup
add_action( 'after_setup_theme', 'ubti_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ubti_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ubti_content_width', 640 );
}
add_action( 'after_setup_theme', 'ubti_content_width', 0 );


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}


/**
*   Child page conditional
*   @ Accept's page ID, page slug or page title as parameters
*/
function is_child( $parent = '' ) {
    global $post;

    $parent_obj = get_page( $post->post_parent, ARRAY_A );
    $parent = (string) $parent;
    $parent_array = (array) $parent;

    if ( in_array( (string) $parent_obj['ID'], $parent_array ) ) {
        return true;
    } elseif ( in_array( (string) $parent_obj['post_title'], $parent_array ) ) {
        return true;
    } elseif ( in_array( (string) $parent_obj['post_name'], $parent_array ) ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ubti_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ubti' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ubti_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ubti_scripts() {
	wp_enqueue_style( 'ubti-style', get_stylesheet_directory_uri() . '/static/dist/css/style.min.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ubti_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/brmpress/soil.php';
require get_template_directory() . '/inc/brmpress/branding.php';


// REMOVE WP'S EMOJI SCRIPTS
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );



