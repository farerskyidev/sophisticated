<?php
/*
 * Block Name: Our Properties Block
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
$text_top = get_field('text_top');
$image_top = get_field('image_top'); 
$background_text_top = get_field('background_text_top'); 
$text_bottom = get_field('text_bottom'); 
$image_bottom = get_field('image_bottom'); 
$background_text_bottom = get_field('background_text_bottom');  
$button = get_field('button'); 

$block_name = 'our_properties';

// Create id attribute allowing for custom "anchor" value.
$id = ! empty( $block['id'] ) ? $block_name . '-' . $block['id'] : '';
if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor']; 
}

// Create class attribute allowing for custom "className" and "align" values.
$className   = array( $block_name ); 
$className[] = 'pt-110'; 
$className[] = 'pb-210';
?> 

<section class="<?php echo implode( ' ', $className ); ?>" id="<?php echo esc_attr( $id ); ?>"  data-aos="fade-up" data-aos-duration="1000">

    <?php if (!empty($background_text_top)) : ?> 
        <div class="slide-first banner-slide-text">
            <div class="banner-slide-content">
                <div class="banner-slide-items">
                    <p><?php echo $background_text_top; ?></p>  
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($background_text_bottom)) : ?> 
        <div class="slide-second banner-slide-text">
            <div class="banner-slide-content">
                <div class="banner-slide-items">
                    <p><?php echo $background_text_bottom; ?></p>  
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="container"> 
        <div class="our_properties__wrap">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <?php if (!empty($title)) : ?> 
                        <h2 class="mb-70"><?php echo $title; ?></h2> 
                    <?php endif; ?>
                    <div class="our_properties__top-text">
                    <?php if (!empty($text_top)) : ?> 
                        <p class=""><?php echo $text_top; ?></p>  
                    <?php endif; ?>
                    </div>
                    <div class="our_properties__vert-line">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12"> 
                    <?php if ( ! empty( $image_top ) ): ?>
                        <div class="our_properties__image">
                            <img src="<?php echo esc_url($image_top['url']); ?>" alt="">
                        </div>
                    <?php endif ?>
                </div>
            </div>       
            <div class="row">
                <div class="col-lg-7"> 
                    <?php if ( ! empty( $image_bottom ) ): ?>
                        <div class="our_properties__image">
                            <img src="<?php echo esc_url($image_bottom['url']); ?>" alt="">
                        </div>
                    <?php endif ?>
                </div>
                <div class="col-lg-5"> 
                    <div></div>
                    <div>
                        <?php if (!empty($text_bottom)) : ?> 
                            <p class=""><?php echo $text_bottom; ?></p>  
                        <?php endif; ?>
                    </div>
                    <div class="btn-cont w-100"> 
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
    </div>
</section>

