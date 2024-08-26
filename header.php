<?php

use App\Acf\Fields\Link;

$header = get_field('header', 'option');
if ($header) {
    $light_logo = $header['header_light_logo'];
    $dark_logo = $header['header_dark_logo'];
    $button = $header['button'];
    $form = $header['form'];
    $form_title = $header['form_title'];
    $form_sub_title = $header['form_sub_title'];
    $form_description = $header['form_description'];
    $form_steps = $header['steps'];
}

$is404 = '';
$is_header = '';
if (is_404()) {
    $is404 = ' not-found-page';
} else {
    $is_header = ' main-form';
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php wp_title(); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="dark-bg"></div>

<?php if (!isset($_COOKIE["Banner"])): ?>
    <div class="banner">
        <div class="banner__wrapper">
            <div class="banner__data">
                <h2>Lorem ipsum Lorem</h2>

                <p>Lorem ipsum Lorem ipsumLorem ipsumLorem Lorem ipsum Lorem ipsumLorem ipsumLorem</p>

                <div class="banner__data_button close_banner primary small"> Get in touch</div>
            </div>

            <div class="banner__close-icon close_banner">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.75 5.25L5.25 18.75" stroke="#899FB6" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round" />
                    <path d="M18.75 18.75L5.25 5.25" stroke="#899FB6" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!isset($_COOKIE["CookiesAgreement"])): ?>
    <div class="cookies">
        <div class="container">
            <div class="cookies__wrapper">
                <p>Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</p>
                <div class="cookies__accept-button primary">Lorem ipsum </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!is_404()) { ?>
    <div class="form <?php echo $is_header; ?>">
        <?php include locate_template('/views/steps.php'); ?>

        <div class="form__sent-message">
            <div class="form__sent-message_icon">
                <svg width="81" height="80" viewBox="0 0 81 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M70.5008 36.4774V39.3031C70.497 45.9264 68.3524 52.3711 64.3866 57.6759C60.4209 62.9807 54.8466 66.8615 48.4951 68.7394C42.1436 70.6173 35.3553 70.3918 29.1424 68.0965C22.9296 65.8012 17.6251 61.559 14.0202 56.0027C10.4153 50.4464 8.70305 43.8736 9.13884 37.2647C9.57464 30.6557 12.1351 24.3647 16.4384 19.3299C20.7417 14.295 26.5572 10.7861 33.0177 9.32646C39.4781 7.86681 46.2374 8.53462 52.2873 11.2303"
                          stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M71.887 12.5088L39.1659 45.2626L29.3496 35.4463" stroke="white" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <h2>Thank you!</h2>

            <p>Your form was successfully submitted!</p>
        </div>

        <div class="form__cross-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.75 5.25L5.25 18.75" stroke="#899FB6" stroke-width="1.5" stroke-linecap="square"
                      stroke-linejoin="round"/>
                <path d="M18.75 18.75L5.25 5.25" stroke="#899FB6" stroke-width="1.5" stroke-linecap="square"
                      stroke-linejoin="round"/>
            </svg>
        </div>

        <?php if (!empty($form)): ?>
            <?php echo do_shortcode('[contact-form-7 id="' . $form . '"]'); ?>
        <?php endif; ?>
    </div>
<?php } ?>

<header class="header-section <?php echo $is404; ?>">
    <div class="container">
        <div class="header-section__wrapper">
            <a class="header-section__logo" href="<?php echo get_site_url(); ?>">
                <?php if (!empty($light_logo)): ?>
                    <?php echo wp_get_attachment_image($light_logo, 'full', '', array('class' => 'header-section__logo_light')); ?>
                <?php endif; ?>
                <?php if (!empty($dark_logo)): ?>
                    <?php echo wp_get_attachment_image($dark_logo, 'full', '', array('class' => 'header-section__logo_dark')); ?>
                <?php endif; ?>
            </a>

            <div class="header-section__menu">
                <?php
                wp_nav_menu([
                    'theme_location' => 'header-menu',
                    'menu' => 'Header menu',
                    'depth' => 2,
                    'container' => 'nav',
                ]);
                ?>
            </div>

            <div class="header-section__buttons">
                <?php if (!empty($button)): ?>
                    <?php
                    $button_title = $button['title'];
                    $button_url = $button['url'];
                    $button_target = $button['target'];
                    ?>
                    <a target="<?php echo $button_target; ?>" href="<?php echo $button_url; ?>"
                       class="primary small mail-icon pop-up-form"><span><?php echo $button_title; ?></span></a>
                <?php endif; ?>
                <div class="header-section__buttons_burger-icon"></div>
            </div>
        </div>
    </div>
</header>

