<?php
/**
 * Template part for displaying sigle blog post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jadonai
 */

?>
    <div class="blog-image">
      <a href="#"><?php the_post_thumbnail('jadonai-single-blog'); ?></a>
    </div>
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>

