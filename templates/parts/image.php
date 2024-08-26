<?php
/**
 * Image Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

$image = get_field('image');
?>
<section class="image-section">
    <div class="large-container">
        <?php if (!empty($image)): ?>
            <div class="image-section__wrapper">
                <?php echo wp_get_attachment_image($image, 'full', '', array()); ?>
            </div>
        <?php endif; ?>
    </div>
</section>