<?php
/**
 * Reviews Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

use App\Acf\Fields\Link;

$cards = get_field('cards');
$link = get_field('link');
?>
<section class="reviews-section">
    <div class="container">
        <?php if (!empty($cards)): ?>
            <div class="reviews-section__wrapper">
                <div class="swiper reviews-section__swiper">
                    <div class="swiper-wrapper reviews-section__swiper_wrapper">
                        <?php foreach ($cards as $card):
                            $description = $card['description'];
                            $image = $card['image'];
                            $name = $card['name'];
                            $post = $card['post'];
                            if (!empty($description)): ?>
                                <div class="swiper-slide reviews-section__swiper_slide">
                                    <div class="reviews-section__swiper_slide_description">
                                        <p><?php echo $description; ?></p>
                                    </div>

                                    <div class="reviews-section__swiper_slide_info">
                                        <?php if (!empty($image)): ?>
                                            <div class="reviews-section__swiper_slide_info_img">
                                                <?php echo wp_get_attachment_image($image, 'full', '', array()); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="reviews-section__swiper_slide_info_data">
                                            <?php if (!empty($name)): ?>
                                                <p><?php echo $name; ?></p>
                                            <?php endif; ?>

                                            <?php if (!empty($post)): ?>
                                                <p><?php echo $post; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="reviews-section__control-elements">
                        <div class="reviews-section__control-elements_controls">
                            <div class="button-prev swiper-button-prev-reviews"></div>

                            <div class="button-next swiper-button-next-reviews"></div>
                        </div>

                        <?php echo Link::render_acf_link($link, '', '', 'animated-arrow');
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
</section>