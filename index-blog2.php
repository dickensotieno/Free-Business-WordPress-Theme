<?php
/**
 * Template Name: Blog Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MiakoLegal
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <!-- Latest News Area Start Here -->

                                <?php if ( have_posts() ) :
                                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                                    query_posts( array( 'post_type' => 'projects','paged' => $paged) ); ?>
                                    <?php while ( have_posts() ) : the_post(); ?>

                                        <?php

                                            /*
                                             * Include the Post-Format-specific template for the content.
                                             * If you want to override this in a child theme, then include a file
                                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                             */
                                            get_template_part( 'template-parts/content', get_post_format() );
                                        ?>

                                    <?php endwhile; ?>

                                <?php else : ?>

                                    <?php get_template_part( 'template-parts/content', 'none' ); ?>

                                <?php endif; ?>
           

                        <?php the_posts_pagination( array(
                            'show_all' => true,
                            'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                            'next_text' => '<i class="fa fa-angle-double-right"></i>',
                            'screen_reader_text' => '',
                            'before_page_number' => '',
                            'after_page_number' => '',
                        ) ); ?>
            

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
