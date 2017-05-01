<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jadonai
 */ 
$jadonai_option = new Victor_Options();
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

	        <!-- News Page start here -->
	        <div class="news-page-area">
	            <div class="container">
	                <div class="row">
	                	<?php if($jadonai_option->blogSidebar()=='left'): ?>
		                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		                        <div class="sidebar-area">
		                            <?php get_sidebar(); ?> 
		                        </div>
		                    </div>
		                <?php endif; ?>
	                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	                        <div class="news-main-content">
	                        	<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
	                        		<?php get_template_part( 'template-parts/content'); ?>
		                        <?php endwhile; ?>                           
		                            <div class="row">
		                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
		                                    <div class="pagination-area">
		                                    	<?php get_template_part('pagination'); ?> 
		                                    </div>
		                                </div>
		                            </div>
	                            <?php endif; ?>
	                        </div>
	                    </div>
	                	<?php if($jadonai_option->blogSidebar()!='left'): ?>
		                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		                        <div class="sidebar-area">
		                            <?php get_sidebar(); ?> 
		                        </div>
		                    </div>
		                <?php endif; ?>
	                </div>
	            </div>
	        </div>
	        <!-- News Page end here -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
