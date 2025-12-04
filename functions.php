<?php
/**
 * functions.php
 * @package WordPress
 * @subpackage Fynode
 * @since Fynode 1.1.2
 * 
 */

/*************************************************
## Admin style and scripts  
*************************************************/ 
function fynode_admin_styles() {
	wp_enqueue_style('fynode-klbtheme',     get_template_directory_uri() .'/assets/css/admin/klbtheme.css');
	wp_register_style( 'fynode-klbtheme-icons', 	get_template_directory_uri() .'/assets/css/klbtheme.css', false, '1.0');
	wp_register_style( 'fynode-klbtheme-social', 	get_template_directory_uri() .'/assets/css/klbtheme-social.css', false, '1.0');
}
add_action('admin_enqueue_scripts', 'fynode_admin_styles');

 /*************************************************
## Fynode Fonts
*************************************************/
function fynode_fonts_url() {
	$fonts_url = '';

	$allfont = array();
	
	$inter 		= '"Inter", sans-serif';

	$allfont[] = isset(get_theme_mod('fynode_body_typography', [])['font-family']) ? get_theme_mod('fynode_body_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('fynode_heading_typography', [])['font-family']) ? get_theme_mod('fynode_heading_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('fynode_menu_typography', [])['font-family']) ? get_theme_mod('fynode_menu_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('fynode_form_typography', [])['font-family']) ? get_theme_mod('fynode_form_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('fynode_button_typography', [])['font-family']) ? get_theme_mod('fynode_button_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('fynode_price_typography', [])['font-family']) ? get_theme_mod('fynode_price_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('fynode_product_name_typography', [])['font-family']) ? get_theme_mod('fynode_product_name_typography', [])['font-family'] :'';
	$allfont[] = isset(get_theme_mod('fynode_topbar_typography', [])['font-family']) ? get_theme_mod('fynode_topbar_typography', [])['font-family'] :'';
	
	$font_families = array();
	
	
	if(in_array($inter, $allfont) || !array_filter($allfont)) {
		$font_families[] = 'Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900';
	}
	
	if(in_array($inter, $allfont) || !array_filter($allfont)) {
		$query_args = array( 
			'family' => rawurldecode( implode( '&family=', $font_families ) ), 
			'subset' => rawurldecode( 'latin,latin-ext' ), 
		); 
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css2' );
	}
	
	return esc_url_raw( $fonts_url );
}

/*************************************************
## Styles and Scripts
*************************************************/ 
define('FYNODE_INDEX_CSS', 	  get_template_directory_uri()  . '/assets/css');
define('FYNODE_INDEX_JS', 	  get_template_directory_uri()  . '/assets/js');

function fynode_scripts() {

	if ( is_admin_bar_showing() ) {
		wp_enqueue_style( 'fynode-klbtheme', FYNODE_INDEX_CSS . '/admin/klbtheme.css', false, '1.0');    
	}	

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
	wp_enqueue_style( 'bootstrap-min', 				FYNODE_INDEX_CSS . '/bootstrap.min.css', false, '1.0');
	wp_enqueue_style( 'slick', 						FYNODE_INDEX_CSS . '/slick.css', false, '1.0');
	wp_enqueue_style( 'fynode-klbtheme-social', 	FYNODE_INDEX_CSS . '/klbtheme-social.css', false, '1.0');
	wp_enqueue_style( 'fynode-klbtheme-icons', 		FYNODE_INDEX_CSS . '/klbtheme.css', false, '1.0');
	wp_enqueue_style( 'magnific-popup', 			FYNODE_INDEX_CSS . '/magnific-popup.css', false, '1.0');
	wp_enqueue_style( 'fynode-base', 				FYNODE_INDEX_CSS . '/base.css', false, '1.0');
	wp_style_add_data( 'fynode-base', 'rtl', 'replace' );
	wp_enqueue_style( 'fynode-font-url',  					fynode_fonts_url(), array(), null );
	wp_enqueue_style( 'fynode-style',         	get_stylesheet_uri() );
	wp_style_add_data( 'fynode-style', 'rtl', 'replace' );

	$mapkey = get_theme_mod('fynode_mapapi');

	wp_enqueue_script( 'bootstrap-bundle',    	     FYNODE_INDEX_JS . '/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'moment-min',    	      	 FYNODE_INDEX_JS . '/moment.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'moment-timezone',    	     FYNODE_INDEX_JS . '/moment-timezone.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'jquery-countdown',    	   	 FYNODE_INDEX_JS . '/jquery.countdown.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'jquery-magnific-popup',    	 FYNODE_INDEX_JS . '/jquery.magnific-popup.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'slick-min',    	    	 	 FYNODE_INDEX_JS . '/slick.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'hover-slider',    	    	 FYNODE_INDEX_JS . '/hover-slider.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'fynode-cartquantity',    	 FYNODE_INDEX_JS . '/custom/cartquantity.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'fynode-countdown',        	 FYNODE_INDEX_JS . '/custom/countdown.js', array('jquery'), '1.0', true);
	wp_register_script( 'fynode-flex-thumbs',      	 FYNODE_INDEX_JS . '/custom/flex-thumbs.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'fynode-siteslider',    	     FYNODE_INDEX_JS . '/custom/siteslider.js', array('jquery'), '1.0', true);
	wp_register_script( 'fynode-loginform',   		 FYNODE_INDEX_JS . '/custom/loginform.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'fynode-productquantity',     FYNODE_INDEX_JS . '/custom/productquantity.js', array('jquery'), '1.0', true);	
	wp_register_script( 'fynode-deliverymodal',   	 FYNODE_INDEX_JS . '/custom/deliverymodal.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'fynode-producthover',      	 FYNODE_INDEX_JS . '/custom/producthover.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'fynode-draweranimation',     FYNODE_INDEX_JS . '/custom/draweranimation.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'fynode-layered-dropdown',    FYNODE_INDEX_JS . '/custom/layered-dropdown.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'bundle',    	    	 	 FYNODE_INDEX_JS . '/bundle.js', array('jquery'), '1.0', true);

	
}
add_action( 'wp_enqueue_scripts', 'fynode_scripts' );

/*************************************************
## Theme Setup
*************************************************/ 

if ( ! isset( $content_width ) ) $content_width = 960;

function fynode_theme_setup() {
	
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-formats', array('gallery', 'audio', 'video'));
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'woocommerce', array('gallery_thumbnail_image_width' => 99,) );
	load_theme_textdomain( 'fynode', get_template_directory() . '/languages' );
	remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'fynode_theme_setup' );

/*************************************************
## Load plugin textdomains at init
*************************************************/

function fynode_load_plugin_textdomains() {

        $locale  = determine_locale();
        $plugins = array(
                'kirki'       => WP_LANG_DIR . '/plugins/kirki-' . $locale . '.mo',
                'fynode-core' => WP_LANG_DIR . '/plugins/fynode-core-' . $locale . '.mo',
        );

        foreach ( $plugins as $domain => $mofile ) {
                if ( file_exists( $mofile ) ) {
                        load_textdomain( $domain, $mofile );
                }
        }
}
add_action( 'init', 'fynode_load_plugin_textdomains' );

/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/

require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'fynode_register_required_plugins' );

function fynode_register_required_plugins() {

	$url = 'https://klbtheme.com/fynode/plugins/';
	$mainurl = 'https://klbtheme.com/plugins/';

	$plugins = array(
		
        array(
            'name'                  => esc_html__('Meta Box','fynode'),
            'slug'                  => 'meta-box',
        ),

        array(
            'name'                  => esc_html__('Contact Form 7','fynode'),
            'slug'                  => 'contact-form-7',
        ),
		
        array(
            'name'                  => esc_html__('Kirki','fynode'),
            'slug'                  => 'kirki',
        ),
		
		array(
            'name'                  => esc_html__('MailChimp Subscribe','fynode'),
            'slug'                  => 'mailchimp-for-wp',
        ),
		
        array(
            'name'                  => esc_html__('Elementor','fynode'),
            'slug'                  => 'elementor',
            'required'              => true,
        ),
		
        array(
            'name'                  => esc_html__('WooCommerce','fynode'),
            'slug'                  => 'woocommerce',
            'required'              => true,
        ),

        array(
            'name'                  => esc_html__('Fynode Core','fynode'),
            'slug'                  => 'fynode-core',
            'source'                => $url . 'fynode-core.zip',
            'required'              => true,
            'version'               => '1.1.1',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),

        array(
            'name'                  => esc_html__('Envato Market','fynode'),
            'slug'                  => 'envato-market',
            'source'                => $mainurl . 'envato-market.zip',
            'required'              => true,
            'version'               => '2.0.12',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),


	);

	$config = array(
		'id'           => 'fynode',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

/*************************************************
## Fynode Register Menu 
*************************************************/

function fynode_register_menus() {
	register_nav_menus( array( 'main-menu' 	   => esc_html__('Primary Navigation Menu','fynode')) );
	
	$canvasbottommenu = get_theme_mod('fynode_canvas_bottom_menu','0');
	$topleftmenu = get_theme_mod('fynode_top_left_menu','0');
	$toprightmenu = get_theme_mod('fynode_top_right_menu','0');
	$sidebarmenu = get_theme_mod('fynode_header_sidebar','0');
	$mainrightmenu = get_theme_mod('fynode_main_right_menu','0');
	
	if($canvasbottommenu == '1'){
	register_nav_menus( array( 'canvas-bottom' 	   => esc_html__('Canvas Bottom Menu','fynode')) );
	}
	
	if($topleftmenu == '1'){
		register_nav_menus( array( 'top-left-menu'     => esc_html__('Top Left Menu','fynode')) );
	}
	
	if($toprightmenu == '1'){
		register_nav_menus( array( 'top-right-menu'     => esc_html__('Top Right Menu','fynode')) );
	}
	
	if($sidebarmenu == '1'){
		register_nav_menus( array( 'sidebar-menu'       => esc_html__('Sidebar Menu','fynode')) );
	}
	
}
add_action('init', 'fynode_register_menus');

/*************************************************
## Excerpt More
*************************************************/ 

function fynode_excerpt_more($more) {
  global $post;
  return '<div class="klb-readmore post-buttons"><a class="btn btn-black btn-rounded" href="'. esc_url(get_permalink($post->ID)) . '">' . esc_html__('Read More', 'fynode') . ' <i class="klbth-icon-right-arrow"></i></a></div>';
  }
 add_filter('excerpt_more', 'fynode_excerpt_more');
 
/*************************************************
## Word Limiter
*************************************************/ 
function fynode_limit_words($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}

/*************************************************
## Widgets
*************************************************/ 

function fynode_widgets_init() {
	register_sidebar( array(
	  'name' => esc_html__( 'Blog Sidebar', 'fynode' ),
	  'id' => 'blog-sidebar',
	  'description'   => esc_html__( 'These are widgets for the Blog page.','fynode' ),
	  'before_widget' => '<div class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Shop Sidebar', 'fynode' ),
	  'id' => 'shop-sidebar',
	  'description'   => esc_html__( 'These are widgets for the Shop.','fynode' ),
	  'before_widget' => '<div class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer First Column', 'fynode' ),
	  'id' => 'footer-1',
	  'description'   => esc_html__( 'These are widgets for the Footer.','fynode' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Second Column', 'fynode' ),
	  'id' => 'footer-2',
	  'description'   => esc_html__( 'These are widgets for the Footer.','fynode' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Third Column', 'fynode' ),
	  'id' => 'footer-3',
	  'description'   => esc_html__( 'These are widgets for the Footer.','fynode' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Fourth Column', 'fynode' ),
	  'id' => 'footer-4',
	  'description'   => esc_html__( 'These are widgets for the Footer.','fynode' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );
}
add_action( 'widgets_init', 'fynode_widgets_init' );
 
/*************************************************
## Fynode Comment
*************************************************/

if ( ! function_exists( 'fynode_comment' ) ) :
 function fynode_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
   case 'pingback' :
   case 'trackback' :
  ?>

   <article class="post pingback">
   <p><?php esc_html_e( 'Pingback:', 'fynode' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'fynode' ), ' ' ); ?></p>
  <?php
    break;
   default :
  ?>
	
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div id="div-comment-<?php comment_ID(); ?>">
			<article class="comment-body klb-comment-body">
					<footer class="comment-meta">
						<div class="comment-author vcard">
							<img src="<?php echo get_avatar_url( $comment, 90 ); ?>" alt="<?php comment_author(); ?>" class="avatar">
							<b class="fn"> <a class="url" href="#"><?php comment_author(); ?></a></b>
							<div class="comment-metadata"><a href="#">
							  <time><?php comment_date(); ?></time></a>
							</div>
						</div>
					</footer>
					<div class="comment-content">
						<div class="klb-post">
							<?php comment_text(); ?>
							<?php if ( $comment->comment_approved == '0' ) : ?>
							<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'fynode' ); ?></em>
							<?php endif; ?>
						</div>
					</div>
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- reply -->
			</article>
	    </div>
	</li>
	

	
  <?php
    break;
  endswitch;
 }
endif;

/*************************************************
## Fynode Widget Count Filter
 *************************************************/

function fynode_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="catcount">(', $links);
  $links = str_replace(')', ')</span>', $links);
  return fynode_sanitize_data($links);
}
add_filter('wp_list_categories', 'fynode_cat_count_span');
 
function fynode_archive_count_span( $links ) {
	$links = str_replace( '</a>&nbsp;(', '</a><span class="catcount">(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return fynode_sanitize_data($links);
}
add_filter( 'get_archives_link', 'fynode_archive_count_span' );


/*************************************************
## Pingback url auto-discovery header for single posts, pages, or attachments
 *************************************************/
function fynode_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'fynode_pingback_header' );

/*************************************************
## Nav Description
 *************************************************/
function fynode_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<span class="badge ' . $item->description . '">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
    }
 
    return fynode_sanitize_data($item_output);
}
add_filter( 'walker_nav_menu_start_el', 'fynode_nav_description', 10, 4 );

/************************************************************
## DATA CONTROL FROM PAGE METABOX OR ELEMENTOR PAGE SETTINGS
*************************************************************/
function fynode_page_settings( $opt_id){
	
	if ( class_exists( '\Elementor\Core\Settings\Manager' ) ) {
		// Get the current post id
		$post_id = get_the_ID();

		// Get the page settings manager
		$page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

		// Get the settings model for current post
		$page_settings_model = $page_settings_manager->get_model( $post_id )->get_data('settings');

		// Retrieve the color we added before
		return isset($page_settings_model['fynode_elementor_'.$opt_id]) ? $page_settings_model['fynode_elementor_'.$opt_id] : false;
	}
}

/************************************************************
## Elementor Register Location
*************************************************************/
function fynode_register_elementor_locations( $elementor_theme_manager ) {

    $elementor_theme_manager->register_location( 'header' );
    $elementor_theme_manager->register_location( 'footer' );
    $elementor_theme_manager->register_location( 'single' );
	$elementor_theme_manager->register_location( 'archive' );

}
add_action( 'elementor/theme/register_locations', 'fynode_register_elementor_locations' );

/************************************************************
## Elementor Get Templates
*************************************************************/
function fynode_get_elementor_template($template_id){
	if($template_id){

		$frontend = \Elementor\Plugin::instance()->frontend;
	    printf( '<div class="fynode-elementor-template template-'.esc_attr($template_id).'">%1$s</div>', $frontend->get_builder_content_for_display( $template_id, true ) );	
	   
	   if ( class_exists( '\Elementor\Plugin' ) ) {
	        $elementor = \Elementor\Plugin::instance();
	        $elementor->frontend->enqueue_styles();
			$elementor->frontend->enqueue_scripts();
	    }
	
	    if ( class_exists( '\ElementorPro\Plugin' ) ) {
	        $elementor_pro = \ElementorPro\Plugin::instance();
	        $elementor_pro->enqueue_styles();
	    }

	}

}
add_action( 'fynode_before_main_shop', 	 'fynode_get_elementor_template', 10);
add_action( 'fynode_after_main_shop', 	 'fynode_get_elementor_template', 10);
add_action( 'fynode_before_main_footer', 'fynode_get_elementor_template', 10);
add_action( 'fynode_after_main_footer',  'fynode_get_elementor_template', 10);
add_action( 'fynode_before_main_header', 'fynode_get_elementor_template', 10);
add_action( 'fynode_after_main_header',  'fynode_get_elementor_template', 10);

/************************************************************
## Do Action for Templates and Product Categories
*************************************************************/
function fynode_do_action($hook){
	
	if ( !class_exists( 'woocommerce' ) ) {
		return;
	}

	$categorytemplate = get_theme_mod('fynode_elementor_template_each_shop_category');
	if(is_product_category()){
		if($categorytemplate && array_search(get_queried_object()->term_id, array_column($categorytemplate, 'category_id')) !== false){
			foreach($categorytemplate as $c){
				if($c['category_id'] == get_queried_object()->term_id){
					do_action( $hook, $c[$hook.'_elementor_template_category']);
				}
			}
		} else {
			do_action( $hook, get_theme_mod($hook.'_elementor_template'));
		}
	} else {
		do_action( $hook, get_theme_mod($hook.'_elementor_template'));
	}
	
}

/*************************************************
## Fynode Get Image
*************************************************/
function fynode_get_image($image){
	$app_image = ! wp_attachment_is_image($image) ? $image : wp_get_attachment_url($image);
	
	return esc_html($app_image);
}

/*************************************************
## Fynode Get options
*************************************************/
function fynode_get_option(){	
	$getopt  = isset( $_GET['opt'] ) ? $_GET['opt'] : '';

	return esc_html($getopt);
}

/*************************************************
## Fynode Body Class
*************************************************/ 
function fynode_body_input_class( $classes ) {
	
	if(get_theme_mod('fynode_body_input_type') == 'filled') {
		$classes[] = 'input-variation-filled';
	} else {
		$classes[] = 'input-variation-default';
	}	
	
	return $classes;
}
add_filter('body_class', 'fynode_body_input_class');
	
/*************************************************
## Fynode Custom 404 Page
*************************************************/ 
if ( ! function_exists( 'fynode_custom_404_page' ) ) {
	function fynode_custom_404_page( $template ) {
		global $wp_query;
		$custom_404 = get_theme_mod('fynode_404_page');

		if ( $custom_404 === 'default' || empty( $custom_404 ) ) {
			return $template;
		}

		$wp_query->query( 'page_id=' . $custom_404 );
		$wp_query->the_post();
		$template = get_page_template();
		rewind_posts();

		return $template;
	}

	add_filter( '404_template', 'fynode_custom_404_page', 999 );
}

/*************************************************
## Fynode FT
*************************************************/ 
if ( ! function_exists( 'fynode_ft' ) ) {
	function fynode_ft() {
		return;
	}
}

/*************************************************
## Fynode Theme options
*************************************************/
require_once get_template_directory() . '/includes/metaboxes.php';
require_once get_template_directory() . '/includes/woocommerce.php';
require_once get_template_directory() . '/includes/woocommerce-filter.php';
require_once get_template_directory() . '/includes/pjax/filter-functions.php';
require_once get_template_directory() . '/includes/sanitize.php';
require_once get_template_directory() . '/includes/merlin/setup-wizard.php';
require_once get_template_directory() . '/includes/header/main-header.php';
require_once get_template_directory() . '/includes/footer/main_footer.php';
require_once get_template_directory() . '/includes/woocommerce/tab-ajax.php';