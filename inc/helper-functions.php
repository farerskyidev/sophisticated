<?php

/**
 * ACF Options page support
 */
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}


/**
 * Get button
 *
 * @param $button
 * @param $classes
 * @return void
 */
function wht_get_button($button, $classes = '') {
    if ( ! empty( $button ) ) :
        $link_target = ! empty( $button['target'] ) ? $button['target'] : '_self';
        ?>
        <a class="<?php echo $classes; ?>" href="<?php echo $button['url']; ?>" target="<?php echo esc_attr( $link_target ); ?>">
            <?php echo $button['title']; ?>
        </a>
    <?php endif;
}