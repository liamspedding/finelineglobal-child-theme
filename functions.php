<?php
/**
 * FineLine Global functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FineLine_Global
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'finelineglobal_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function finelineglobal_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on FineLine Global, use a find and replace
		 * to change 'finelineglobal' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'finelineglobal', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'finelineglobal' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'finelineglobal_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'finelineglobal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function finelineglobal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'finelineglobal_content_width', 640 );
}
add_action( 'after_setup_theme', 'finelineglobal_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function finelineglobal_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'finelineglobal' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'finelineglobal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'finelineglobal_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function finelineglobal_scripts() {
	wp_enqueue_style( 'finelineglobal-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'finelineglobal-style', 'rtl', 'replace' );

	wp_enqueue_script( 'finelineglobal-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

   wp_enqueue_script( 'titan-iframe', 'https://d3v0iqf1i1i9dg.cloudfront.net/embed/v1/ftautosize.js', null, null, true );


	// Slick Slider
	wp_enqueue_script( 'finelineglobal-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'finelineglobal_scripts', 9999 );

/**
 * Register Custom Post Types.
 */
require get_template_directory() . '/inc/register-cpt.php';

// Customise Post Types
require get_template_directory() . '/inc/cpt/customise-posts.php';

/**
 * Register Custom Shortcodes.
 */
require get_template_directory() . '/inc/shortcodes/knowledge-base-slider.php';
require get_template_directory() . '/inc/shortcodes/newsroom-masonry-grid.php';
require get_template_directory() . '/inc/shortcodes/locations-shortcode.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Add Post Format Support
function themename_post_formats_setup() {
	add_theme_support( 'post-formats', array( 'aside' ) );

	// add post-formats to post_type 'my_custom_post_type'
	// add_post_type_support( 'my_custom_post_type', 'post-formats' );
}
add_action( 'after_setup_theme', 'themename_post_formats_setup' );

function wpb_login_logo() { ?>
   <style type="text/css">
      body{
         background-color: #153246 !important;
         background-image: url(https://www.fineline-global.com/wp-content/uploads/2021/10/contact-us-form-bg-40.png) !important;
         background-size: auto !important;
         background-repeat: no-repeat !important;
         background-position: 100% 0 !important;
      }

      #login h1 a, .login h1 a {
         background-image: url(https://www.fineline-global.com/wp-content/uploads/2021/07/fineline-logo.svg);
         height: 100px;
         width: 300px;
         background-size: 300px 100px;
         background-repeat: no-repeat;
         padding-bottom: 10px;
      }

      #login form p{
         margin-top: 15px !important;
      }

      #login form p.submit{
         margin-top: 15px !important;
      }

      .login #backtoblog a, .login #nav a{
         color: #eee !important;
      }

      .wp-core-ui .button-primary{
         background: #EF4929 !important;
         border-color: #EF4929 !important;
      }

      .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary:focus{
         box-shadow: 0 0 0 1px #fff, 0 0 0 3px #EF4929 !important;
      }

      input[type=text]:focus, input[type=password]:focus, input[type=checkbox]:focus{
         border-color: #EF4929 !important;
         box-shadow: 0 0 0 1px #EF4929 !important;
      }
   </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );