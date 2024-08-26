<?php
/**
 * Logo Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

$logos = get_field('logos');
?>
<section class="logo-section">
    <div class="container">
        <div class="logo-section__wrapper">
            <?php if (!empty($logos)): ?>
                <div class="logo-section__row">
                    <?php foreach ($logos as $logo):
                        $logo_img = $logo['logo'];
                        $logo_url = $logo['logo_url'];
                        if (!empty($logo_url) && !empty($logo_img)):
                            ?>

                            <a class="logo-section__row_item" href="<?php echo $logo_url; ?>">
                                <?php echo wp_get_attachment_image($logo_img, 'full'); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
