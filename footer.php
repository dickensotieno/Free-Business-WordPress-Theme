<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jadonai
 */
$jadonai_option = new Victor_Options();
?>

	</div><!-- #content -->

        <!-- Call to action area start here -->
        <?php $jadonai_option->subscribeTextArea(); ?>   
        <!-- Call to action area end here -->       
        <!-- footer area start here -->
        <footer class="ftr">
            <div class="footer-top-area">
                <div class="container">
                     <?php $jadonai_option->callToActionText(); ?> 
                    <div class="row main-footer">
                        <?php if ( is_active_sidebar( 'sidebar-footer' ) ){
                           dynamic_sidebar( 'sidebar-footer' ); 
                         }else{
                            echo "<h2 class=\"fdgt\">".sprintf(esc_html__('%s','jadonai'),'Your Footer Widget Goes Here')."</h2 class=\"fdgt\">";
                          } ?> 
                    </div> 
                </div>
            </div>
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <p>Powered by <a href="http://wordpress.org">WordPress</a> | Theme: Jadonai</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer area end here -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
