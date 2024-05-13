<?php
/*
 * Block Name: Banner Block
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
$description = get_field('description'); 
$socials = get_field('socials'); 
$video = get_field('video'); 

$block_name = 'banner';

// Create id attribute allowing for custom "anchor" value.
$id = ! empty( $block['id'] ) ? $block_name . '-' . $block['id'] : '';
if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor']; 
}

// Create class attribute allowing for custom "className" and "align" values.
$className   = array( $block_name ); 
$className[] = ''; 
?> 

<section class="<?php echo implode( ' ', $className ); ?>" id="<?php echo esc_attr( $id ); ?>">
    <div class="embed-container">
        <?php the_field('video'); ?>
    </div>
    <div class="banner__wrap"> 
        
        <div class="container"> 
            <div class="banner__text"> 
                <?php if (!empty($title)) : ?> 
                    <h1 class=""><?php echo $title; ?></h1> 
                <?php endif; ?>
                <?php if (!empty($description)) : ?> 
                    <p class=""><?php echo $description; ?></p> 
                <?php endif; ?>
            </div>  
        </div>
        <div class="banner__bottom"> 
            <div class="container">     
                <?php if (!empty($socials)) : ?>
                    <ul class="social">
                        <?php foreach ($socials as $row): ?>
                            <?php $image = $row['image']; ?>
                            <?php $link = $row['link']; ?>
                            <?php if ($image && $link): ?>
                                <li>
                                    <a target="_blank" href="<?php echo esc_url($link); ?>">
                                        <img class="eco-social__image" src="<?php echo esc_url($image['url']); ?>" alt="">
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="banner__vert-line-white"></div>
            </div>
        </div>
    </div>
</section>
