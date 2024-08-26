<?php
/**
 * Stats Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

$title = get_field('title');
$stats = get_field('stats_numbers');
?>
<section class="stats-section">
    <div class="container">
        <div class="stats-section__wrapper">
            <?php if (!empty($title)): ?>
                <?php echo $title; ?>
            <?php endif; ?>
            <?php if (!empty($stats)): ?>
                <div class="stats-section__items">
                    <?php foreach ($stats as $stat):
                        $stat_number = $stat['number'];
                        $stat_description = $stat['description'];

                        if (!empty($stat_number) && !empty($stat_description)):?>
                            <div class="stats-section__item-wrapper">
                                <div class="stats-section__items_item">
                                    <?php if (!empty($stat_number)): ?>
                                        <h2><?php echo $stat_number; ?></h2>
                                    <?php endif; ?>

                                    <?php if (!empty($stat_description)): ?>
                                        <p><?php echo $stat_description; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>