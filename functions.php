<?php
/**
 * maraca functions and definitions
 *
 * @package maraca
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'maraca_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function maraca_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on maraca, use a find and replace
	 * to change 'maraca' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'maraca', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
		add_image_size( 'thumb_agenda_home', 550, 230 );
		add_image_size( 'thumb_portfolio', 280, 280, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'maraca' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( /*'aside', 'image', 'video', 'quote', */'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'maraca_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // maraca_setup
add_action( 'after_setup_theme', 'maraca_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function maraca_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'maraca' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'maraca_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function maraca_scripts() {
	wp_enqueue_style( 'maraca-style', get_stylesheet_uri() );
	wp_enqueue_style( 'twentyeleven-style', get_stylesheet_directory_uri() . '/twentyeleven-style.css' );

	wp_enqueue_script( 'maraca-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'jquery-imagefill', get_template_directory_uri() . '/js/jquery-imagefill.js', array(), '', true );
	wp_enqueue_script( 'jquery.imagesloaded.min', get_template_directory_uri() . '/js/jquery.imagesloaded.min.js', array(), '', true );

	wp_enqueue_script( 'maraca-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'maraca-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'maraca_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

/**
 * CPT Projetos.
 */
require get_template_directory() . '/custom-projetos.php';

/**
 * CPT Agenda.
 */
require get_template_directory() . '/requires-agenda.php';

/**
* Imprime o Thumbnail no background da DIV
*
*/
function thumbnail_bg () {
	$get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(800,99999), false, '' );
	echo 'style="background: url('.$get_post_thumbnail[0].' ) center center"';
}

/**
* Função para Thumb-Default.
* Use thumb_default();
*/
function thumb_default() {
	$endereco_thumb_default = get_bloginfo( 'stylesheet_directory' ) . '/images/thumb-default.jpg';
	echo '<img src='.$endereco_thumb_default.' />';
}

function id_por_titulo( $titulo ) {
	$o_id = get_page_by_title( $titulo );
	$o_id = $o_id->ID;
	return $o_id; 
}

function id_por_slug( $slug ) {
    $page = get_page_by_path( $slug );
    if ( $page ) {
        return $page->ID;
    } else {
        return null;
    }
}


/**
* Minhas Opções
*/
require( get_stylesheet_directory() . '/opcoes/opcoes.php' );

