<?php
/**
 * Template Name: Shortcode Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jadonai
 */ 
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main"> 
			<div class="container">
				<div class="row">
					<?php
					if ( have_posts() ) :  
						while ( have_posts() ) : the_post(); 
							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						endwhile; 
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif; ?>
				</div>   
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer();
