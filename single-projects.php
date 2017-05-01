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
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                $jadonai_gallery_yes = get_post_meta(get_the_id(),'_jadonai_project_gallery',true);
                $jadonai_gallery_img = get_post_meta(get_the_id(),'_jadonai_gallery_up',true);
                if($jadonai_gallery_yes=='yes'):
                ?> 
                  <div class="blog-image">
                    <div class="single-project-slider">
                    	<?php     
                    	foreach ( (array) $jadonai_gallery_img as $jadonai_gallery_img_id => $jadonai_gallery_img_url ) { 
					        echo wp_get_attachment_image( $jadonai_gallery_img_id, 'jadonai-project-gallery' ); 
					    } ?>
                    </div>
                  </div>
                  <?php else: ?>
                   <div class="blog-image">
                  	<?php the_post_thumbnail(); ?>
                  	</div>
                  <?php endif; ?>
                  <h2><?php the_title(); ?></h2>
                  <?php the_content(); ?> 
                </div>
              <?php endwhile; endif; ?>
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
