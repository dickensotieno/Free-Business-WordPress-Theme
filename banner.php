<?php
/**
 * The banner for our theme.
 *
 * This is the template that displays for banner.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jadonai
 */ 
?>
    <div class="inner-page-header">
        <div class="container">
            <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <div class="header-page-title">
                         <h2><?php jadonai_breadcrumb(); ?></h2>
                     </div>
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <div class="header-page-locator">
                         <ul>
                             <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e("Home","jadonai"); ?> /</a> <?php jadonai_breadcrumb(); ?></li> 
                         </ul>
                     </div>
                 </div>
            </div>
        </div>
    </div>