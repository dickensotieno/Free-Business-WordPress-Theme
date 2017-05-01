<?php 
/**
 * The template for Framework options functions.
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jadonai
 */

Class Victor_Options{

    // slider options
    public function jadonai_slider_autoplay(){
        global $jadonai;
        if(!empty($jadonai['slide-autoplay']) && (1==$jadonai['slide-autoplay'])){
            return false;
        }else{
            return true;
        } 
    }
    public function jadonai_slider_effect(){
        global $jadonai;
        if(isset($jadonai['slide-effect'])){
            return $jadonai['slide-effect'];
        }else{
            return "slideInRight";
        } 
    }
    public function jadonai_slider_speed(){
        global $jadonai;
        if(!empty($jadonai['slide-speed'])){
            return $jadonai['slide-speed'];
        }else{
            return 500;
        } 
    }
    public function jadonai_sliders_speed(){
        global $jadonai;
        if(!empty($jadonai['sslide-speed'])){
            return $jadonai['sslide-speed'];
        }else{
            return 3000;
        } 
    }


    // copyright test options
    public function callToActionText(){
        global $jadonai;
        if($jadonai['call-action-switch']==1){
       ?> 
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ftp text-center">
                 <div class="footer-top">
                    <?php 
                    if( isset($jadonai['call-action-title']) && !empty($jadonai['call-action-title'])){ 
                        echo "<p>". sprintf(esc_html__("%s","jadonai"), $jadonai['call-action-title'])."</p>";
                    }else{ 
                        echo "<p>". sprintf(esc_html__("%s","jadonai"), "Quick Contact Us")."</p>";
                    } 
                    if( isset($jadonai['call-action-phn']) && !empty($jadonai['call-action-phn'])){ 
                        echo "<h2><i class=\"fa fa-phone\" aria-hidden=\"true\"></i>". sprintf(esc_html__("%s","jadonai"), $jadonai['call-action-phn'])."</h2>";
                    }else{ 
                        echo "<h2><i class=\"fa fa-phone\" aria-hidden=\"true\"></i>". sprintf(esc_html__("%s","jadonai"), "+123 456 78910")."</h2>";
                    } 
                    ?>  
                </div>
            </div>
         </div>
       <?php }else{
        return "";
       }
    }
    // subscribe area
    public function subscribeTextArea(){
        global $post,$jadonai;
       
        if(is_page()){
             $jadonai_pg_subscribe = get_post_meta($post->ID,'_jadonai_subscribe',true);
            if($jadonai_pg_subscribe == 'yes' ):
           ?>
            <div class="call-top-action">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                             <div class="subscribe-text">
                                 <h2><?php if(isset($jadonai['subscribe-title'])) echo sprintf(esc_html__("%s","jadonai"),$jadonai['subscribe-title']); ?></h2>
                             </div>
                         </div>
                         <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                             <div class="subscribe-now">
                                 <a href="<?php if(isset($jadonai['subscribe-btnurl'])) echo esc_url($jadonai['subscribe-btnurl']); ?>"><?php if(isset($jadonai['subscribe-btnttl'])) echo sprintf(esc_html__("%s","jadonai"),$jadonai['subscribe-btnttl']); ?></a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>    
           <?php else:
           return "";
           endif; 
        }else{
            if($jadonai['subscribe-switch']!=0):
           ?>
            <div class="call-top-action">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                             <div class="subscribe-text">
                                 <h2><?php if(isset($jadonai['subscribe-title'])) echo sprintf(esc_html__("%s","jadonai"),$jadonai['subscribe-title']); ?></h2>
                             </div>
                         </div>
                         <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                             <div class="subscribe-now">
                                 <a href="<?php if(isset($jadonai['subscribe-btnurl'])) echo esc_url($jadonai['subscribe-btnurl']); ?>"><?php if(isset($jadonai['subscribe-btnttl'])) echo sprintf(esc_html__("%s","jadonai"),$jadonai['subscribe-btnttl']); ?></a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>    
           <?php else:
           return "";
           endif;           
        }
 
    }
    // top header options
    public function topHeaderOptions(){
        global $jadonai;
        if($jadonai['tophd-switch']!=0):
       ?>
            <div class="header-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="header-top-left">
                                <ul>
                                    <li><i class="fa fa-globe" aria-hidden="true"></i> <?php echo sprintf(esc_html__("%s","jadonai"),$jadonai['notification-txt']); ?></li>                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="header-top-right">
                                <ul>
                                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo sprintf(esc_html__("%s","jadonai"),$jadonai['email-txt']); ?></li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>  <?php echo sprintf(esc_html__("%s","jadonai"),$jadonai['phone-txt']); ?></li>                        
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       <?php else: 
       return "";
       endif;
    }

    // main header logo area
    public function main_headerLogo(){
        global $jadonai;
        if( isset($jadonai['logo-up']['url']) && (''!=$jadonai['logo-up']['url'])){
       ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($jadonai['logo-up']['url']); ?>" alt="site logo"></a>
        <?php }else{ ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="site logo"></a>
       <?php }
    }
    // menu full width 
    public function menuFullwidth(){
        global $jadonai;
        if(isset($jadonai['serch-switch']) && ($jadonai['serch-switch']==0)){
            return "col-lg-10 col-md-10 col-sm-12 col-xs-12";
        }else{
            return "col-lg-8 col-md-8 col-sm-12 col-xs-12";
        }
       ?>

       <?php
    }
    // search box show hide
    public function srchBoxShowHide(){
        global $jadonai;
        if(isset($jadonai['serch-switch'])){
            return $jadonai['serch-switch'];
        }else{
            return 1;
        }
       ?>

       <?php
    }
    // page banner options
    public function pageBanner(){
        global $post,$jadonai;  
        if(''!=get_post_meta($post->ID,'_jadonai_page_banner',true)){
            return get_post_meta($post->ID,'_jadonai_page_banner',true);
        }else{
            return get_template_directory_uri()."/img/bennar.jpg";
        }
 
    }

    // blog banner options
    public function blogBanner(){
        global $jadonai;  
        if(isset($jadonai['blog-banner']['url']) && (''!=$jadonai['blog-banner']['url'])){
            return $jadonai['blog-banner']['url'];
        }else{
            return get_template_directory_uri()."/img/bennar.jpg";
        }
 
    }
    // blog sidebar options
    public function blogSidebar(){
        global $jadonai;  
        if(isset($jadonai['blog-sidebar']) ){
            return $jadonai['blog-sidebar'];
        }else{
            return "right";
        }
 
    }
    // search banner options
    public function searchBanner(){
        global $jadonai;  
        if(isset($jadonai['srch-banner']['url']) && (''!=$jadonai['srch-banner']['url'])){
            return $jadonai['srch-banner']['url'];
        }else{
            return get_template_directory_uri()."/img/bennar.jpg";
        }
 
    }
    // search sidebar options
    public function searchSidebar(){
        global $jadonai;  
        if(isset($jadonai['srch-sidebar']) ){
            return $jadonai['srch-sidebar'];
        }else{
            return "right";
        }
 
    }
    // archive banner options
    public function archiveBanner(){
        global $jadonai;  
        if(isset($jadonai['archv-banner']['url']) && (''!=$jadonai['archv-banner']['url'])){
            return $jadonai['archv-banner']['url'];
        }else{
            return get_template_directory_uri()."/img/bennar.jpg";
        }
 
    }
    // archive sidebar options
    public function archiveSidebar(){
        global $jadonai;  
        if(isset($jadonai['archv-sidebar']) ){
            return $jadonai['archv-sidebar'];
        }else{
            return "right";
        }
 
    }
    // footer widget column options
    public function footerColumnWidget(){
        global $jadonai; 
        if(isset($jadonai['ftr-clmn'])){ 
            if( 3==$jadonai['ftr-clmn']){
                return "33.33%";
            }elseif( 2==$jadonai['ftr-clmn']){
                return "50%";
            }else{
                return "25%";
            }
        } 
    }
    // color pallate options
    public function colorPalateOptions(){
        global $jadonai;
       if($jadonai['color-layout'] ==2){
        return "red-color-body";
       }elseif($jadonai['color-layout'] ==3){
        return "green-color-body";
       }elseif($jadonai['color-layout'] ==4){
        return "blue-color-body";
       }else{
        return "skype-color-body";
       }
    }
    // copyright test options
    public function copyrightText(){
        global $jadonai;
       ?>
        <p><?php if( isset($jadonai['copyright-text']) && !empty($jadonai['copyright-text'])){ 
            echo sprintf(esc_html__("%s","jadonai"), $jadonai['copyright-text']);
        }else{ 
            echo "<p>". sprintf(esc_html__("%s","jadonai"), "&copy; Copyrights Jadonai. All rights reserved.")."</p>"; 
        } ?></p>
       <?php
    }


}




