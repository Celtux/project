<?php
/**
 * Hero Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

$title = get_field('title');
$subtitle = get_field('subtitle');
$bg_image = get_field('background_image');
?>
<section <?php if ($bg_image): ?>style="background-image:url(<?php echo $bg_image; ?>)"<?php endif; ?> class="hero section-mobile-bg">
    <div class="container">
        <div class="hero__wrapper">
            <?php if (!empty($title)): ?>
                <?php echo $title; ?>
            <?php endif; ?>

            <?php if (!empty($subtitle)): ?>
                <p><?php echo $subtitle; ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
