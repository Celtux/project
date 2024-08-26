<?php
/**
 * Skills Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

$title = get_field('title');
$cards = get_field('cards');
?>
<section class="skills-section">
    <div class="container">
        <div class="skills-section__wrapper">
            <?php if (!empty($title)): ?>
                <?php echo $title; ?>
            <?php endif; ?>

            <?php if (!empty($cards)): ?>
                <div class="skills-section__body">
                    <?php foreach ($cards as $card):
                        $card_title = $card['title'];
                        $card_description = $card['description'];
                        $card_link = $card['link'];
                        $card_link_text = $card['link_text'];
                        ?>
                        <div class="skills-section__card_wrapper <?php if (!empty($card_link)): ?> light_card-bghover <?php endif; ?>" <?php if (!empty($card_link)): ?>style="cursor: pointer"<?php endif; ?>>
                            <a class="skills-section__body_card"
                                <?php if (!empty($card_link)): ?> href="<?php echo $card_link; ?>"<?php endif; ?>>
                                <div class="skills-section__body_card_data">
                                    <?php if (!empty($card_title)): ?>
                                        <h4><?php echo $card_title; ?></h4>
                                    <?php endif; ?>

                                    <?php if (!empty($card_description)): ?>
                                        <p><?php echo $card_description; ?></p>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($card_link_text) && !empty($card_link)): ?>
                                    <div class="skills-section__body_card_link"><?php echo $card_link_text; ?>
                                        <span class="animated-arrow"></span></div>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>