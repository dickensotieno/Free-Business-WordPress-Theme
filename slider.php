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

    <div class="slider-area">

        <div class="bend niceties preview-2">

            <div id="ensign-nivoslider" class="slides"> 

                <?php $jadonai_sliders = new WP_Query(array('post_type'=>'sliders', 'order' => 'ASC','orderby' => 'menu_order','posts_per_page'=>3)); ?>

                <?php while($jadonai_sliders->have_posts()): $jadonai_sliders->the_post(); 

                $jadonai_slider_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'jadonai-full');?>

                    <img src="<?php echo esc_url($jadonai_slider_img[0]); ?>" alt="" title="#slider-direction-<?php echo get_the_ID(); ?>"  /> 

                <?php endwhile; wp_reset_postdata(); ?>

            </div>

            <!-- direction  -->

            <?php while($jadonai_sliders->have_posts()): $jadonai_sliders->the_post(); 

            $jadonai_left_label = get_post_meta(get_the_ID(),'_jadonai_left_btn',true);

            $jadonai_left_url = get_post_meta(get_the_ID(),'_jadonai_left_btnurl',true);

            $jadonai_right_label = get_post_meta(get_the_ID(),'_jadonai_right_btn',true);

            $jadonai_right_url = get_post_meta(get_the_ID(),'_jadonai_right_btnurl',true);

            ?>

                <div id="slider-direction-<?php echo get_the_ID(); ?>" class="t-cn slider-direction">

                     <div class="slider-content t-cn s-tb slider-1">

                        <div class="title-container s-tb-c title-compress">

                            <h1 class="title1"><?php the_title(); ?></h1>

                            <div class="title2" ><?php echo get_the_content(); ?></div>

                            <div class="slider-botton" >

                                <ul>

                                    <li class="acitve"><a href="<?php echo esc_url($jadonai_left_url); ?>"><?php echo sprintf(esc_html__("%s","jadonai"),$jadonai_left_label); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                                    <li><a href="<?php echo esc_url($jadonai_right_url); ?>"><?php echo sprintf(esc_html__("%s","jadonai"),$jadonai_right_label); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                                </ul>

                            </div>

                        </div>

                    </div>  

                </div>

            <?php endwhile; wp_reset_postdata(); ?> 

             <!-- direction  end -->

        </div>

    </div>