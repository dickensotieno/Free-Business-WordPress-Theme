<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jadonai
 */ 
get_header(); ?> 

  <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
 
        <div class="project-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="project-content-area">
		                <?php if ( have_posts() ) :  while ( have_posts() ) : the_post();  ?>

                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
                               <div class="single-project-one">
                                   <div class="project-feature-image">
                                       <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                       <div class="overley">
                                           <ul>
                                               <li><a href="<?php the_permalink(); ?>"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                           </ul>
                                       </div>
                                   </div>
                                   <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                               </div>
                           </div>

			            <?php endwhile; endif; ?> 
                        </div>                  
                       <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                               <div class="pagination-area">
                                  <ul>
                                    <?php the_posts_pagination( array(
                                        'show_all' => true,
                                        'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                                        'next_text' => '<i class="fa fa-angle-double-right"></i>',
                                        'screen_reader_text' => '',
                                        'before_page_number' => '',
                                        'after_page_number' => '',
                                    ) ); ?>
                                  </ul>
                               </div>
                           </div>
                       </div>
                    </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="blog-sidebar-area">
                       <?php if ( is_active_sidebar( 'sidebar-project' ) ) dynamic_sidebar( 'sidebar-project' ); ?>
                    </div>
                  </div>
            </div>    
        </div>
    </div> 
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>