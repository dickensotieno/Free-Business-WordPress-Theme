<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jadonai
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-top">
        <div class="single-news-area">
            <div class="news-featured-image">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('jadonai-blog'); ?></a>
                <div class="date-area">
                    <ul>
                        <li><?php echo get_the_time('d'); ?></li>
                        <li><?php echo get_the_time('M'); ?></li>
                    </ul>
                </div>
            </div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <ul class="ptags"> 
                <li><span><?php esc_html_e('by','jadonai'); ?></span> <?php the_author(); ?> in <?php the_category(', ') ?> |</li> 
                <li><?php  comments_popup_link( 
                '<span>0</span> Comment',
                '<span>1</span> Comment',
                '<span>%</span> Comments',
                ' ', 
                'Comments off'
                ); ?></li>
            </ul>
            <p><?php echo wp_trim_words(get_the_content(), 20,''); ?><a href="<?php the_permalink(); ?>"> Read More &raquo;</a></p>
        </div>
    </div> 

</article><!-- #post-## -->
