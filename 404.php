<?php
/**
 * 404 Page template.
 *
 * @package wht
 * @since 1.0.0
 *
 */



get_header(); ?>
        
        <div class="container">
            <div class="">
            <h4><?php esc_html_e('This page not found', V_PREFIX); ?></h4>
                <div class="">
                    <a class="btn btn_thirth" href="<?php echo home_url(); ?>">
                        <?php esc_html_e('Return to Home', V_PREFIX); ?>  
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
