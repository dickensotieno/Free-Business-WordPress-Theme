<?php 
/**
 * The template for Register Widgets Scripts.
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jadonai
 */



 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jadonai_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jadonai' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'jadonai' ),
		'before_widget' => '<div id="%1$s" class="single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Product Sidebar', 'jadonai' ),
		'id'            => 'sidebar-prdt',
		'description'   => esc_html__( 'Add widgets here.', 'jadonai' ),
		'before_widget' => '<div id="%1$s" class="single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Single Services Sidebar', 'jadonai' ),
		'id'            => 'sidebar-srv',
		'description'   => esc_html__( 'Add widgets here.', 'jadonai' ),
		'before_widget' => '<div id="%1$s" class="single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Projects Sidebar', 'jadonai' ),
		'id'            => 'sidebar-project',
		'description'   => esc_html__( 'Add widgets here.', 'jadonai' ),
		'before_widget' => '<div id="%1$s" class="single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'jadonai' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Add widgets here.', 'jadonai' ),
		'before_widget' => '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 regwdgt %2$s"><div class="single-footer">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'jadonai_widgets_init' );
