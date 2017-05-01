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
 
         <div class="service-area">
            <div class="container">
                <div class="row">
                	<div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
		                <?php if ( have_posts() ) :  while ( have_posts() ) : the_post();
			            $jadonai_service_icon = get_post_meta(get_the_ID(),'_jadonai_icon_cls',true); 
			            $jadonai_service_btnlbl = get_post_meta(get_the_ID(),'_jadonai_btn_lbl',true); 
			            $jadonai_service_btnexurl = get_the_permalink(); 
						if( '' == $jadonai_service_btnlbl ){
			              $jadonai_service_btnlabel = esc_html__('Read More','jadonai');
			            }else{
			              $jadonai_service_btnlabel = $jadonai_service_btnlbl;
			            }
		                ?>

		                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				                <div class="single-service">
				                    <div class="media">
				                      <div class="pull-left">
				                        <a href="<?php echo esc_url($jadonai_service_btnexurl); ?>">
				                          <span class="<?php echo esc_attr($jadonai_service_icon); ?>"></span>
				                        </a>
				                      </div>
				                      <div class="media-body">
				                        <h4 class="media-heading"><a href="<?php echo esc_url($jadonai_service_btnexurl); ?>"><?php the_title(); ?></a></h4>
				                        <p><?php echo wp_trim_words(get_the_content(),17,''); ?></p>
				                        <div class="read-more">
				                            <a href="<?php echo esc_url($jadonai_service_btnexurl); ?>"><?php echo sprintf(esc_html__('%s','jadonai'),$jadonai_service_btnlabel); ?>  <i class="fa fa-angle-right" aria-hidden="true"></i></a>
				                        </div>
				                      </div>
				                    </div>
				                </div>
		                    </div> 

			            <?php endwhile; endif; ?>               
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
		                <div class="sidebar-area blog-sidebar-area"> 
	 						<?php if ( is_active_sidebar( 'sidebar-srv' ) ) dynamic_sidebar( 'sidebar-srv' ); ?>
		                </div>
                    </div>
                </div>
            </div>
        </div>
	    
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>