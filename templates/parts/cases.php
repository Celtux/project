<?php
/**
 * Cases Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */
use App\Acf\Fields\Link;

$cases = get_field('cases');
$link = get_field('link');

?>
<section class="cases-section">
    <div class="container">
        <?php if (!empty($cases)): ?>
            <div class="cases-section__wrapper">
                <?php foreach ($cases as $case):
                    $case_logo = $case['logo'];
                    $case_title = $case['title'];
                    $case_description = $case['description'];
                    $case_link = $case['link'];
                    $case_img = $case['image'];
                    $case_bg_color = $case['visible_background'];
                    $case_cards = $case['technologies_list'];
                    ?>

                    <div class="cases-section__case-wrapper">
                        <a class="cases-section__case"
                           <?php if (!empty($case_bg_color)): ?>style="background-color:<?php echo $case_bg_color; ?>"
                           <?php endif;
                           if (!empty($case_link)): ?>href="<?php echo $case_link; ?>"<?php endif;
                        ?>>
                            <div class="cases-section__case_data">
                                <?php if (!empty($case_logo)): ?>
                                    <div class="cases-section__case_data_logo">
                                        <?php echo wp_get_attachment_image($case_logo, 'full', '', array()); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($case_title)): ?>
                                    <h3><?php echo $case_title; ?></h3>
                                <?php endif; ?>

                                <?php if (!empty($case_description)): ?>
                                    <p><?php echo $case_description; ?></p>
                                <?php endif; ?>

                                <?php if (!empty($case_cards)): ?>
                                    <div class="cases-section__case_data_items">
                                        <?php foreach ($case_cards as $card):
                                            $card_text = $card['technology'];
                                            if (!empty($card_text)):?>
                                                <div class="cases-section__case_data_items_item-wrapper">
                                                    <div class="cases-section__case_data_items_item">
                                                        <?php echo $card_text; ?>
                                                    </div>
                                                </div>
                                            <?php endif; endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty($case_img)): ?>
                                <div class="cases-section__case_img">
                                    <?php echo wp_get_attachment_image($case_img, 'full', '', array()); ?>
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>

                <?php endforeach;
                echo Link::render_acf_link($link, '', '', 'animated-arrow');
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>