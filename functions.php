<?php

function fast_fourier_transform_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'fast_fourier_transform_add_editor_styles' );

function fast_fourier_transform_setup() {

	load_theme_textdomain( 'fast-fourier-transform', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );
	
	add_theme_support( 'post-thumbnails' );
	
	$chargs = array(
		'width' => 980,
		'height' => 300,
		'uploads' => true,
	);
	
	if ( ! isset( $content_width ) ) $content_width = 900;
	
	add_theme_support( 'custom-header', $chargs );
	
	set_post_thumbnail_size( 825, 510, true );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fast-fourier-transform' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

}
add_action( 'after_setup_theme', 'fast_fourier_transform_setup' );

function fast_fourier_transform_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area Bottom', 'fast-fourier-transform' ),
		'id'            => 'sidebar',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'fast-fourier-transform' ),
		'before_widget' => '<aside id="%1$s" class="masonry widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fast_fourier_transform_widgets_init' );
 
function fast_fourier_transform_scripts() {

	wp_enqueue_style( 'fast_fourier_transform-style', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'fast_fourier_transform-menu', get_template_directory_uri() . '/css/menu/menu.css' );
	wp_enqueue_style( 'fast_fourier_transform-style-custom', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'fast_fourier_transform-core-style', get_template_directory_uri() . '/css/wp_core.css' );
	wp_enqueue_style( 'fast_fourier_transform-style-mobile-550', get_template_directory_uri() . '/css/mobile550.css' );

	wp_enqueue_script( 'fast_fourier_transform-lines', get_template_directory_uri() . '/js/lines.js', array( 'jquery' ) );
	wp_enqueue_script( 'fast_fourier_transform-menu', get_template_directory_uri() . '/js/menu/main-menu.js', array( 'jquery' ) );
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	
}
add_action( 'wp_enqueue_scripts', 'fast_fourier_transform_scripts' );
 
function fast_fourier_transform_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

function fast_fourier_transform_extra_style(){

	?><style>
	
		line{
			stroke: <?PHP echo get_theme_mod('site_line_colour'); ?>;
			stroke-width:2;
		}
	
		html{
			background-color: <?PHP echo get_theme_mod('site_allsite_background_colour'); ?>;
			color: <?PHP echo get_theme_mod('site_alltext_colour'); ?>;
		}
			
		h1,h2,h3,h4,h5,h6{
			color: <?PHP echo get_theme_mod('site_text_colour'); ?>;
		}
		
		a{
			color :  <?PHP echo get_theme_mod('site_alllink_colour'); ?>;
		}
		
		.single a{
			color :  <?PHP echo get_theme_mod('site_postlink_colour'); ?>;
		}
				
		button,
		input[type=submit]{
			background-color:  <?PHP echo get_theme_mod("site_button_colour"); ?>;
			color:  <?PHP echo get_theme_mod("site_button_text_colour"); ?>;
		}
		
		<?PHP
			if(get_theme_mod("navigation")=="fixed"){
		?>
			#header-area-bottom{
				position:fixed;
				bottom: 0px;
				margin: 0 auto;
				width: 100%;
				background-color:#000;
				border-top:1px solid #fff;
				z-index:100;
			}
		
		<?PHP
			}
		?>
		
	</style><?PHP

}
add_action("wp_head", "fast_fourier_transform_extra_style");

function fast_fourier_transform_init(){

	if(!get_option("fast_fourier_transform_setup_theme")){
	
		set_theme_mod('site_allsite_background_colour','#000000');
		set_theme_mod('site_alllink_colour','#ffffff');
		set_theme_mod('site_line_colour','#ffffff');
		set_theme_mod('site_post_link_colour','#ff0000');
		set_theme_mod('site_alltext_colour','#eeeeee');
		set_theme_mod('site_button_colour','#ffffff');
		set_theme_mod('site_button_text_colour','#000000');
		set_theme_mod('pagination','on');
		set_theme_mod('search','on');
		set_theme_mod('author','on');
		set_theme_mod('comments','on');
		set_theme_mod('sitename','bottom');
		set_theme_mod('menu','middle');
		set_theme_mod('navigation','fixed');
		set_theme_mod('home','center');

		add_option("fast_fourier_transform_setup_theme", 1);
	
	}

}
add_action("init", "fast_fourier_transform_init");

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/menus/Walker_Menu.php';
require get_template_directory() . '/inc/menus/Walker_Menu_Slide.php';
