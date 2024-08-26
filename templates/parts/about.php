<?php
/**
 * About Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

$title = get_field('title');
$stats = get_field('stats');
$bg_image = get_field('background_image');

?>
<section <?php if ($bg_image): ?>style="background-image:url(<?php echo $bg_image; ?>)"<?php endif; ?> class="about">
    <div class="container">
        <div class="about__wrapper">
            <?php if (!empty($title)): ?>
                <?php echo $title; ?>
            <?php endif; ?>

            <?php if (!empty($stats)): ?>
                <div class="about__stats">
                    <?php foreach ($stats as $stat):
                        $start_number = $stat['start_number'];
                        $end_number = $stat['end_number'];
                        $symbol = $stat['symbol'];
                        $description = $stat['description_of_stat'];
                        ?>
                        <div class="about__stats_stat-wrapper">
                            <div class="about__stats_stat">
                                <div class="about__stats_stat_number">
                                    <?php if (!empty($end_number)): ?>
                                        <h3 data-max="<?php echo $end_number; ?>">
                                            <?php if (!empty($start_number)) {
                                                echo $start_number;
                                            } else {
                                                echo "0";
                                            } ?>
                                        </h3>
                                    <?php endif;

                                    if (!empty($symbol)): ?>
                                        <div class="about__stats_stat_number_symbol">
                                            <?php echo $symbol; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($description)): ?>
                                    <p><?php echo $description; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>