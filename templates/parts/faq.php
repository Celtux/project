<?php
/**
 * FAQ Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

use App\Acf\Fields\Link;

$title = get_field('title');
$card_auto_close = get_field('auto_close');
$cards = get_field('cards');
$link = get_field('link');
?>
<section class="faq-section">
    <div class="container">
        <div class="faq-section__wrapper">
            <?php if (!empty($title)): ?>
                <h2><?php echo $title; ?></h2>
            <?php endif;

            if (!empty($cards)): ?>
                <div class="faq-section__body" data-check="<?php echo $card_auto_close; ?>">
                    <?php foreach ($cards as $card):
                        $card_title = $card['title'];
                        $card_description = $card['description'];
                        $card_checker = $card['open'];
                        ?>
                        <div class="faq-section__body_item <?php if ($card_checker == 'yes'): ?> openString <?php endif; ?>">
                            <?php if (!empty($card_title)): ?>
                                <p class="faq-section__body_item_title"><?php echo $card_title; ?></p>
                            <?php endif;

                            if (!empty($card_description)):?>
                                <div class="faq-section__body_item_data">
                                    <?php echo $card_description; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach;

                    echo Link::render_acf_link($link, '', '', 'animated-arrow');
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>