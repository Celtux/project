<?php
/**
 * Rewards Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

$rewards = get_field('rewards');
?>
<section class="rewards-section">
    <div class="container">
        <div class="rewards-section__wrapper">
            <?php if (!empty($rewards)): ?>
                <div class="swiper rewards-section__swiper">
                    <div class="swiper-wrapper rewards-section__swiper_wrapper">
                        <?php foreach ($rewards as $reward):
                            $image = $reward['image'];
                            if (!empty($image)): ?>
                                <div class="swiper-slide rewards-section__swiper_slide">
                                    <div class="rewards-section__swiper_slide_img">
                                        <?php echo wp_get_attachment_image($image, 'full', '', array()); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="rewards-section__controls">
                    <div class="button-prev swiper-button-prev-rewards"></div>

                    <div class="button-next swiper-button-next-rewards"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>