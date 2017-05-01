<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jadonai
 */
$jadonai_option = new Victor_Options();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php 
    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" type="image/x-icon"/>
    <?php 
    }else{ ?>
        <link rel="shortcut icon" href="<?php echo site_icon_url(); ?>" type="image/x-icon"/>
    <?php }

wp_head(); ?>

</head> 
<body <?php body_class(); ?>>
<div id="page" class="site">


        <header>
            <?php $jadonai_option->topHeaderOptions(); ?>
            <div class="main-header-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="logo-area">
                                <?php $jadonai_option->main_headerLogo(); ?>
                            </div>
                        </div>
                        <div class="<?php echo esc_attr($jadonai_option->menuFullwidth()); ?>">
                            <div class="main-menu"> 
                                <?php jadonai_main_menu(); ?>
                            </div>
                        </div>
                        <?php if($jadonai_option->srchBoxShowHide()!=0): ?>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 acurate">
                                <div class="search-area">
                                    <?php jadonai_header_search(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <?php jadonai_main_menu(); ?>
                                </nav>
                            </div>          
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header area end here -->

        <!-- slider area-->
        <?php 
        if(is_page()){
            if(get_post_meta(get_the_ID(),'_jadonai_banner_yes',true)=='no'){
                get_template_part('slider');
            }else{
                get_template_part('banner');
            }
        }else{
            get_template_part('banner');
        }  
        ?>    


	<div id="content" class="site-content">
