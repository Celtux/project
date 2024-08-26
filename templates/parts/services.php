<?php
/**
 * Services Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

$title = get_field('title');
$cards = get_field('cards');
?>
<section class="services-section section-mobile-bg">
    <div class="container">
        <div class="services-section__wrapper">
            <?php if (!empty($title)): ?>
                <?php echo $title; ?>
            <?php endif; ?>

            <?php if (!empty($cards)): ?>
                <div class="services-section__body">
                    <?php foreach ($cards as $card):
                        $card_icon = $card['icon'];
                        $card_title = $card['title'];
                        $card_description = $card['description'];
                        $card_link = $card['link'];
                        ?>
                        <div class="services-section__card_wrapper dark_card-bghover">
                            <?php if (!empty($card_link)):
                                $card_link_title = $card_link['title'];
                                $card_link_url = $card_link['url'];
                                ?>
                                <a class="services-section__body_card"
                                   href="<?php echo $card_link_url; ?>">
                                    <div class="services-section__body_card_data">
                                        <?php if (!empty($card_icon)): ?>
                                            <div class="services-section__body_card_data_img">
                                                <?php echo wp_get_attachment_image($card_icon, 'full', '', array()); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($card_title)): ?>
                                            <h4><?php echo $card_title; ?></h4>
                                        <?php endif; ?>

                                        <?php if (!empty($card_description)): ?>
                                            <p><?php echo $card_description; ?></p>
                                        <?php endif; ?>
                                    </div>


                                    <?php if (!empty($card_link_title)): ?>
                                        <div class="services-section__body_card_link"><?php echo $card_link_title; ?>
                                            <span class="animated-arrow"></span></div>
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>