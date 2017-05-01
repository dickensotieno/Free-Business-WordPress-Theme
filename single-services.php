<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jadonai
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

	        <div class="total-blog-area">
	          <div class="container">
	            <div class="row">
	              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	                <div class="single-blog-post">
	                	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
		                    <?php get_template_part('template-parts/content','services'); ?>
                           <?php 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif; ?>
	                  <?php endwhile; endif; ?>
	                </div>
	              
	              </div>
	              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                <div class="sidebar-area blog-sidebar-area"> 
 						<?php if ( is_active_sidebar( 'sidebar-srv' ) ) dynamic_sidebar( 'sidebar-srv' ); ?>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div> 
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
