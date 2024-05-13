<?php
/*
 * Block Name: About Us Block
 * Slug:
 * Description:
 * Keywords:
 * Dependency:
 * Align: false
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to. 
 */

$title = get_field('title'); 
$text = get_field('text'); 
$button = get_field('button'); 

$block_name = 'about_us';

// Create id attribute allowing for custom "anchor" value.
$id = ! empty( $block['id'] ) ? $block_name . '-' . $block['id'] : '';
if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor']; 
}

// Create class attribute allowing for custom "className" and "align" values.
$className   = array( $block_name ); 
$className[] = 'pt-250';



?> 

<section class="<?php echo implode( ' ', $className ); ?>" id="<?php echo esc_attr( $id ); ?>" data-aos="fade-up" data-aos-duration="1000">
    <div class="container"> 
        <div class="row">
            <div class="col-xl-4 col-lg-12">
                <?php if (!empty($title)) : ?> 
                    <h2 class="mb-70 text_shadows"><?php echo $title; ?></h2>  
                <?php endif; ?>
                <div class="black-border"></div>
            </div>
            <div class="col-xl-8 col-lg-12 flex sp-around about_us__second-block"> 
                <?php if (!empty($text)) : ?> 
                    <p class=""><?php echo $text; ?></p>  
                <?php endif; ?>
                <div class="btn-cont w-100 mt-90"> 
                    <?php 
                    $button = get_field('button');  
                    if( $button ): 
                        $button_url = $button['url'];
                        $button_title = $button['title'];
                        $button_target = $button['target'] ? $button['target'] : $button_title; 
                        ?>
                        <a class="button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_title ); ?>"><?php echo esc_html( $button_target ); ?></a>
                    <?php endif; ?> 
                </div>
                
            </div>
        </div>

    </div>
</section>
