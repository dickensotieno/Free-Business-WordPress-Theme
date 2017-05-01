<?php
/**
 * Template part for displaying sigle blog post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jadonai
 */

?>

 <div class="news-featured-image">
     <a href="#"><?php the_post_thumbnail('jadonai-single-blog'); ?></a>
     <div class="date-area">
         <ul>
             <li><?php echo get_the_time('d'); ?></li>
             <li><?php echo get_the_time('M'); ?></li>
         </ul>
     </div>
 </div> 
 <h3><a href="#"><?php the_title(); ?></a></h3>
 <ul class="ptags">
 	<li><span><?php esc_html_e('byQ','jadonai'); ?></span> <?php the_author(); ?> |</li> 
    <li><?php  comments_popup_link( 
    '<span>0</span> Comment',
    '<span>1</span> Comment',
    '<span>%</span> Comments',
    ' ', 
    'Comments off'
    ); ?></li>
 </ul>
 <div class="single-blog-content">
     <?php the_content(); 
      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jadonai' ),
        'after'  => '</div>',
      ) ); 
     ?>   
      <?php  
      global $numpages;
        if ( is_singular( 'attachment' ) ) {
          // Parent post navigation.
          the_post_navigation( array(
            'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'jadonai' ),
          ) );
        } elseif ( is_singular( 'post' )  && $numpages > 1) {
          // Previous/next post navigation.
          the_post_navigation( array(
            'next_text' =>  '<span class="post-title">%title</span>',
            'prev_text' =>  '<span class="post-title">%title</span>',
          ) );
        }
      ?>

 </div>  
<div class="row content-info">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <div class="blog-content-tag">
             <ul class="ptags">
                 <li> <span><?php esc_html_e('Tags','jadonai'); ?>: </span> </li>
                 <?php the_tags( '<li>', ',</li><li>', '</li>' ); ?>
             </ul>
         </div>
     </div>
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
         <div class="blog-content-share-social-icons">                                         
             <ul>
               <li> <span><?php esc_html_e('Share','jadonai'); ?>: </span> </li>

               <li><a target="_blank" href="<?php echo esc_url('http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li> 
              
               <li><a target="_blank" href="<?php echo esc_url('http://twitter.com/home/?status='.get_the_title().' - '.get_the_permalink()); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> 
               
               <li><a target="_blank" href="<?php echo esc_url('https://plus.google.com/share?url='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li> 
               <li><a target="_blank" href="<?php echo esc_url('http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li> 
               <li><a target="_blank" href="<?php echo esc_url('http://www.linkedin.com/shareArticle?mini=true&amp;title='.get_the_title().'&amp;url='.get_the_permalink()); ?> "><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
               <li><a target="_blank" href="<?php echo esc_url('http://www.reddit.com/submit?url='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-reddit-square" aria-hidden="true"></i></a></li>
             </ul>
         </div>
     </div>
</div>
<?php
 $jadonai_authordesc = get_the_author_meta( 'description' );
 if( !empty($jadonai_authordesc) ): ?>
  <div class="row author-post">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="about-author-post">
              <h2><?php esc_html_e('About Post Author','jadonai'); ?></h2>
              <div class="single-author-post">
                  <div class="media">
                    <a class="pull-left" href="#">
                    	<?php echo get_avatar( get_the_author_meta('email'), '130'); ?> 
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading"><?php the_author(); ?></h4>
                      <p><?php the_author_meta('description'); ?></p>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
<?php endif; ?>