<?php
/**
 * jadonai functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jadonai
 */
define("JADONAI_CSS", get_template_directory_uri() . "/css/" );
define("JADONAI_INC", get_template_directory_uri() . "/inc/" );
define("JADONAI_DURI", get_template_directory_uri() ."/" );
define("JADONAI_JS", get_template_directory_uri() . "/js/" );


if ( ! function_exists( 'jadonai_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jadonai_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jadonai, use a find and replace
	 * to change 'jadonai' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jadonai', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add woocommerce support
	add_theme_support( 'woocommerce' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Declare Thumbnal Size
	add_image_size( 'jadonai-blog', 394, 237, true );
	add_image_size( 'jadonai-single-blog', 848, 414, true );
	add_image_size( 'jadonai-rep-wdgt', 70, 62, true );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'mainmenu' => esc_html__( 'Main Menu', 'jadonai' ),
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

 
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jadonai_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );


	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', jadonai_fonts_url() ) );


}
endif;
add_action( 'after_setup_theme', 'jadonai_setup' );


/**
 *	Register Fonts
 */
function jadonai_fonts_url() {
    $jadonai_font = '';
     
	$droid_sans = _x( 'on', 'Droid Sans font: on or off', 'jadonai' );
	$raleway = _x( 'on', 'Raleway font: on or off', 'jadonai' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'jadonai' );
	 
	if ( 'off' !== $open_sans || 'off' !== $raleway ) {
		$font_families = array();
 
		if ( 'off' !== $raleway ) {
		$font_families[] = 'Raleway:400,100,200,300,500,600,700,800,900';
		}
		 
		if ( 'off' !== $open_sans ) {
		$font_families[] = 'Open Sans:400,300,600,700,800';
		}
		 
		$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
		);

		$jadonai_font = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
    return esc_url_raw( $jadonai_font );
}

/**
 * jadonai nav menu
 */ 
function jadonai_main_menu(){
	wp_nav_menu( array(
		'theme_location'    => 'mainmenu',
		'depth'             => 3,
		'container'         => false,
		'menu_id'        	=> '',
		'menu_class'        => '',
		'fallback_cb'       => 'jadonai_default_menu'
	));
}


/**
 * menu fallback
 */ 
if(is_user_logged_in()):
	function jadonai_default_menu() {
		?>
	    <ul>                  
	    	<li><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php esc_html_e( 'Add Menu', 'jadonai' ); ?></a></li>
		</ul>
		<?php
	}
endif;


/**
 * jadonai header search form
 */ 
function jadonai_header_search(){
?>
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div id="custom-search-input">
            <div class="input-group">
                <input type="text" class="search-query form-control" value="<?php echo get_search_query(); ?>" name="s"  placeholder="<?php esc_attr_e( 'Search ...', 'jadonai' ) ?>" />
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="button">
                        <span><i class="fa fa-search" aria-hidden="true"></i></span>
                    </button>
                </span>
            </div>
        </div>
    </form>
<?php
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jadonai_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jadonai_content_width', 640 );
}
add_action( 'after_setup_theme', 'jadonai_content_width', 0 );



/**
 * Includes All Files.
 */ 
// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';
// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';
// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';
// Customizer additions. 
require get_template_directory() . '/inc/customizer.php';
// Load Jetpack compatibility file. 
require get_template_directory() . '/inc/jetpack.php';
// Load Register Widgets.
require get_template_directory() . '/inc/widgets/register-widgets.php';
// Load Jadonai Framework Options Files. 
require get_template_directory() . '/inc/jadonai-framework.php';
// Load Jadonai Framework Functions Files. 
require get_template_directory() . '/inc/jadonai-framework-functions.php'; 
// Load Jadonai Metabox Files. 
require get_template_directory() . '/inc/jadonai-metabox.php';
// Load Jadonai Tgm Plugns Load Files. 
require get_template_directory() . '/inc/required-plugins.php';





/**
 * Enqueue scripts and styles.
 */
function jadonai_scripts() {
	global $jadonai;
	$jadonai_option = new Victor_Options();
	// LOAD FONTS
	 wp_enqueue_style( 'jadonai-fonts', jadonai_fonts_url(), array(), '1.0.0' );

	/**
	 * LOAD CSS
	 */ 
	wp_enqueue_style( 'bootstrap', JADONAI_CSS . 'bootstrap.min.css' );
	wp_enqueue_style( 'animate', JADONAI_CSS . 'animate.css' );
	wp_enqueue_style( 'jquery-ui', JADONAI_CSS . 'jquery-ui.min.css' );
	wp_enqueue_style( 'meanmenu', JADONAI_CSS . 'meanmenu.min.css' );
	wp_enqueue_style( 'owl-carousel', JADONAI_CSS . 'owl.carousel.css' );
	wp_enqueue_style( 'font-awesome', JADONAI_CSS . 'font-awesome.min.css' );
	wp_enqueue_style( 'flaticon', JADONAI_CSS . 'flaticon.css' );
	wp_enqueue_style( 'nivo-slider', JADONAI_INC . 'custom-slider/css/nivo-slider.css' );
	wp_enqueue_style( 'nivo-preview', JADONAI_INC . 'custom-slider/css/preview.css' );
	wp_enqueue_style( 'jadonai-style', get_stylesheet_uri() ); 
	wp_enqueue_style( 'jadonai-skype', JADONAI_DURI . '/multicolor-css/skype-color.css' );
	wp_enqueue_style( 'jadonai-red', JADONAI_DURI . '/multicolor-css/red-color.css' );
	wp_enqueue_style( 'jadonai-green', JADONAI_DURI . '/multicolor-css/green-color.css' );
	wp_enqueue_style( 'jadonai-blue', JADONAI_DURI . '/multicolor-css/blue-color.css' );
	wp_enqueue_style( 'jadonai-responsive', JADONAI_CSS . 'responsive.css' );
	wp_enqueue_style( 'jadonai-advanced', JADONAI_CSS . 'advanced.css' );


	wp_enqueue_script( 'modernizr', JADONAI_JS. 'vendor/modernizr-2.8.3.min.js', array(), '20151215', false );
	wp_enqueue_script( 'bootstrap', JADONAI_JS. 'bootstrap.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'owl-carousel', JADONAI_JS. 'owl.carousel.min.js', array(), '20151215', true );
	wp_enqueue_script( 'meanmenu', JADONAI_JS. 'jquery.meanmenu.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery-ui', JADONAI_JS. 'jquery-ui.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wow', JADONAI_JS. 'wow.min.js', array(), '20151215', true );
	wp_enqueue_script( 'counterup', JADONAI_JS. 'jquery.counterup.min.js', array(), '20151215', true );
	wp_enqueue_script( 'waypoints', JADONAI_JS. 'waypoints.min.js', array(), '20151215', true );
	wp_enqueue_script( 'jadonai-plugins', JADONAI_JS. 'plugins.js', array(), '20151215', true );
	wp_enqueue_script( 'nivo-slider', JADONAI_INC . 'custom-slider/js/jquery.nivo.slider.js', array(), '20151215', true );
	wp_enqueue_script( 'nivo-custom', JADONAI_INC . 'custom-slider/home.js', array(), '20151215', true );
	wp_enqueue_script( 'jqinstapics', JADONAI_JS . 'jqinstapics.js', array(), '20151215', true );
	wp_enqueue_script( 'jadonai-main', JADONAI_JS . 'main.js', array(), '20151215', true );


	wp_enqueue_script( 'jadonai-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'jadonai-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


    /**
     *  Custom css
     */

    $jadonai_custom_css = ""; 
    if(isset($jadonai['css-style'])){
    	$jadonai_adv_css = $jadonai['css-style'];
    }else{
    	$jadonai_adv_css = "";
    }

	if(isset($jadonai['logo-up']['url']) && (''!=$jadonai['logo-up']['url'])){
	 	$jadonai_logo_img = $jadonai['logo-up']['url'];
	    $jadonai_custom_css .= "
			.mean-container .mean-bar::after{
				background:transparent url({$jadonai_logo_img}) no-repeat scroll 0 0;
				background-size: 180px 45px;
			}
	     ";
	}
	if( (isset($jadonai['logo-width']) && (''!=$jadonai['logo-width'])) &&  (isset($jadonai['logo-height']) && (''!=$jadonai['logo-height']))  ){
	 	$jadonai_logo_wd = $jadonai['logo-width'];
	 	$jadonai_logo_ht = $jadonai['logo-height'];
	    $jadonai_custom_css .= "
		    .mean-container .mean-bar::after{
		    	width:{$jadonai_logo_wd};
		    	height:{$jadonai_logo_ht};
		    }
			.mean-container .mean-bar::after{ 
				background-size: {$jadonai_logo_wd} {$jadonai_logo_ht};
			}
	     ";
	}
	if(isset($jadonai['footer-txt-clr']) && (''!=$jadonai['footer-txt-clr'])){
	 	$jadonai_foter_txt_clr = $jadonai['footer-txt-clr'];
	    $jadonai_custom_css .= "
	        footer .footer-top-area .main-footer .single-footer .footer-social-media-area ul li a{
	            border-color:  {$jadonai_foter_txt_clr};  
	        }
	        footer .footer-top-area .main-footer .single-footer p,
	        footer .footer-top-area .main-footer .widget_nav_menu .single-footer ul li a,
	        footer .footer-top-area .main-footer .footer-three ul li,
	        footer .footer-top-area .main-footer .single-footer h3 {
	            color: {$jadonai_foter_txt_clr}; 
	        }
	     ";
	}
	if(isset($jadonai['footer-ico-clr']) && (''!=$jadonai['footer-ico-clr'])){
	 	$jadonai_foter_ico_clr = $jadonai['footer-ico-clr'];
	    $jadonai_custom_css .= "
            footer .footer-top-area .main-footer .single-footer .footer-social-media-area ul li a:hover{
                background-color:  {$jadonai_foter_ico_clr}; 
                border-color: {$jadonai_foter_ico_clr}; 
            }
            footer .footer-top-area .main-footer .widget_nav_menu .single-footer ul li i,
            footer .footer-top-area .main-footer .footer-three ul li i,
            footer .footer-top-area .main-footer .single-footer .footer-social-media-area ul li a{
                color:  {$jadonai_foter_ico_clr}; 
            }
	     ";
	}
	if(isset($jadonai['call-action-ttl-clr']) && (''!=$jadonai['call-action-ttl-clr'])){
	 	$jadonai_foter_call_action = $jadonai['call-action-ttl-clr'];
	    $jadonai_custom_css .= "
            footer .footer-top-area .footer-top p {
                color: {$jadonai_foter_call_action}; 
            }
	     ";
	}
	if(isset($jadonai['call-action-phn-clr']) && (''!=$jadonai['call-action-phn-clr'])){
	 	$jadonai_foter_call_action_phn = $jadonai['call-action-phn-clr'];
	    $jadonai_custom_css .= "
            footer .footer-top-area .footer-top h2{
                color:{$jadonai_foter_call_action_phn}; 
            }
	     ";
	}
	if(isset($jadonai['call-action-icon-clr']) && (''!=$jadonai['call-action-icon-clr'])){
	 	$jadonai_foter_call_action_icon = $jadonai['call-action-icon-clr'];
	    $jadonai_custom_css .= "
            footer .footer-top-area .footer-top h2 i{
                color: {$jadonai_foter_call_action_icon};
            }
	     ";
	}
	if(isset($jadonai['copyright-clr']) && (''!=$jadonai['copyright-clr'])){
	 	$jadonai_foter_call_copyright = $jadonai['copyright-clr'];
	    $jadonai_custom_css .= "
            .footer-bottom-area .text-center p{
                color: {$jadonai_foter_call_copyright};
            }
	     ";
	}
	if(isset($jadonai['copyright-bgc']) && (''!=$jadonai['copyright-bgc'])){
	 	$jadonai_foter_copyright_bgc = $jadonai['copyright-bgc'];
	    $jadonai_custom_css .= "
            footer .footer-bottom-area {
                background:  {$jadonai_foter_copyright_bgc};
            }
	     ";
	}
	if(isset($jadonai['footer-txt-bgimg']['url']) && (''!=$jadonai['footer-txt-bgimg']['url'])){
	 	$jadonai_foter_footer_bgimg = $jadonai['footer-txt-bgimg']['url'];
	    $jadonai_custom_css .= "
             footer.ftr{
                background: url( {$jadonai_foter_footer_bgimg}) no-repeat;
            }
	     ";
	}
	if(isset($jadonai['subscribe-bgc']) && (''!=$jadonai['subscribe-bgc'])){
	 	$jadonai_foter_subscribe = $jadonai['subscribe-bgc'];
	    $jadonai_custom_css .= "
            .call-top-action { 
                background: {$jadonai_foter_subscribe};
            }
	     ";
	}
	if(isset($jadonai['subscribe-btnbgc']) && (''!=$jadonai['subscribe-btnbgc'])){
	 	$jadonai_foter_subscribe_btnbgc = $jadonai['subscribe-btnbgc'];
	    $jadonai_custom_css .= "
            .call-top-action .subscribe-now a{ 
                border-color:  {$jadonai_foter_subscribe_btnbgc};
            }
	     ";
	}
	if(isset($jadonai['subscribe-fclr']) && (''!=$jadonai['subscribe-fclr'])){
	 	$jadonai_foter_subscribe_fclr = $jadonai['subscribe-fclr'];
	    $jadonai_custom_css .= "
            .call-top-action .subscribe-text h2{ 
                color:  {$jadonai_foter_subscribe_fclr};
            }
	     ";
	}
	if(isset($jadonai['subscribe-btnfclr']) && (''!=$jadonai['subscribe-btnfclr'])){
	 	$jadonai_foter_subscribe_btnfclr = $jadonai['subscribe-btnfclr'];
	    $jadonai_custom_css .= "
            .call-top-action .subscribe-now a{ 
                color: {$jadonai_foter_subscribe_btnfclr};
            }
	     ";
	}
	if(isset($jadonai['subscribe-btnhvbgc']) && (''!=$jadonai['subscribe-btnhvbgc'])){
	 	$jadonai_foter_subscribe_btnhvbgc = $jadonai['subscribe-btnhvbgc'];
	    $jadonai_custom_css .= "
            .call-top-action .subscribe-now a:hover{ 
                border-color:  {$jadonai_foter_subscribe_btnhvbgc};
                background: {$jadonai_foter_subscribe_btnhvbgc};
            }
	     ";
	}
	if(isset($jadonai['back-clr']) && (''!=$jadonai['back-clr'])){
	 	$jadonai_hdr_back_clr = $jadonai['back-clr'];
	    $jadonai_custom_css .= "
            .header-top-area {
                background:{$jadonai_hdr_back_clr};
            }
	     ";
	}
	if(isset($jadonai['icon-bgclr']) && (''!=$jadonai['icon-bgclr'])){
	 	$jadonai_hdr_icon_bgclr = $jadonai['icon-bgclr'];
	    $jadonai_custom_css .= "
            .header-top-area .header-top-left ul li i{
                background: {$jadonai_hdr_icon_bgclr};
            }
	     ";
	}
	if(isset($jadonai['icon-clr']) && (''!=$jadonai['icon-clr'])){
	 	$jadonai_hdr_icon_clr = $jadonai['icon-clr'];
	    $jadonai_custom_css .= "
            .header-top-area .header-top-left ul li i{ 
                color:  {$jadonai_hdr_icon_clr};
            }
	     ";
	}
	if(isset($jadonai['txt-clr']) && (''!=$jadonai['txt-clr'])){
	 	$jadonai_hdr_txt_clr = $jadonai['txt-clr'];
	    $jadonai_custom_css .= "
            .header-top-area .header-top-right ul li,
            .header-top-area .header-top-left ul li{ 
                color:  {$jadonai_hdr_txt_clr}; 
            }
	     ";
	}
	if(isset($jadonai['menu-pos']) && (''!=$jadonai['menu-pos'])){
	 	$jadonai_hdr_menu_pos = $jadonai['menu-pos'];
	    $jadonai_custom_css .= "
           .main-header-area ul#menu-main-menu{
                float: {$jadonai_hdr_menu_pos}; 
            } 
	     ";
	}
	if(isset($jadonai['hdr-bg']) && (''!=$jadonai['hdr-bg'])){
	 	$jadonai_hdr_bg = $jadonai['hdr-bg'];
	    $jadonai_custom_css .= "
            .main-header-area {
                background: {$jadonai_hdr_bg}; 
            }
	     ";
	}
	if(isset($jadonai['menu-clr']) && (''!=$jadonai['menu-clr'])){
	 	$jadonai_hdr_menuclr = $jadonai['menu-clr'];
	    $jadonai_custom_css .= "
             .main-header-area .main-menu ul li a{
                color: {$jadonai_hdr_menuclr};
            }
	     ";
	}
	if(isset($jadonai['menu-hvrclr']) && (''!=$jadonai['menu-hvrclr'])){
	 	$jadonai_hdr_menuhvrclr = $jadonai['menu-hvrclr'];
	    $jadonai_custom_css .= "
            .main-header-area .main-menu ul li:hover a, 
            .main-header-area .main-menu ul .sub-menu .sub-menu li a {
                color:  {$jadonai_hdr_menuhvrclr};
            }
	     ";
	}
	if(isset($jadonai['menu-hvrbgclr']) && (''!=$jadonai['menu-hvrbgclr'])){
	 	$jadonai_hdr_menuhvrbgclr = $jadonai['menu-hvrbgclr'];
	    $jadonai_custom_css .= "
            .main-header-area .main-menu ul li:hover,
            .main-header-area .main-menu ul li ul li{
                background: {$jadonai_hdr_menuhvrbgclr};
            }
	     ";
	}
	if(isset($jadonai['sbmenu-hvrbgclr']) && (''!=$jadonai['sbmenu-hvrbgclr'])){
	 	$jadonai_hdr_sbmenuhvrbgclr = $jadonai['sbmenu-hvrbgclr'];
	    $jadonai_custom_css .= "
            .main-header-area .main-menu ul li ul li:hover{
                background: {$jadonai_hdr_sbmenuhvrbgclr};
            }
	     ";
	}
	if(isset($jadonai['sbmenu-hvrclr']) && (''!=$jadonai['sbmenu-hvrclr'])){
	 	$jadonai_hdr_sbmenuhvrclr = $jadonai['sbmenu-hvrclr'];
	    $jadonai_custom_css .= "
            .main-header-area .main-menu > ul > li > ul > li:hover > a, 
            .main-header-area .main-menu ul .sub-menu .sub-menu li:hover a {
                color: {$jadonai_hdr_sbmenuhvrclr};
            }
	     ";
	}
	if(isset($jadonai['logo-width']) && (''!=$jadonai['logo-width'])){
	 	$jadonai_hdr_logowdth = $jadonai['logo-width'];
	    $jadonai_custom_css .= "
            .main-header-area .logo-area img{
                width: {$jadonai_hdr_logowdth};
            }
	     ";
	}
	if(isset($jadonai['logo-height']) && (''!=$jadonai['logo-height'])){
	 	$jadonai_hdr_logohgt = $jadonai['logo-height'];
	    $jadonai_custom_css .= "
            .main-header-area .logo-area img{ 
                height:{$jadonai_hdr_logohgt};
            }
	     ";
	}

	if(is_page()){
		$jadonai_pgbner = $jadonai_option->pageBanner();
		$jadonai_custom_css .= "
	        .inner-page-header {
	            background: url({$jadonai_pgbner}) no-repeat; 
	        } 
	    "; 
	}elseif(is_home() && is_front_page()){
		$jadonai_bpgbner = $jadonai_option->blogBanner();
		$jadonai_custom_css .= "
	        .inner-page-header {
	            background: url({$jadonai_bpgbner}) no-repeat; 
	        } 
	    "; 
	}elseif(is_search()){
		$jadonai_spgbner = $jadonai_option->searchBanner();
		$jadonai_custom_css .= "
	        .inner-page-header {
	            background: url({$jadonai_spgbner}) no-repeat; 
	        } 
	    "; 
	}elseif(is_archive()){
		$jadonai_arpgbner = $jadonai_option->archiveBanner();
		$jadonai_custom_css .= "
	        .inner-page-header {
	            background: url({$jadonai_arpgbner}) no-repeat; 
	        } 
	    "; 
	}
	if(isset($jadonai['slide-font-size']) && (''!=$jadonai['slide-font-size'])){
	 	$jadonai_slid_fntsz = $jadonai['slide-font-size'];
	    $jadonai_custom_css .= "
	        .slider-area .slider-1 h1 {
	            font-size: {$jadonai_slid_fntsz}; 
	        }
	     ";
	}
	if(isset($jadonai['ftr-clmn']) && (''!=$jadonai['ftr-clmn'])){
	 	$jadonai_ftclm = $jadonai_option->footerColumnWidget();
	    $jadonai_custom_css .= "
            .ftr .footer-top-area .main-footer .regwdgt{
                width: {$jadonai_ftclm};
            }
	     ";
	}

    $jadonai_custom_css .= "{$jadonai_adv_css}";
    wp_add_inline_style( 'jadonai-advanced', $jadonai_custom_css );

    /**
     *  Custom Js
     */
    $jadonai_custom_js = ""; 
    if(isset($jadonai['js-script'])){
    	$jadonai_adv_js = $jadonai['js-script'];
    	$jadonai_custom_js .= "{$jadonai_adv_js}";
    }else{
    	$jadonai_adv_js = "";
    	$jadonai_custom_js .= "{$jadonai_adv_js}";
    }
    wp_add_inline_script( 'jadonai-main', $jadonai_custom_js );

 
	$jadonai_script_params = array( 
	   'autoplay' => $jadonai_option->jadonai_slider_autoplay(), 
	   'speed' => $jadonai_option->jadonai_slider_speed(),
	   'slidespeed' => $jadonai_option->jadonai_sliders_speed(),
	   'seffects' => $jadonai_option->jadonai_slider_effect() 
	);
	wp_localize_script( 'nivo-custom', 'scriptParams', $jadonai_script_params );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jadonai_scripts' );

// widget js
function jadonai_about_us_widgetscript() {
    wp_enqueue_media();
    wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
}
add_action('admin_enqueue_scripts', 'jadonai_about_us_widgetscript');


/**
 * jadonai comment list modify
 */ 
function jadonai_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	    <div class="single-author-comment">
	        <div class="media">
	          <a class="pull-left" href="#">
	            <?php echo get_avatar( $comment, 120 ); ?>
	          </a>
	          <div class="media-body">
	            <h4 class="media-heading"><?php comment_author_link() ?></h4>
	            <ul class="cl">
	                <li><?php printf( __( '%1$s @ %2$s','jadonai' ), get_comment_date( '', $comment ), get_comment_time() ); ?></li>
	                <?php if($depth<=4): ?>
		                <li class="right"><i class="fa fa-share" aria-hidden="true"></i><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></li>
		            <?php endif; ?>
	            </ul>
				<?php if ($comment->comment_approved == '0') : ?>
					<p><em><?php esc_html_e('Your comment is awaiting moderation.','jadonai'); ?></em></p>
				<?php endif; ?>
		    	<?php comment_text() ?>
	          </div>
	        </div>
	    </div>
<?php } 

/**
 * Comment box title change
 */   
add_filter( 'comment_form_defaults', 'jadonai_comment_form_allowed_tags' );
function jadonai_comment_form_allowed_tags( $defaults ) { 

	$defaults['title_reply'] =  esc_html__( 'Leave Comments','jadonai' );
	$defaults['comment_notes_before'] =  esc_html__( '','jadonai' );
	$defaults['title_reply_before'] =  '<h4>';
	$defaults['title_reply_after'] =  '</h4>';
    $defaults['comment_field'] = '';
	$defaults['label_submit'] =  esc_html__( 'Send','jadonai' ); 
	return $defaults;

}

/**
 * Comment form field order
 */   
add_action( 'comment_form_after_fields', 'jadonai_add_textarea' );
add_action( 'comment_form_logged_in_after', 'jadonai_add_textarea' );

function jadonai_add_textarea()
{
    echo '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Your Comment" cols="45" rows="8" maxlength="65525"  required="required"></textarea></p>';
}

/**
 * remove comment fields
 */  
function jadonai_remove_comment_fields($fields) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

    unset($fields['url']);

    $fields['author'] = '<p class="comment-form-author"> <input id="author" placeholder="Name*" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>';
    $fields['email'] = '<p class="comment-form-email"><input id="email" placeholder="Email*" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>';
    return $fields;
}
add_filter('comment_form_default_fields','jadonai_remove_comment_fields');

/**
 * Redux issue
 */ 
add_action( 'redux/construct', 'jadonai_remove_as_plugin_flag' );
function jadonai_remove_as_plugin_flag() {
	ReduxFramework::$_as_plugin = false;
}

/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
add_action( 'redux/loaded', 'jadonai_remove_demo' );
if ( ! function_exists( 'jadonai_remove_demo' ) ) {
    function jadonai_remove_demo() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );
            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );            
        }
    }
}




/**
 *  main menu
 */ 
function jadonai_breadcrumb(){
	global $post,$jadonai;	
	if(isset($jadonai['blog-title'])){
		$jadonai_blog_title=  $jadonai['blog-title'];
	}else{
		$jadonai_blog_title=  esc_html__('Blog','jadonai');
	} 
 

	
	if(is_front_page() && is_home()){ echo esc_html($jadonai_blog_title); 
	}elseif(is_home() || is_page()){  
	    if(''!=get_post_meta($post->ID,'_jadonai_page_banner_title',true)){
	        $jadonai_ptitle = get_post_meta($post->ID,'_jadonai_page_banner_title',true); 
		}else{
			$jadonai_ptitle =  get_the_title( get_option('page_for_posts', true) );
		} 
	  echo esc_html($jadonai_ptitle);
	}elseif(is_search()){
		if(isset($jadonai['srch-title']) && (''!=$jadonai['srch-title'])){
			printf( '<span>' . $jadonai['srch-title'] . '</span>' ); 
		}else{
			printf( '<span>' . get_search_query() . '</span>' );
		}  
	}elseif(is_category() || is_tag()) {

		if(isset($jadonai['archv-title']) && (''!=$jadonai['archv-title'])){
			printf($jadonai['archv-title']); 
		}else{
			single_cat_title("", true); 
		}  
	}elseif(is_archive()){ 
		if(isset($jadonai['archv-title']) && (''!=$jadonai['archv-title'])){
			printf($jadonai['archv-title']); 
		}else{
	 		if ( class_exists('WooCommerce' ) ){ if(is_shop() || is_product_category() || is_product_tag() ){ woocommerce_page_title(); }else{ echo get_the_date('F Y'); } }else{ echo get_the_date('F Y'); } 
		}   
	}elseif(is_404()){ esc_html_e('404 Error','jadonai');}else{ the_title();}
}

 
/**
 * metabox banner image show hide.
 */
add_action('admin_print_scripts', 'jadonai_metabox_show_hide', 1000);
function jadonai_metabox_show_hide(){ ?>

	<?php if(get_post_type() == 'page') : ?>
		<script>
		
			jQuery(document).ready(function(){

				var id = jQuery( 'input[name="_jadonai_banner_yes"]:checked' ).attr('id');

					if(id == '_jadonai_banner_yes1'){
						jQuery('.cmb2-id--jadonai-page-banner').show();
					}else{
						jQuery('.cmb2-id--jadonai-page-banner').hide();
					} 
	 
					if(id == '_jadonai_banner_yes1'){
						jQuery('.cmb2-id--jadonai-page-banner-title').show();
					}else{
						jQuery('.cmb2-id--jadonai-page-banner-title').hide();
					} 
	 
				 
				jQuery( 'input[name="_jadonai_banner_yes"]' ).change(function(){
					jQuery('.cmb2-id--jadonai-page-banner').show(); 

					var id = jQuery( 'input[name="_jadonai_banner_yes"]:checked' ).attr('id');


					if(id == '_jadonai_banner_yes1'){
						jQuery('.cmb2-id--jadonai-page-banner').show();
					}else{
						jQuery('.cmb2-id--jadonai-page-banner').hide();
					} 
					if(id == '_jadonai_banner_yes1'){
						jQuery('.cmb2-id--jadonai-page-banner-title').show();
					}else{
						jQuery('.cmb2-id--jadonai-page-banner-title').hide();
					}  
			 
				});
			})
		</script>
	<?php endif; ?>

	<?php if(get_post_type() == 'projects') : ?>
		<script>
		
			jQuery(document).ready(function(){

				var id = jQuery( 'input[name="_jadonai_project_gallery"]:checked' ).attr('id');

					if(id == '_jadonai_project_gallery1'){
						jQuery('#postbox-container-2').show();
					}else{
						jQuery('#postbox-container-2').hide();
					}  
				jQuery( 'input[name="_jadonai_project_gallery"]' ).change(function(){
					jQuery('.cmb2-id--jadonai-page-banner').show(); 

					var id = jQuery( 'input[name="_jadonai_project_gallery"]:checked' ).attr('id');


					if(id == '_jadonai_project_gallery1'){
						jQuery('#postbox-container-2').show();
					}else{
						jQuery('#postbox-container-2').hide();
					}  
				});
			})
		</script>
	<?php endif; ?>
<?php }




/**
 *  woocommerce settings
 */
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb',20 );