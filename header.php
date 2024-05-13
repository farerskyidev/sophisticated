<?php
/**
 * Header template.
 *
 * @package lex
 * @since 1.0.0
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Prosto+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<?php
// acf/main-page-header-block
$first_block_name = '';
$content = get_the_content();
if (has_blocks($content)) {
    $blocks = parse_blocks($content);
    foreach ($blocks as $block) {
        if (!empty($block['blockName'])) {
            if (!empty($block['blockName'])) $first_block_name = $block['blockName'];
            break;
        }
    }
}

$mainWrapperClass = ['main-wrapper'];
if($first_block_name !== 'acf/main-page-header-block') $mainWrapperClass[] = 'main-wrapper_padding-top';



$header_logo = get_field('header_logo', 'option');  
$socials = get_field('socials', 'option'); 
$phone = get_field('phone', 'option');   
$email = get_field('email', 'option');    
?>


<body <?php body_class(); ?>>

    <header class="header">
            <div class="container">
                <div class="header__wrap">
                    <div class="header__logo-btn"> 
                        <?php if ($header_logo): ?>
                            <a href="<?php echo home_url('/'); ?>" class="header__logo">
                                <img class="" src="<?php echo esc_url($header_logo['url']); ?>" alt="image"> 
                            </a>
                        <?php endif ?>
                    </div>
                    <div>
                        <div class="header__container">
                                <?php wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'menu_class' => 'header__menu',
                                        'menu' => 'header-menu',
                                        'depth' => 1,
                                    )
                                ); ?>
                                <div class="header__info">
                                    <div>
                                        <?php if (!empty($email)) : ?>
                                            <span>Email</span>
                                            <a href="mailto:<?php echo $email; ?>">info@sophisticated.immo</a> 
                                        <?php endif ?>
                                    </div>
                                    <div>
                                        <?php if ($phone): ?>
                                            <span>Phone</span>
                                            <a href="tel:+<?php echo $phone; ?>">+<?php echo $phone; ?></a>                                    
                                        <?php endif ?>
                                    </div>
                                    <div>address calle purciana,21,07013 palma de mallorca (santa catalina)</div> 
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
                                </div>
                                <?php wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'menu_class' => 'header__menu',
                                        'menu' => 'header-menu-2',
                                        'depth' => 2,
                                    )
                                ); ?>
                                <ul class="nav-select-list">  
                                    <li class="select-wrapper">         
                                    <select class="nav-select">
                                        <option value="1">EN</option>
                                        <option value="2">UA</option>
                                    </select>
                                    </li>
                                </ul>
                        
                        
                        <div class="header__brg">
                            <button class="header__burger"> 
                                <span></span> 
                                <span></span> 
                                <span></span> 
                                </button>
                            <h6>MENU</h6> 
                        </div>
                    </div>
                </div>         
            </div>
        </header>
    <div class="<?php echo esc_attr(trim(implode(' ', $mainWrapperClass))) ?>">
