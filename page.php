<?php
/**
 * Single page template
 */

get_header();

if ( have_posts() ) :
    while ( have_posts()): the_post(); ?>
    <div class="container page-container"> 
        <?php the_content(); ?>
    </div>
        
        <?php endwhile;
endif;

get_footer();?>